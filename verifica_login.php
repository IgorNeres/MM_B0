<?php
session_start();

if (!isset($_SESSION['usuario'])) {
header('Location: /mbo/home.php');
    exit();
}
?>