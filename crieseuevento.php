<?php
include_once('conexao.php');
include_once("sessao.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

$evento = filter_input(INPUT_POST , "evento" , FILTER_DEFAULT);
$evento = strip_tags($evento);
$evento = htmlspecialchars($evento , ENT_QUOTES , "utf-8");

$cidade = filter_input(INPUT_POST , "cidade", FILTER_DEFAULT);
$cidade = strip_tags($cidade);
$cidade = htmlspecialchars($cidade , ENT_QUOTES , "utf-8");

$estado = filter_input(INPUT_POST , "estado" , FILTER_DEFAULT);
$estado = strip_tags($estado);
$estado = htmlspecialchars($estado , ENT_QUOTES , "utf-8");


$data = filter_input(INPUT_POST, "data" , FILTER_DEFAULT);
$data = strip_tags($data);
$data = htmlspecialchars($data , ENT_QUOTES, "utf-8");

$publico = filter_input(INPUT_POST , "publico", FILTER_DEFAULT);
$publico = strip_tags($publico);
$publico = htmlspecialchars($publico,ENT_QUOTES,"utf-8");

$ticket = filter_input(INPUT_POST , "ticket" , FILTER_DEFAULT);
$ticket = strip_tags($ticket);
$ticket = htmlspecialchars($ticket , ENT_QUOTES,"utf-8");

$perfil = filter_input(INPUT_POST , "perfil" , FILTER_DEFAULT);
$perfil = strip_tags($perfil);
$perfil = htmlspecialchars($perfil, ENT_QUOTES , "utf-8");

$mensagem = filter_input(INPUT_POST , "mensagem" , FILTER_DEFAULT);
$mensagem = strip_tags($mensagem);
$mensagem = htmlspecialchars($mensagem, ENT_QUOTES , "utf-8");

$sql = mysqli_query($conexao ,"INSERT INTO evento values (null,
'$evento',
'$data','$publico','$ticket','$estado',
'$perfil','$mensagem')");
header('location:index.php');
mysqli_close($conexao);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cevento.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="javascript/crieseuevento.js"></script>
    <title>Crie evento</title>
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
 <br> <br><br><br>  
      <div class="completo">
        <form method="post" action="crieseuevento.php"onsubmit="return nossoevento()">
            <h1>Preencha o Formulário<br>que entraremos em contato com você.</h1>
            <p>informações do evento</p>

            <div class="input-box">
                <input type="text" name="evento" id="evento"  placeholder="Evento">
            </div>
            <div class="input-grid">
                <div class="input-box">
                    <input type="text" name="cidade" id="cidade"  placeholder="Cidade">
                </div>
                <div class="input-box">
            <div id="estado_brasil">
                <select name="estado" id="estado" class="estadobrasileiro">
                    <option value="est" selected disabled>Estado</option>
                    <option value="ac">AC - Acre</option>
                    <option value="al">AL - Alagoas</option>
                    <option value="am">AM - Amazonas</option>
                    <option value="ap">AP - Amapá</option>
                    <option value="ba">BA - Bahia</option>
                    <option value="ce">CE - Ceará</option>
                    <option value="df">DF - Distrito Federal</option>
                    <option value="es">ES- Espirito Santo</option>
                    <option value="go">GO - Goias</option>
                    <option value="ma">MA - Maranhão</option>
                    <option value="mg">MG - MInas Gerais</option>
                    <option value="ms">MS - Mato Grosso do Sul</option>
                    <option value="mt">MT - Mato Grosso</option>
                    <option value="pa">PA - Pará</option>
                    <option value="pb">PB - Paraiba</option>
                    <option value="pe">PE - Pernambuco</option>
                    <option value="pi">PI - Piaui</option>
                    <option value="pr">PR - Paraná</option>
                    <option value="rj">RJ - Rio de Janeiro</option>
                    <option value="rn">RN - Rio Grande do Norte</option>
                    <option value="ro">RO - Rondônia</option>
                    <option value="rr">RR - Roraima</option>
                    <option value="rs">RS - Rio Grande do Sul</option>
                    <option value="sc">SC - Santa Catarina</option>
                    <option value="se">SE - Sergipe</option>
                    <option value="sp">SP - São Paulo</option>
                    <option value="to">TO - Tocantins</option>
                </select>
            </div>
                </div>
                <div class="input-box">
                    <input type="date" name="data" id="data"  placeholder="Data">
                </div>
                <div class="input-box">
                    <input type="text" name="publico" id="publico"  placeholder="Publico esperado">    
                </div>
                <div class="input-box">
                    <input type="text" name="ticket" id="ticket"  placeholder="Ticket médio">    
                </div>
                <div class="input-box">
                    <input type="text" name="perfil" id="perfil"  placeholder="Perfil do Instagram (Prudutora ou Evento)">    
                </div>

                
            <div class="input-box">
                <label for="message"></label>
                <textarea id="mensagemTexto" name="mensagem" rows="7" style="width: 210%;" placeholder="Digite uma mensagem sobre o evento" ></textarea>
            </div>
          
                
            </div>
            <button type="submit" class="btn">Enviar</button>
            <button type="reset" class="btn">Limpa</button>
            <div id="mensagemErro"></div>


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