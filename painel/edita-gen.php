
<?php
  require_once "../sistema/conexoes.php"; // requerindo as variáveis do config.php
  
  session_start();

  if(!isset($_SESSION['sess_admin_id']) || (trim($_SESSION['sess_admin_id']) == '')) {
    header("location: ../index.php");
    exit();
  }

  $id = $_GET['id'];

  $_SESSION['id'] = $id;

  $info = "SELECT * FROM genero WHERE gen_id='$id'";

  $query = mysqli_query($mysql, $info) or die (mysqli_error($mysql));

  while($dados = $query->fetch_assoc()) {
    $nome = $dados['gen_nome'];
    $hist = $dados['gen_hist'];
    $carac = $dados['gen_carac'];
  }

  mysqli_close($mysql);
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
  <head>
    <title>Música Brasil - Tudo sobre a música brasileira</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="content-language" content="pt-br" />
    <meta name="description" content="Gêneros músicas, estilos, bandas e artistas"/>
    <meta name="author" content="minor S.A"/>
    <meta name="keywords" content="músicas, tudo sobre bandas, características das músicas brasileiras"/>
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />
    <link rel="icon" type="image/png" href="imagens/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_prin.css" />
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <script>
      //FUNÇÃO DO ACCORDION CONFIGURADA PARA ALTERAR A SETAS CONFORME O CLICK
      $(function() {
        $('.accordion').each(function () {
          var $accordian = $(this);
          $accordian.find('.accordion-head').on('click', function () {
            $(this).parent().find(".accordion-head").removeClass('open close');
            $(this).removeClass('open').addClass('close');
            $accordian.find('.accordion-body').slideUp();
            if (!$(this).next().is(':visible')) {
              $(this).removeClass('close').addClass('open');
              $(this).next().slideDown();
            }
          });
        });
      });

    </script>
  </head>
  <body>
    <div id="topo"> 
      <div id="top_conteudo"> 
        <p id="site_nome"><a href="generos.php" ><span>música</span>brasil</a></p>
        <div class="bemvindo">Bem vindo(a) <?php echo $_SESSION['sess_admin_nome']; ?>.<a class="sair" href="sistema/logout.php">Sair</a></div>
        <div id="divisao"> </div>
        <ul id="nave">
          <li><a href="#">Home</a></li>
          <li><a href="generos.php">Gêneros</a></li>
          <li><a href="#">Novidades</a></li>
          <li><a href="#">Minha Conta</a></li>
          <li><a href="#">Blablabla</a></li>
        </ul>
      </div > <!-- FIM DA DIV top_conteudo -->
    </div> <!-- FIM DA DIV topo -->

    <div id="conteudo">
      <h1><a href="gerenciar-gen.php">Gerenciar Gêneros</a>&nbsp;>&nbsp;<?php echo $nome; ?></h1>
      <div class="linha_conteudo"></div>
      <br/>
      <form name="edicao" method="POST" action="../sistema/editar.php">
        <div class="accordion">
          <div class="accordion-head">
            <div class="arrow down"></div><h3> História </h3><div class="arrow2 down"></div>
          </div>
          <div class="accordion-body">
            <textarea class="ckeditor" name="txthist">
                <?php
                  echo $hist;
                ?>
            </textarea>
          </div>
          <div class="accordion-head">
            <div class="arrow down"></div><h3> Características </h3><div class="arrow2 down"></div>
          </div>
          <div class="accordion-body">
            <textarea class="ckeditor" name="txtcarac">
              <?php
                echo $carac;
              ?>
            </textarea>
          </div>
          <div class="accordion-head">
            <div class="arrow down"></div><h3> Estilos </h3><div class="arrow2 down"></div>
          </div>
          <div class="accordion-body">
            <textarea class="ckeditor" name="txtestilos">
              Lorem Ipsum is sfnti nting and typesetting industry dummy text o g and typesetting industry.
            </textarea>
          </div>
          <div class="accordion-head">
            <div class="arrow down"></div><h3> Ídolos </h3><div class="arrow2 down"></div>
          </div>
          <div class="accordion-body">
            <textarea class="ckeditor" name="txtidolos">
              Lorem Ipsum is sfnti nting and typesetting industry dummy text o g and typesetting industry.
            </textarea>
          </div>
        </div>
        <input type="submit" value="Salvar" class="botao" id="btnCad" name="Salvar" />
      </form>
    </div> <!-- FIM DA DIV conteudo -->

    <div id="rodape">
      <div id="conteudo_rodape">
        <p>Informações sobre o site e blablabla</p>
        <p>FAQ / Sobre / Bla bla bla / Política de Privacidade / Bla bla bla / Termos de serviço</p>
        <p>Copyright &copy;M.ino.R 2015 blablabla</p>
        <p>......Mais alguma coisa se tiver .........</p>
      </div > <!-- FIM DA DIV conteudo_rodape -->
    </div> <!-- FIM DA DIV rodape -->

  </body>
</html>
