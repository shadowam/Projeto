<?php
	session_start();

	unset($_SESSION['sess_user_id']);
	unset($_SESSION['sess_user_nome']);
	unset($_SESSION['sess_admin_id']);
	unset($_SESSION['sess_admin_nome']);

	session_destroy();
	
	header("Location:../index.php"); //Redireciona para a página inicial
?>
