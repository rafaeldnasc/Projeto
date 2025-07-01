<?php 
session_start();
include_once("conexao.php");

$cep_endereço = filter_input(INPUT_POST , "cep_endereço",FILTER_DEFAULT);
$cep_endereço = htmlspecialchars(strip_tags($cep_endereço), ENT_QUOTES , "utf-8");

$data = filter_input(INPUT_POST,"data",FILTER_DEFAULT);
$data = htmlspecialchars(strip_tags($data), ENT_QUOTES , "utf-8");

$nomema = filter_input(INPUT_POST, "nomema",FILTER_DEFAULT);
$nomema = htmlspecialchars(strip_tags($nomema), ENT_QUOTES , "utf-8");

$sql = $conexao->prepare("SELECT * FROM cadastro WHERE cep = ? || nomematerno = ? || datanascimento = ?");
$sql->bind_param("sss", $cep_endereço, $nomema, $data);
$sql->execute();
$get = $sql->get_result();

if ($get->num_rows) {
    $dados = $get->fetch_assoc();
    $_SESSION['id'] = $dados['id'];
    $_SESSION['nome'] = $dados['nome'];
    $_SESSION['email'] = $dados['email']; // ou outro campo equivalente, se existir

    header("Location: index.php");
    exit;
} else {
    header("Location: autenticacao.php");
    exit;
}

mysqli_close($conexao);
?>