<?php

session_start();
include('verifica_login.php');
include('conexao.php');

// 1) RECEBER OS DADOS DO FORMULÁRIO (via POST)
$tipo            = isset($_POST['tipo'])            ? $_POST['tipo']            : '';
$estudante       = isset($_POST['estudante'])       ? $_POST['estudante']       : '';
$curso           = isset($_POST['curso'])           ? $_POST['curso']           : '';
$serie           = isset($_POST['serie'])           ? $_POST['serie']           : '';
$data_ocorrencia = isset($_POST['data_ocorrencia']) ? $_POST['data_ocorrencia'] : '';
$horario         = (isset($_POST['horario']) && $_POST['horario'] !== '') 
                   ? $_POST['horario'] 
                   : null;
$motivo          = (isset($_POST['motivo'])  && $_POST['motivo']  !== '') 
                   ? $_POST['motivo'] 
                   : null;
$cid             = (isset($_POST['cid'])      && $_POST['cid']      !== '') 
                   ? $_POST['cid'] 
                   : null;
$dias            = (isset($_POST['dias'])     && $_POST['dias']     !== '') 
                   ? intval($_POST['dias']) 
                   : null;
$inicio          = (isset($_POST['inicio'])   && $_POST['inicio']   !== '') 
                   ? $_POST['inicio'] 
                   : null;
$termino         = (isset($_POST['termino'])  && $_POST['termino']  !== '') 
                   ? $_POST['termino'] 
                   : null;
$componente      = (isset($_POST['componente']) && $_POST['componente'] !== '') 
                   ? $_POST['componente'] 
                   : null;
$responsavel     = (isset($_POST['responsavel']) && $_POST['responsavel'] !== '') 
                   ? $_POST['responsavel'] 
                   : null;

// MONTAR A QUERY DE INSERT 
$sql_insert = "
    INSERT INTO ocorrencias (
        tipo,
        estudante,
        curso,
        serie,
        data_ocorrencia,
        horario,
        motivo,
        cid,
        dias,
        inicio,
        termino,
        componente,
        responsavel
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
";

$stmt = $conexao->prepare($sql_insert);
if (!$stmt) {
    header("Location: ocorrencias.php?erro=1&msg=" . urlencode($conexao->error));
    exit;
}

$tipos = "ssssssssissss";

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
    $dias,        // inteiro
    $inicio,
    $termino,
    $componente,
    $responsavel
);

// 5) EXECUTAR E REDIRECIONAR
if ($stmt->execute()) {
    header("Location: ocorrencias.php?sucesso=1");
    exit;
} else {
    header("Location: ocorrencias.php?erro=1&msg=" . urlencode($stmt->error));
    exit;
}
?>
