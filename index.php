<?php 

  require_once "sistema/conexoes.php"; // requerindo as variáveis do conexoes.php
  require_once "sistema/funcoes.php"; // requerindo as funções do funcoes.php

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
      <link rel="stylesheet" type="text/css" href="estilos/login.css" />
      <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />
      <link rel="icon" type="image/png" href="imagens/favicon.ico" />
  </head>

  <body>
  	<div id="topo"> 
      <div id="top_conteudo">
        <form method="post" action="sistema/login.php">
          <label for="login1">Login</label><input type="text" name="login1" id="login1" />
          <label for="senha1">Senha</label><input type="password" name="senha1" id="senha1" />
          <input type="submit" name="enviar" value="ENTRAR" />
        </form>
  	    <p id="site_nome"><a href="index.php" ><span>música</span>brasil</a></p>
      </div> <!-- FIM DA DIV top_conteudo -->
    </div> <!-- FIM DA DIV topo -->

  	<div id="conteudo">
      <img src="imagens/principal.png" alt="Música Brasil" /> 

      <div id="cadastro">
        <h1>Abra uma conta</h1> 
        <h3>É gratuito e sempre será.</h3> 
        <form method="post" action="sistema/cadastrar.php">
          <table id="cad_table">
            <tr>
              <td>Nome:</td>
              <td><input type="text" name="user_nome" id="user_nome" class="txt" placeholder="Digite seu nome completo." required pattern="[a-zA-Z. -]+" /></td>
            </tr>
            <tr>
              <td>Email:</td>
              <td><input title="Por favor, digite um e-mail válido." type="email" name="user_email" id="email" class="txt" placeholder="Digite e-mail válido." required pattern="[a-zA-Z0-9._\-]{2,}@[a-zA-Z0-9.\-]{2,}[.]{1}[a-zA-Z]{2,}" /></td>           
            </tr>
            <tr>
              <td>Login:</td>
              <td><input title="Apenas letras e números são aceitos, sem espaço ou caracteres especiais." type="text" name="user_login" id="usuario"
              class="txt" maxlength="15" placeholder="Seu login, digite apenas letras e números." required pattern="^[a-zA-Z0-9]{3,}" />
              </td>
            </tr>
            <tr>
              <td>Senha:</td>
              <td><input title="A senha precisa ter pelo menos 6 caracteres, com números e letras." type="password" name="user_pw" id="senha" class="txt" 
              maxlength="12" placeholder="Senha com letras e números, 6 a 12 caracteres." required pattern="(?=.*\d)(?=.*[a-z]).{6,}" />
              </td>
            </tr>
            <tr>
              <td colspan="2"><input type="submit" value="Cadastrar" class="botao" id="btnCad" name="Cadastrar" />&nbsp;
              <input class="botao" type="reset" value="Apagar" />
            </tr> 
          </table>
        </form>
      </div>
    </div> <!-- FIM DA DIV conteudo -->

  	<div id="rodape">
  		<div id="conteudo_rodape">
          <p>Copyright &copy;MúsicaBrasil 2015 musicabasil.net - Thiagos Produções S.A</p> 		
      </div > <!-- FIM DA DIV conteudo_rodape -->
    </div> <!-- FIM DA DIV rodape -->

  </body>
</html>