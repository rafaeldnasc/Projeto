<?php
session_start();

if (!isset($_SESSION['id_cadastro']) || !is_numeric($_SESSION['id_cadastro'])) {
    header("Location: login.php");
    exit;
}
?>