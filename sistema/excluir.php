<?php
  require_once "conexoes.php"; // requerindo as variáveis do config.php

  session_start();

  $deletar = "DELETE FROM genero WHERE gen_id=".$_GET['id']."";

  mysqli_query($mysql, $deletar) or die (mysqli_error($deletar));

  mysqli_close($mysql);

  Header('Location: ../painel/gerenciar-gen.php');
  
?>
