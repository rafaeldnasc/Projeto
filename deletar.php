<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
include_once("conexao.php");

$id= filter_input(INPUT_POST,'id', FILTER_VALIDATE_INT);
$email = filter_input (INPUT_POST,'email', FILTER_DEFAULT);
$senha = filter_input (INPUT_POST,'senha', FILTER_DEFAULT);


$email = strip_tags($email);
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$senha= strip_tags($senha);
$senha= htmlspecialchars($senha, ENT_QUOTES, 'UTF-8');





$deletar = "DELETE FROM cadastro where id = '$id'";
$sql = mysqli_query($conexao , $deletar);

header("location:index.php");

}
?>