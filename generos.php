<?php

  require_once "sistema/config.php"; // requerindo as variáveis do config.php
  require_once "sistema/conexoes.php"; // requerindo as variáveis do config.php
  require_once "sistema/funcoes.php"; // requerindo as funções do config.php

  include "sistema/session.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
  <head>
    <title>Música Brasil - Tudo sobre a música brasileira</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="content-language" content="pt-br" />
    <meta name="description" content="Gêneros músicas, estilos, bandas e artistas"/>
    <meta name="author" content="minor S.A"/>
    <meta name="keywords" content="músicas, tudo sobre bandas, características das músicas brasileiras"/>
    <link rel="stylesheet" type="text/css" href="estilos/estilo_prin.css" />
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />
  </head>
  <body>
    <div id="topo"> 
      <div id="top_conteudo"> 
        <p id="site_nome"><a href="index.php" ><span>música</span>brasil</a></p>
        <div class="bemvindo">Bem vindo(a) <?php echo $_SESSION['user_nome']; ?>.<a class="sair" href="sistema/logout.php">Sair</a></div>
        
        <!--
        <a href="painel/painel.php" class="painel"><img src="imagens/painel.png" alt="engrenagens" title="Obs: Só será visivel ao ADMIN !"/></a>
        -->

        <div id="divisao"> </div>

        <ul id="nave">
          <li><a href="#">Home</a></li>
          <li><a href="#">Gêneros</a></li>
          <li><a href="#">Novidades</a></li>
          <li><a href="#">Minha Conta</a></li>
          <li><a href="#">Blablabla</a></li>
        </ul>
      </div > <!-- FIM DA DIV top_conteudo -->
    </div> <!-- FIM DA DIV topo -->
    <div id="conteudo">
      <h1>Gêneros</h1>
      <div class="linha_conteudo"></div>
      <!-- INÍCIO DO PRIMEIRO BLOCO  -->
      <div class="bloco-esquerdo">
      	<a href="generos/classica.php">
        	<img src="imagens/classic.jpg" alt="Clássica" title="Clássica" />
    	</a>
        <p class="titulo"><a id="sub" href="generos/classica.php">Clássica</a></p>
        <p class="descri">Ópera, Sinfonia,  Sonata</p>
      </div>
      <div class="bloco-central">
      	<a href="generos/eletro.php">
        	<img src="imagens/Electro-Music.png" alt="Música Eletrônica" title="Música Eletrônica" />
    	</a>	
        <p class="titulo"><a id="sub" href="generos/eletro.php">Eletrônica</a></p>
        <p class="descri">Trance, DubStep, FreeStep</p>
      </div>
        <div class="bloco-direito">
        <a href="generos/rock.php">
        	<img src="imagens/rock.jpg" alt="Rock" title="Rock" />
    	</a>
        <p class="titulo"><a id="sub" href="generos/rock.php">Rock</a></p>
        <p class="descri">Rock and Roll, Metal , Psicodélico</p>
      </div> 
      <!-- TÉRMINO DO PRIMEIRO BLOCO  -->

      <!-- INÍCIO DO SEGUNDO BLOCO  -->
      <div class="bloco-esquerdo">
      	<a href="generos/rap.php">
        	<img src="imagens/rap-music.jpg" alt="Rap" title="Rap" />
        </a>
        <p class="titulo"><a id="sub" href="generos/rap.php">Rap</a></p>
        <p class="descri">Hip Hop, Rap Romântico, Gangsta Rap</p>
      </div>
      <div class="bloco-central">
      	<a href="generos/pop.php">
        	<img src="imagens/pop-music.jpg" alt="Pop" title="Pop" />
        </a>
        <p class="titulo"><a id="sub" href="generos/pop.php">Pop</a></p>
        <p class="descri">Dance-pop‎, K-pop‎,  J-pop‎</p>
      </div>
        <div class="bloco-direito">
        <a href="generos/gospel.php">
        	<img src="imagens/gospel.jpg" alt="Gospel" title="Gospel" />
        </a>
        <p class="titulo"><a id="sub" href="generos/gospel.php">Gospel</a></p>
        <p class="descri">Hinos Cristãos</p>
      </div> 
      <!-- TÉRMINO DO SEGUNDO BLOCO  -->

      <!-- INÍCIO DO TERCEIRO BLOCO  -->
      <div class="bloco-esquerdo">
      	<a href="generos/reggae.php">
        	<img src="imagens/reggae.jpg" alt="Reggae" title="Reggae" />
        </a>
        <p class="titulo"><a id="sub" href="generos/reggae.php">Reggae</a></p>
        <p class="descri">Dancehall, Dub, Ragga</p>
      </div>
      <div class="bloco-central">
      	<a href="generos/jazz.php">
        	<img src="imagens/jazz.jpg" alt="Jazz" title="Jazz" />
        </a>
        <p class="titulo"><a id="sub" href="generos/jazz.php">&nbsp;Jazz</a></p>
        <p class="descri">Nu-Jazz, Punk Jazz, Soul Jazz</p>
      </div>
      <div class="bloco-direito">
      	<a href="generos/funk.php">
        	<img src="imagens/funk.jpg" alt="Funk" title="Funk"/>
        </a>
        <p class="titulo"><a id="sub" href="generos/funk.php">Funk</a></p>
        <p class="descri">Disco Music, Post-punk, Drum and Bass</p>
      </div> 
      <!-- TÉRMINO DO TERCEIRO BLOCO  -->

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