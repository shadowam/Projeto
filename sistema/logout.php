<?php

	session_start();
	
	if(session_destroy()) // Destrói todas as sessões
	{
		header("Location:../index.php"); //Redireciona para a página inicial
	}
  
?>
