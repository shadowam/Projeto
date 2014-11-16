<?php 

  require_once "sistema/config.php"; // requerindo as variáveis do config.php
  require_once "sistema/conexoes.php"; // requerindo as variáveis do config.php
  require_once "sistema/funcoes.php"; // requerindo as funções do config.php

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
      <link rel="stylesheet" type="text/css" href="estilos/login2.css" />
      <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />
      <link rel="icon" type="image/png" href="imagens/favicon.ico">
  </head>

  <body>
  	<div id="topo"> 
      <div id="top_conteudo">
        <span class="botao"><a href="index.php">Não tem cadastro?</a></span></td>
  	    <p id="site_nome"><a href="index.php" ><span>música</span>brasil</a></p>

  	    <div id="divisao"> </div>  		
      </div> <!-- FIM DA DIV top_conteudo -->
    </div> <!-- FIM DA DIV topo -->

  	<div id="conteudo">
      <img src="imagens/principal.png" /> 

      <div id="cadastro">
        <h1>Efetue o Login:</h1> 
        <form method="post" action="sistema/login.php">
          <table id="cad_table">
            <tr>
              <td>Usuário:</td>
              <td><input type="text" name="login1" class="txt" maxlength="15" placeholder="Digite seu nome de usuário." /></td>
            </tr>
            <tr>
              <td>Senha:</td>
              <td><input type="password" name="senha1" class="txt" maxlength="15" placeholder="Digite sua senha." /></td>
            </tr>
            <tr>
              <td colspan="2"><input type="submit" value="Entrar" class="botao" id="btnEntrar">
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