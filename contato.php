<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_cont.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Contato</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <div class="tudinho">
        <form action="">
            <div class="começo">
                <h1>Contato</h1>
                <p>Se você tem dúvidas sobre nosso sistema, eventos ou deseja fazer uma sugestão,<br>
                    entre em contato por meio meio do formulário abaixo.</p>                 
            </div>
            
            <div class="grupo">
                <div class="info">
                    <h2>Convites<span style="color: #1b8f21;">web</span></h2>
                    <div class="linha"></div>
                    <p>
                        Para dúvidas, problemas e <br> solicitações de <br> cancelamentos envie <br> email para <br>eusouvascaino.com.br ou <br>mensagem em nossa <br> página do facebook.<br><hr>

Convites <span style="color: #1b8f21;">web</span> <br>
eusouvasacaino.com.br <br><br>
(11)4765-6655 (Grande São Paulo) <br>
(21)4042-3944 (Rio de Janeiro) <br><br>
Atendimento: <br>
Segunda à sexta das 8h às 18h (exceto feriados) <br><br>

ENDEREÇO: Av. Cesário de Melo, 2541 <br>
BAIRRO: Campo Grande <br>
CIDADE: Rio de Janeiro/RJ<br>
CEP: 00.000-000<br>
                    </p>
                </div>
                
             <div class="formulário">

                <div class="input-box">
                    <label for="name">Nome Completo</label>
                    <input type="text" id="name" name="name" placeholder="Insira um Nome" required>
                </div>
              
            
            <div class="input-box">
                <label for="email">E-mail para Contato</label>
                <input type="email" id="email" name="email" placeholder="email@email.com" required>
            </div>
           
          
            
            <div class="input-box">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" placeholder="(00)0000-0000"  required>
            </div>
           
            
            <div class="input-box">
                <label for="cidade">Sua Cidade</label>
                <input type="text" id="cidade" name="cidade" placeholder="Insira a cidade" required>
            </div>
           
             
            <div class="input-box">
                <label for="estado">Estado</label>
                <select name="estado" id="estado">
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
           
            
            <div class="input-box">
                <label for="evento">Para qual evento você precisa de nossa ajuda?</label>
                <input type="text" id="evento" name="evento" placeholder="Insira o evento" required>
            </div>
           


            <div class="input-box">
                <label for="message">Mensagem:</label>
                <textarea id="message" name="message" rows="4" placeholder="Sua mensagem aqui" required></textarea>
            </div>
          

             </div>
            </div>
            
            <button type="submit" class="bt">Enviar</button>
          <div class="mag"> <a href="index.php" class="second_bt">&#x1F860 Voltar</a></div>


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