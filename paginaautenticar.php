<?php 
include_once("conexao.php");
$cep_endereço = filter_input(INPUT_POST , "cep_endereço",FILTER_DEFAULT);
$cep_endereço = strip_tags($cep_endereço);
$cep_endereço = htmlspecialchars($cep_endereço , ENT_QUOTES , "utf-8");

$data = filter_input(INPUT_POST,"data",FILTER_DEFAULT);
$data = strip_tags($data);
$data = htmlspecialchars($data , ENT_QUOTES , "utf-8");

$nomema = filter_input(INPUT_POST, "nomema",FILTER_DEFAULT);
$nomema = strip_tags($nomema);
$nomema = htmlspecialchars($nomema,ENT_QUOTES,"utf-8");
    $sql = $conexao->prepare("SELECT * from cadastro where cep = ? || nomematerno = ? || datanascimento = ?");
    $sql->bind_param("sss" ,$cep_endereço , $nomema , $data);
    $sql->execute();
    $get = $sql->get_result();
    $total = $get->num_rows;

    if($total){
            header("location:index.php");
    }else{
        header("location:autenticaçao.php");
    }
    mysqli_close($conexao);

?>