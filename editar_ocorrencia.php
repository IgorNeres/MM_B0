<?php
// editar_ocorrencia.php

session_start();
include('verifica_login.php');
include('conexao.php');

// 1) RECEBER OS DADOS DO FORMULÁRIO (via POST)
$id              = isset($_POST['id']) ? intval($_POST['id']) : 0;
$tipo            = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$estudante       = isset($_POST['estudante']) ? $_POST['estudante'] : '';
$curso           = isset($_POST['curso']) ? $_POST['curso'] : '';
$serie           = isset($_POST['serie']) ? $_POST['serie'] : '';
$data_ocorrencia = isset($_POST['data_ocorrencia']) ? $_POST['data_ocorrencia'] : '';
$horario         = (isset($_POST['horario']) && $_POST['horario'] !== '') 
                   ? $_POST['horario'] 
                   : null;
$motivo          = (isset($_POST['motivo']) && $_POST['motivo'] !== '') 
                   ? $_POST['motivo'] 
                   : null;
$cid             = (isset($_POST['cid']) && $_POST['cid'] !== '') 
                   ? $_POST['cid'] 
                   : null;
$dias            = (isset($_POST['dias']) && $_POST['dias'] !== '') 
                   ? intval($_POST['dias']) 
                   : null;
$inicio          = (isset($_POST['inicio']) && $_POST['inicio'] !== '') 
                   ? $_POST['inicio'] 
                   : null;
$termino         = (isset($_POST['termino']) && $_POST['termino'] !== '') 
                   ? $_POST['termino'] 
                   : null;
$componente      = (isset($_POST['componente']) && $_POST['componente'] !== '') 
                   ? $_POST['componente'] 
                   : null;
$responsavel     = (isset($_POST['responsavel']) && $_POST['responsavel'] !== '') 
                   ? $_POST['responsavel'] 
                   : null;

// 2) MONTAR A QUERY DE UPDATE
$sql_update = "
    UPDATE ocorrencias SET
        tipo            = ?,
        estudante       = ?,
        curso           = ?,
        serie           = ?,
        data_ocorrencia = ?,
        horario         = ?,
        motivo          = ?,
        cid             = ?,
        dias            = ?,
        inicio          = ?,
        termino         = ?,
        componente      = ?,
        responsavel     = ?
    WHERE id = ?
";

$stmt = $conexao->prepare($sql_update);
if (!$stmt) {
    header("Location: ocorrencias.php?erro=1&msg=" . urlencode($conexao->error));
    exit;
}

// 3) STRING DE TIPOS PARA BIND_PARAM
// Ordem dos campos no UPDATE:
//  1) tipo            → string → "s"
//  2) estudante       → string → "s"
//  3) curso           → string → "s"
//  4) serie           → string → "s"
//  5) data_ocorrencia → string → "s"
//  6) horario         → string → "s"
//  7) motivo          → string → "s"
//  8) cid             → string → "s"
//  9) dias            → inteiro→ "i"
// 10) inicio          → string → "s"
// 11) termino         → string → "s"
// 12) componente      → string → "s"
// 13) responsavel     → string → "s"
// 14) id              → inteiro→ "i"
// Total: 12×"s" + 2×"i" = 14 caracteres => "ssssssssissssi"

$tipos = "ssssssssissssi";

$stmt->bind_param(
    $tipos,
    $tipo,
    $estudante,
    $curso,
    $serie,
    $data_ocorrencia,
    $horario,
    $motivo,
    $cid,
    $dias,
    $inicio,
    $termino,
    $componente,
    $responsavel,
    $id         
);

// EXECUTAR E REDIRECIONAR
if ($stmt->execute()) {
    header("Location: ocorrencias.php?sucesso=1");
    exit;
} else {
    header("Location: ocorrencias.php?erro=1&msg=" . urlencode($stmt->error));
    exit;
}
?>
