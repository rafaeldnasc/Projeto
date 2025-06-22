<?php
session_start();
include_once("conexao.php");

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['id'];
$email = $_SESSION['email'];

// Verifica se a senha foi enviada via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Filtra a senha atual e nova senha
    $senha_atual = filter_input(INPUT_POST, 'senha_atual', FILTER_DEFAULT);
    $senha = filter_input(INPUT_POST, 'novasenha', FILTER_DEFAULT);

    // Filtra as entradas para evitar XSS e outros problemas
    $senha = strip_tags($senha);
    $senha = htmlspecialchars($senha, ENT_QUOTES, 'UTF-8');

    // Recupera a senha do banco de dados para comparação
    $sql = "SELECT senha FROM cadastro WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($senha_banco);
    $stmt->fetch();

    // Verifica se a senha atual está correta
    if (password_verify($senha_atual, $senha_banco)) {
        // Criptografa a nova senha
        $senhahash = password_hash($senha, PASSWORD_BCRYPT);

        // Atualiza a senha no banco de dados
        $sql_update = "UPDATE cadastro SET senha = ? WHERE id = ?";
        $stmt_update = $conexao->prepare($sql_update);
        $stmt_update->bind_param("si", $senhahash, $id);

        if ($stmt_update->execute()) {
            // Redireciona para a página inicial após a alteração
            header('Location: index.php');
        } else {
            echo "Erro ao atualizar a senha: " . $stmt_update->error;
        }
    } else {
        echo "A senha atual está incorreta!";
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/style.css">
   
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="javascript/alterar.js"></script>
    <title>Alterar Senha</title>
</head>
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
    <div class="wrapper">
        <form action="" method="post" onsubmit="return alterar()">
            <h1>Convites<span style="color: #1b8f21;">web</span></h1>
            <p>Tem certeza que deseja alterar sua senha?</p>

            <div class="input-box">
                <label for="senha_atual">Senha Atual</label>
                <input type="password" name="senha_atual" id="senha_atual" placeholder="Digite sua senha atual" required>
            </div>

            <div class="input-box">
                <label for="novasenha">Nova Senha</label>
                <input type="password" name="novasenha" id="novasenha" placeholder="Digite sua nova senha" required>
            </div>

            <button type="submit" class="btn">Alterar</button>
            <button type="reset" class="btn">Limpar</button>
            <a href="index.php">Voltar</a>
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
