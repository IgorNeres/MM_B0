<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'mmbo');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('Não foi possível conectar');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $confirmacao = $_POST['confirmacao'] ?? '';

    if ($confirmacao === 'DELETAR') {
        $sql = "DELETE FROM ocorrencias";

        if (mysqli_query($conexao, $sql)) {
            header("Location: ocorrencias.php?mensagem=Ocorrências+excluídas+com+sucesso.&tipo=success");
            exit;
        } else {
            $erro = urlencode("Erro ao excluir: " . mysqli_error($conexao));
            header("Location: ocorrencias.php?mensagem=$erro&tipo=danger");
            exit;
        }
    } else {
        header("Location: ocorrencias.php?mensagem=Confirmação+incorreta.+Nada+foi+excluído.&tipo=warning");
        exit;
    }
} else {
    header("Location: ocorrencias.php?mensagem=Requisição+inválida.&tipo=danger");
    exit;
}
?>