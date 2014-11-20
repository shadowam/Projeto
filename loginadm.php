<?php
	require_once "sistema/conexoes.php";

	if(@$_GET['go'] == 'logar'){
		$admin = $_POST['login'];
		$pwd = $_POST['senha'];

		$busca = "SELECT * FROM admin
				  WHERE login = '$admin'
				  AND senha = '$pwd'";

		$resultado = mysqli_query($mysql, $busca) or die (mysqli_error($mysql));

		if(mysqli_num_rows ($resultado) == 1){
			echo "<script>alert('Administrador logado com sucesso.'); window.location.replace('./painel/painel.php');</script>";
		}
		else{
			echo "<script>alert('Login ou senha inválidos.'); history.back();</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	    	<link rel="shortcut icon" href="imagens/icon.png" >
		<title>ADMINISTRADOR</title>
		<link rel="stylesheet" type="text/css" href="estilos/login.css">
	</head>
  <body>
  	<div id="topo"> 
      <div id="top_conteudo">
  	    <p id="site_nome"><a href="index.php"><span>música</span>brasil</a></p>
      </div> <!-- FIM DA DIV top_conteudo -->
    </div> <!-- FIM DA DIV topo -->

  	<div id="conteudo">
      <div id="cadastro">
		<h2>Login Administrador</h2><br/><br/>
		<form method="post" action="sistema/login.php">
			<div id="login_table">
				Usuário:
				<input type="text" name="login" id="login" class="txt" maxlength="15" placeholder="Digite seu nome de usuário."><br/><br/>
				&nbsp;Senha:&nbsp;
				<input type="password" name="senha" id="senha" class="txt" maxlength="15" placeholder="Digite sua senha."><br/><br/>
				<input type="submit" value="Entrar" class="botao" name="loginadm" id="btnEntrar">
			</div>
		</form>
      </div>
    </div> <!-- FIM DA DIV conteudo -->

  	<div id="rodape">
  		<div id="conteudo_rodape">
			<p>Copyright &copy;MúsicaBrasil 2015 musicabrasil.net - Thiagos Produções S.A</p>
		</div > <!-- FIM DA DIV conteudo_rodape -->
    </div> <!-- FIM DA DIV rodape -->
  </body>
</html>
