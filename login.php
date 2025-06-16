<?php
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: home.php');
    exit();
} 

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT user_id, user_name FROM users WHERE user_name = '{$usuario}' AND user_password = md5('{$senha}')";

$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: pg-home.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: home.php');
    exit();
}
?>