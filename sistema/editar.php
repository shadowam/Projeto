<?php
  require_once "conexoes.php"; // requerindo as variáveis do config.php

  session_start();

  $id = $_SESSION['id'];
  $carac = mysqli_real_escape_string($mysql, $_POST['txtcarac']);
  $hist = mysqli_real_escape_string($mysql, $_POST['txthist']);

  // Verifica por erros
  if ($carac == NULL) {
    echo "<script>alert('O campo Caracteristicas não pode ficar em branco.'); history.back();</script>";
    //die ('Aconteceu um erro durante o upload.');
  }

  // Verifica se arquivo já existe
  if ($hist == NULL) {
    echo "<script>alert('O campo História não pode ficar em branco.'); history.back();</script>";
    //die ('Aconteceu um erro durante o upload.');
  }

  $alterar = "UPDATE genero SET gen_carac='$carac', gen_hist='$hist' WHERE gen_id='$id'";

  mysqli_query($mysql, $alterar) OR die (mysqli_error($mysql));

  if (mysqli_affected_rows($mysql) >= 1) {
    echo "<script>alert('Gênero atualizado com sucesso!'); window.location.replace('../painel/gerenciar-gen.php');</script>";
  }
  else {
    echo "Ocorreu um erro e as alterações não foram salvas.";
  }

  mysqli_close($mysql);

?>
