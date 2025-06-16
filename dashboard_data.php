<?php
include('conexao.php');
session_start();

if (!isset($_SESSION['usuario'])) {
    die('Acesso não autorizado');
}

$chartType = $_GET['chart'] ?? '';

switch ($chartType) {
    case 'tipos':
        $query = "SELECT tipo, COUNT(*) as total 
                  FROM ocorrencias 
                  GROUP BY tipo 
                  ORDER BY total DESC";
        break;
        
    case 'alunos':
        $query = "SELECT estudante, COUNT(*) as total 
                  FROM ocorrencias 
                  GROUP BY estudante 
                  ORDER BY total DESC 
                  LIMIT 10";
        break;
        
    case 'cursos':
        $query = "SELECT curso, COUNT(*) as total 
                  FROM ocorrencias 
                  GROUP BY curso 
                  ORDER BY total DESC";
        break;
        
    case 'series':
        $query = "SELECT serie, COUNT(*) as total 
                  FROM ocorrencias 
                  GROUP BY serie 
                  ORDER BY total DESC";
        break;
        
    default:
        echo json_encode([]);
        exit;
}

$result = mysqli_query($conexao, $query);

if (!$result) {
    die('Erro na consulta: ' . mysqli_error($conexao));
}

$data = [];

// Cabeçalhos diferentes para cada grafico
switch ($chartType) {
    case 'tipos':
        $data[] = ['Tipo', 'Quantidade'];
        break;
    case 'alunos':
        $data[] = ['Aluno', 'Ocorrências'];
        break;
    case 'cursos':
        $data[] = ['Curso', 'Ocorrências'];
        break;
    case 'series':
        $data[] = ['Série', 'Ocorrências'];
        break;
}

while ($row = mysqli_fetch_assoc($result)) {
    $label = $chartType === 'alunos' ? $row['estudante'] : 
             ($chartType === 'cursos' ? $row['curso'] : 
             ($chartType === 'series' ? $row['serie'] : $row['tipo']));
             
    $data[] = [$label, (int)$row['total']];
}

header('Content-Type: application/json');
echo json_encode($data);
?>