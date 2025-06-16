<?php
include('conexao.php');
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    echo json_encode(['error' => 'Acesso não autorizado']);
    exit;
}

// Dados para retornar
$dados = [];

try {
    // Total de ocorrências
    $query = "SELECT COUNT(*) as total FROM ocorrencias";
    $result = mysqli_query($conexao, $query);
    $dados['totalOcorrencias'] = mysqli_fetch_assoc($result)['total'] ?? 0;

    // Ocorrências hoje
    $hoje = date('Y-m-d');
    $query = "SELECT COUNT(*) as total FROM ocorrencias WHERE DATE(data_ocorrencia) = '$hoje'";
    $result = mysqli_query($conexao, $query);
    $dados['ocorrenciasHoje'] = mysqli_fetch_assoc($result)['total'] ?? 0;

    // Distribuição por tipo de ocorrência
    $query = "SELECT tipo, COUNT(*) as total FROM ocorrencias GROUP BY tipo";
    $result = mysqli_query($conexao, $query);
    $dados['tiposOcorrencia'] = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $dados['tiposOcorrencia'][] = $row;
    }

    //  Ocorrências por curso (usando como "sala")
    $query = "SELECT curso, COUNT(*) as total FROM ocorrencias GROUP BY curso ORDER BY total DESC";
    $result = mysqli_query($conexao, $query);
    $dados['ocorrenciasPorCurso'] = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $dados['ocorrenciasPorCurso'][] = $row;
    }

    //  Sala com mais ocorrências (usando curso como sala)
    $dados['salaMaisOcorrencias'] = $dados['ocorrenciasPorCurso'][0] ?? ['curso' => 'Nenhuma', 'total' => 0];

    //  Top 5 alunos com mais ocorrências
    $query = "SELECT estudante, COUNT(*) as total FROM ocorrencias GROUP BY estudante ORDER BY total DESC LIMIT 5";
    $result = mysqli_query($conexao, $query);
    $dados['topAlunos'] = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $dados['topAlunos'][] = $row;
    }

    //  Aluno com mais ocorrências
    $dados['alunoMaisOcorrencias'] = $dados['topAlunos'][0] ?? ['estudante' => 'Nenhum', 'total' => 0];

    //  Tendência mensal 
    $seisMesesAtras = date('Y-m-01', strtotime('-5 months'));
    $query = "SELECT 
                DATE_FORMAT(data_ocorrencia, '%Y-%m') as mes,
                COUNT(*) as total
              FROM ocorrencias
              WHERE data_ocorrencia >= '$seisMesesAtras'
              GROUP BY mes
              ORDER BY mes ASC";
    
    $result = mysqli_query($conexao, $query);
    $mesesDados = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $mesesDados[$row['mes']] = $row['total'];
    }

    // Preencher todos os meses
    $dados['tendenciaMensal'] = [];
    for ($i = 0; $i < 6; $i++) {
        $mesRef = date('Y-m', strtotime("-$i months"));
        $mesFormatado = date('M/Y', strtotime($mesRef));
        
        $total = $mesesDados[$mesRef] ?? 0;
        $dados['tendenciaMensal'][] = [
            'mes' => $mesFormatado,
            'total' => $total
        ];
    }

    // Ordenar do mais antigo para o mais recente
    $dados['tendenciaMensal'] = array_reverse($dados['tendenciaMensal']);

} catch (Exception $e) {
    error_log("Erro em dados_graficos.php: " . $e->getMessage());
    $dados['error'] = "Erro ao processar dados: " . $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($dados);
?>