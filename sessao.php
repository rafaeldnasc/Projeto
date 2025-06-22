<?php
// Inicia a sessão
session_start();

// Verifique se as variáveis de sessão 'id', 'nome' e 'email' já estão configuradas
if (!isset($_SESSION['id']) || !isset($_SESSION['nome']) || !isset($_SESSION['email'])) {
    // Caso as variáveis não estejam configuradas, significa que o usuário não fez login
    // Aqui você pode redirecionar o usuário para a página de login ou encerrar o script
    header("Location: login.php"); // Redireciona para a página de login
    exit;
}
?>