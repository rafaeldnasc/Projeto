<?php
session_start();
?>
<?php 
//pega  conexao do conexao.php 
include_once("conexao.php");

$data = filter_input(INPUT_POST,"data",FILTER_DEFAULT);
$data = strip_tags($data);
$data = htmlspecialchars($data , ENT_QUOTES , "utf-8");

$nomema = filter_input(INPUT_POST, "nomema",FILTER_DEFAULT);
$nomema = strip_tags($nomema);
$nomema = htmlspecialchars($nomema,ENT_QUOTES,"utf-8");

$cep_endereço = filter_input(INPUT_POST , "cep_endereço",FILTER_DEFAULT);
$cep_endereço = strip_tags($cep_endereço);
$cep_endereço = htmlspecialchars($cep_endereço , ENT_QUOTES , "utf-8");

$aleatorio = 0;
$aleatorio = [
    "<input type='date' class='inputdata' name='data' id='data'  placeholder='Data de nascimento' >",
    "<input type='text' class='inputs'  name='nomema' id='nomema'  placeholder='Nome Materno' >",
    "<input type='text' name='cep_endereço' class='inputs'  id='cep' maxlength='9' min='9' max='9' minlength='9' placeholder='Digite seu CEP' onkeyup='return mascaracep()'>"
];

$executar = $aleatorio[rand(0,count($aleatorio)-1)];
$sql = $conexao->prepare("SELECT * from cadastro where datanascimento = ? || nomematerno = ? || cep = ?");
$sql->bind_param("sss" ,$data , $nomema ,$cep_endereço);
$sql->execute();
$get = $sql->get_result();
$total = $get->num_rows;

if($total){
        header("location:index.php");
}else{
    header("telaerro.php");
}
    mysqli_close($conexao);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="javascript/autenticar.js"></script>
    <title>autenticar</title>
</head>
<body>
<div id="first_column" class="fixed-top">
    <div id="b">
        <div id="id_oneimage"> 
            <a href="index.php">
                <img id="one_image" src="imagens/logooriginal.png" alt="brasil">
            </a>
        </div>
        <div id="id_onetitle"> 
            <h2 id="one_title">
                <a href="index.php">
                    <h3 id="h3">Convites<span>web</span></h3>
                </a>
            </h2>
        </div>
        <div id="id_secondtitle"> 
            <h3 id="estrela">
                <a href="crieseuevento.php" id="second_title">&#9733; Crie seu evento</a>
            </h3>
        </div>



            <!-- Exibe o link de login se o usuário não estiver logado -->
            <div id="id_firstlink"><a href="login.php" id="first_link">ENTRAR</a></div>


        
    </div>
    </div>
 <br> <br><br><br>  
    <div class="wrapper">
        <form action="paginaautenticar.php" method="post" id="alterarsenha" onsubmit="return cep()">
        
            <h1>Convites <span style="color: #1b8f21;">web</span></h1>
            
    <div id="aleatorio">
    <?php echo $executar?>
    </div>
    
           <button type="submit" class="btn">Autenticar</button>
    
           <div class="register-link">
            <p>Não tem conta? <a href="cadastro.php">Cadastra-se</a></p>
            <div id="aviso"></div>
           </div>
        </form>
    </div>
       
    <!-- Rodapé -->
    <div id="rodape">
    <footer>
        <div id="barra_links" class="d-flex justify-content-center"> 
            <div id="insta" class="d-flex"> 
                <abbr title="Instagram" class="m-0 mx-3">
                    <a href="https://www.instagram.com" class="d-inline-block"><i class="bi bi-instagram large-icon green-icon"></i></a>
                </abbr>
                <abbr title="Facebook" class="m-0 mx-3">
                    <a href="https://www.facebook.com" class="d-inline-block"><i class="bi bi-facebook large-icon green-icon"></i></a>
                </abbr>
                <abbr title="Youtube" class="m-0 mx-3">
                    <a href="https://www.youtube.com" class="d-inline-block"><i class="bi bi-youtube large-icon green-icon"></i></a>
                </abbr>
                <abbr title="Twitter" class="m-0 mx-3">
                    <a href="https://www.x.com" class="d-inline-block"><i class="bi bi-twitter-x large-icon green-icon"></i></a>
                </abbr>
            </div>
        </div>
    </footer>
    <div id="i">
        <!--Ul-->
        <div class="container">
            <ul id="one_links">
                <div id="tr">
                    <h3  id="h3" class="titleis">Institucional</h3>
                    <div id="linka1"><li id="e_mensage"><a href="index.php" id="a_mensage">Home</a></li></div>
                    <div id="linka1"><li id="e_mensage"><a href="contato.php" id="a_mensage" >Contato</a></li></div>
                </div>
            </ul>
            <ul id="two_links">
                <div id="tr">
                    <h3 id="h3" class="titleis">Minha conta</h3>
                    <div id="linka2"><li id="i_mensage"><a href="alterar.php" id="i2_mensage">Alterar senha</a></li></div>

                </div>
            </ul>
        </div>
        </div>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>