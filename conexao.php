<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$DB_SERVER = "database-mariadb-1.cpiqcaey05dq.us-east-1.rds.amazonaws.com";
$DB_USERNAME = "admin";
$DB_PASSWORD = "Unisuam123";
$DB_NAME = "projeto_x";

// Cria a conexão com o banco de dados
$conexao = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// Verifica se houve erro na conexão
if ($conexao->connect_error) {
    // Se houver erro, redireciona para a página de erro
    header("Location: telaerro.php?error=erro_conexao");
    exit(); // Encerra o script para garantir que o código abaixo não seja executado
}

// Se a conexão foi bem-sucedida, o código continua executando normalmente
return $conexao;
?>