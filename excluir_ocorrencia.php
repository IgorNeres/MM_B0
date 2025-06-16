<?php
include('conexao.php');
include('verifica_login.php');

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conexao, $_GET['id']);
    
    $query = "DELETE FROM ocorrencias WHERE id = '$id'";
    
    if(mysqli_query($conexao, $query)) {
        header('Location: ocorrencias.php?sucesso=2');
    } else {
        header('Location: ocorrencias.php?erro=2');
    }
} else {
    header('Location: ocorrencias.php');
}

exit();
?>