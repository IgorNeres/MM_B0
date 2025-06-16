<?php
ob_start();

// Incluir conexão e iniciar sessão
include('conexao.php');
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: home.php');
    exit();
}

// Usar FPDF
require('fpdf/fpdf.php'); 

// Receber os filtros do formulário
$filtros = [
    'cursos' => isset($_POST['curso']) ? $_POST['curso'] : [],
    'series' => isset($_POST['serie']) ? $_POST['serie'] : [],
    'tipos' => isset($_POST['tipo_ocorrencia']) ? $_POST['tipo_ocorrencia'] : [],
    'responsaveis' => isset($_POST['responsavel']) ? $_POST['responsavel'] : []
];

$sql = "SELECT * FROM ocorrencias WHERE 1=1";

// Filtro por cursos
if (!empty($filtros['cursos'])) {
    $cursos = array_map(function($curso) use ($conexao) {
        return mysqli_real_escape_string($conexao, $curso);
    }, $filtros['cursos']);
    $sql .= " AND curso IN ('" . implode("','", $cursos) . "')";
}

// Filtro por séries
if (!empty($filtros['series'])) {
    $series = array_map(function($serie) use ($conexao) {
        return mysqli_real_escape_string($conexao, $serie);
    }, $filtros['series']);
    $sql .= " AND serie IN ('" . implode("','", $series) . "')";
}

// Filtro por tipos de ocorrência
if (!empty($filtros['tipos'])) {
    $tipos = array_map(function($tipo) use ($conexao) {
        return mysqli_real_escape_string($conexao, $tipo);
    }, $filtros['tipos']);
    $sql .= " AND tipo IN ('" . implode("','", $tipos) . "')";
}

// Filtro por responsáveis
if (!empty($filtros['responsaveis'])) {
    $responsaveis = array_map(function($responsavel) use ($conexao) {
        return mysqli_real_escape_string($conexao, $responsavel);
    }, $filtros['responsaveis']);
    $sql .= " AND responsavel IN ('" . implode("','", $responsaveis) . "')";
}

// Executar a consulta
$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die('Erro na consulta: ' . mysqli_error($conexao));
}

// Criar o PDF usando FPDF
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Cabecalho do relatorio
$pdf->Image('img/manoelmanologoblack.png', 10, 10, 30);
$pdf->Cell(0, 10, utf8_decode('Relatório de Ocorrências'), 0, 1, 'C');
$pdf->Ln(10);

// Data de emissão
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, utf8_decode('Emitido em: ') . date('d/m/Y H:i'), 0, 1);
$pdf->Ln(5);

// Filtros aplicados
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode('Filtros Aplicados:'), 0, 1);
$pdf->SetFont('Arial', '', 10);

$filtrosTexto = [];
if (!empty($filtros['cursos'])) $filtrosTexto[] = 'Cursos: ' . implode(', ', $filtros['cursos']);
if (!empty($filtros['series'])) $filtrosTexto[] = 'Séries: ' . implode(', ', $filtros['series']);
if (!empty($filtros['tipos'])) $filtrosTexto[] = 'Tipos: ' . implode(', ', $filtros['tipos']);
if (!empty($filtros['responsaveis'])) $filtrosTexto[] = 'Responsáveis: ' . implode(', ', $filtros['responsaveis']);

$pdf->MultiCell(0, 7, utf8_decode(implode(' | ', $filtrosTexto)), 0, 'L');
$pdf->Ln(10);

// Cabeçalho da tabela
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 220, 255);
$pdf->Cell(10, 10, utf8_decode('ID'), 1, 0, 'C', true);
$pdf->Cell(50, 10, utf8_decode('Estudante'), 1, 0, 'C', true);
$pdf->Cell(40, 10, utf8_decode('Curso'), 1, 0, 'C', true);
$pdf->Cell(20, 10, utf8_decode('Série'), 1, 0, 'C', true);
$pdf->Cell(25, 10, utf8_decode('Data'), 1, 0, 'C', true);
$pdf->Cell(25, 10, utf8_decode('Tipo'), 1, 0, 'C', true);
$pdf->Cell(50, 10, utf8_decode('Responsável'), 1, 0, 'C', true);
$pdf->Cell(60, 10, utf8_decode('Motivo'), 1, 1, 'C', true);

// Preencher a tabela com os dados
$pdf->SetFont('Arial', '', 9);
while ($row = mysqli_fetch_assoc($resultado)) {
    $pdf->Cell(10, 10, $row['id'], 1, 0, 'C');
    $pdf->Cell(50, 10, utf8_decode($row['estudante']), 1);
    $pdf->Cell(40, 10, utf8_decode($row['curso']), 1);
    $pdf->Cell(20, 10, utf8_decode($row['serie']), 1);
    $pdf->Cell(25, 10, date('d/m/Y', strtotime($row['data_ocorrencia'])), 1);
    $pdf->Cell(25, 10, utf8_decode($row['tipo']), 1);
    $pdf->Cell(50, 10, utf8_decode($row['responsavel']), 1);
    $pdf->Cell(60, 10, utf8_decode(substr($row['motivo'], 0, 50)), 1, 1); // Limita a 50 caracteres
}

// Rodapé do relatório
$pdf->SetY(-15);
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 10, utf8_decode('Página ') . $pdf->PageNo(), 0, 0, 'C');

// Limpar buffer e enviar o PDF para download
ob_end_clean();
$pdf->Output('D', 'relatorio_ocorrencias_' . date('Ymd_His') . '.pdf');
exit;