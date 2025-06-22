<?php

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
// Inclui a conexão com o banco de dados
include_once("conexao.php");

    $id = filter_input(INPUT_POST , "id" , FILTER_DEFAULT);
    $id = strip_tags($id);
    $id = htmlspecialchars($id , ENT_QUOTES , "utf-8");

    $email = filter_input(INPUT_POST , "email" , FILTER_DEFAULT);
    $email = strip_tags($email);
    $email = htmlspecialchars($email , ENT_QUOTES , "utf-8");

    $senha = filter_input(INPUT_POST , "senha" , FILTER_DEFAULT);
    $senha = strip_tags($senha);
    $senha = htmlspecialchars($senha , ENT_QUOTES , "utf-8");


    // Consulta o banco de dados para verificar o email e a senha
    $sql = $conexao->prepare("SELECT * FROM cadastro WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $get = $sql->get_result();

if ($get->num_rows > 0) {
    $usuario = $get->fetch_assoc();

    // Verifica a senha com password_verify
    if (password_verify($senha, $usuario['senha'])) {
        // A senha está correta
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

        // Redireciona para a página protegida
        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php");
    }
}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="javascript/alterar.js"></script>
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>alterar</title>
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

        <?php if (isset($_SESSION['nome'])): ?>
            <!-- Dropdown do nome do usuário logado -->
            <div id="one_title" class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                   <?php echo $_SESSION['nome']; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                    <?php if ($_SESSION['tipo_usuario'] === 'master'): ?>
                        <li><a class="dropdown-item" href="select.php">Gerenciar Usuários</a></li>
                        <li><hr class="dropdown-divider"></li>
                    <?php endif; ?>
                    
                    <li><a class="dropdown-item" href="alterar.php">Alterar Senha</a></li>
                    <li><a class="dropdown-item" href="imagens/modelo_banco.png">Modelo do banco</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                </ul>
            </div>
        <?php else: ?>
            <!-- Exibe o link de login se o usuário não estiver logado -->
            <div id="id_firstlink"><a href="login.php" id="first_link">ENTRAR</a></div>
        <?php endif; ?>
    </div>
</div>
    <br><br><br><br>
</div>
  
    </div>
    <div class="wrapper">
        <form action="" method="post" id="alterarsenha" >
        
            <h1>Convites<span style="color: #1b8f21;">web</span></h1>
            
            <div class="input-box">
                <label for="email"></label>
                <input type="text" name="email" id="email"  placeholder="Seu Login" maxlength="50">
                
            </div>

            <div class="input-box">   
                 <label for="senha"></label>
                 <input type="password"  name="senha" id="senha" placeholder="Senha">
  
            </div>
    
  
           <button type="submit" class="btn">Entrar</button>

           <button type="reset" class="btn">Limpar</button>
    
           <div class="register-link">
            <p>Não tem conta? <a href="cadastro.php">Cadastra-se</a></p>
            <div id="resposta">
            <?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
 include_once("conexao.php");

    $id = filter_input(INPUT_POST , "id" , FILTER_DEFAULT);
    $id = strip_tags($id);
    $id = htmlspecialchars($id , ENT_QUOTES , "utf-8");

    $email = filter_input(INPUT_POST , "email" , FILTER_DEFAULT);
    $email = strip_tags($email);
    $email = htmlspecialchars($email , ENT_QUOTES , "utf-8");

    $senha = filter_input(INPUT_POST , "senha" , FILTER_DEFAULT);
    $senha = strip_tags($senha);
    $senha = htmlspecialchars($senha , ENT_QUOTES , "utf-8");
    

    $sql = $conexao->prepare("SELECT * from cadastro where email = ? && senha = ?");
    $sql->bind_param("ss" ,$email , $senha);
    $sql->execute();
    $get = $sql->get_result();
    $total = $get->num_rows;

    if($total){
            header("location:autenticaçao.php");
    }else{
        $errado = "Email ou senha inválido!";
        echo $errado;
    }
        mysqli_close($conexao);
    }
?>
        </div>
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
 