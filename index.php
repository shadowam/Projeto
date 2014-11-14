<?php 

  require_once "sistema/config.php"; // requerindo as variáveis do config.php
  require_once "sistema/conexoes.php"; // requerindo as variáveis do config.php
  require_once "sistema/funcoes.php"; // requerindo as funções do config.php

  if (isset($_POST['Cadastrar'])){ // se existir o clique no botão Cadastrar.

    // Criando Um Array($cadastro) para ser utilizado na função GravaRegistro().
    $cadastro['user_nome'] = Limpa(strip_tags(trim($_POST['user_nome']))); // Tira as tags html(strip_tags), tira os longos espaços(trim) => da variável $_POST['senha']
    $cadastro['user_email'] = Limpa(strip_tags(trim($_POST['user_email']))); // Tira as tags html(strip_tags), tira os longos espaços(trim) => da variável $_POST['senha']
    $cadastro['user_login'] = Limpa(strip_tags(trim($_POST['user_login']))); // Tira as tags html(strip_tags), tira os longos espaços(trim) => da variável $_POST['senha']
    $cadastro['user_pw'] = Limpa(strip_tags(trim($_POST['user_pw']))); // Tira as tags html(strip_tags), tira os longos espaços(trim) => da variável $_POST['senha']

    $result = GravaRegistro('user', $cadastro); // <= envio como referência para a função GravaRegistro, os parâmetros 'user' que é o nome da tabela que eu quero gravar e o array ($cadastro) que será gravado.
                                                // Dessa forma a função GravaRegistro vai trabalhar com as referencias de acordo com as instruções que estão nela. 

    // OBS: POSTERIORMENTE CABE IMPLEMENTAR UMA FUNÇÃO QUE VERIFICA SE O CADASTRO JÁ EXISTE. (SELECT ...)

    if($result)
      header("location: generos.php "); // Após o cadastro, a página redireciona o usuário à página generos.php, isso futuramente será modificado colocando intruções para criar sessões ...
  }

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
      <link rel="stylesheet" type="text/css" href="estilos/login.css" />
      <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />
      <link rel="icon" type="image/png" href="imagens/favicon.ico">
  </head>

  <body>
  	<div id="topo"> 
      <div id="top_conteudo">
        <form method="POST" action="login.php">
          <label for="email">Login</label><input type="text" name="email" id="email" />
          <label for="senha_log">Senha</label><input type="password" name="senha_log" id="senha_log" />
          <input type="submit" name="enviar" value="ENTRAR" />
        </form>
  	    
  	    <p id="site_nome"><a href="index.php" ><span>música</span>brasil</a></p>

  	    <div id="divisao"> </div>

        <!-- <form id="pesquisar" method="" action="">
          <input type="text" name="pesquisa" value="pesquise por algo ..." />
          <input type="submit" value="Pesquisar" name="pesquisar" />
        </form> -->
  		
      </div> <!-- FIM DA DIV top_conteudo -->
    </div> <!-- FIM DA DIV topo -->


  	<div id="conteudo">
         
      <img src="imagens/principal.png" /> 

      <div id="cadastro">

      <h1>Abra uma conta</h1> 

         <h3>É gratuito e sempre será.</h3> 

          <form method="post" action="index.php">
            <table id="cad_table">
              <tr>
                <td>Nome:</td>
                <td><input type="text" name="user_nome" id="user_nome" class="txt" placeholder="Digite seu nome completo." required pattern="[a-zA-Z. -]+"></td>
              </tr>
              <tr>
                <td>Email:</td>
                <td><input title="Por favor, digite um e-mail válido." type="email" name="user_email" id="email" class="txt" placeholder="Digite e-mail válido." required pattern="[a-zA-Z0-9._\-]{2,}@[a-zA-Z0-9.\-]{2,}[.]{1}[a-zA-Z]{2,}"></td>           
              </tr>
              <tr>
                <td>Login:</td>
                <td><input title="Apenas letras e números são aceitos, sem espaço ou caracteres especiais." type="text" name="user_login" id="usuario"
                          class="txt" maxlength="15" placeholder="Seu login, digite apenas letras e números." required pattern="^[a-zA-Z0-9]{3,}">
                </td>
              </tr>
              <tr>
                <td>Senha:</td>
                <td><input title="A senha precisa ter pelo menos 6 caracteres, com números e letras." type="password" name="user_pw" id="senha" class="txt" 
                          maxlength="12" placeholder="Senha com letras e números, 6 a 12 caracteres." required pattern="(?=.*\d)(?=.*[a-z]).{6,}">
                </td>
              </tr>
              <tr>
                <td colspan="2"><input type="submit" value="Cadastrar" class="botao" id="btnCad" name="Cadastrar">&nbsp;
                <span class="botao"><a href="./">Cancelar</a></span></td>
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