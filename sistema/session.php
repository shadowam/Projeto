<?php

	require_once "sistema/config.php"; // requerindo as variáveis do config.php
	require_once "sistema/conexoes.php"; // requerindo as variáveis do config.php
	require_once "sistema/funcoes.php"; // requerindo as funções do config.php

	session_start();// Inicia a sessão

	// Guarda a sessão na variável user_check
	$user_check = $_SESSION['user_login'];

	// SQL Query para pegar o login do usuário no banco de dados
	$ses_sql = mysqli_query($link, "SELECT user_login FROM user WHERE user_login='$user_check'");

	// Busca o resultado de uma linha e o coloca numa matriz associativa
	$row = mysqli_fetch_assoc($ses_sql);

	// Guarda na variável login_session
	$login_session = $row['user_login'];

	// Se uma sessão não estiver ativa, fecha a conexão com o banco e volta para a página inicial
	if(!isset($login_session)){
		FechaBanco($link); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	}

?>