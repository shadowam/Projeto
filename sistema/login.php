<?php
    
  require_once "config.php"; // requerindo as variáveis do config.php
  require_once "conexoes.php"; // requerindo as variáveis do config.php
  require_once "funcoes.php"; // requerindo as funções do config.php

  // as variáveis login e senha recebem os dados digitados na página anterior
  $login = Limpa(strip_tags(trim($_POST['login1']))); //Tira as tags html(strip_tags), tira os longos espaços(trim) => da variável
  $senha = Limpa(strip_tags(trim($_POST['senha1']))); //Tira as tags html(strip_tags), tira os longos espaços(trim) => da variável

  //Comando SQL de verificação de autenticação
  $sel = "SELECT * FROM user
          WHERE user_login = '$login'
          AND user_pw = '$senha'";

  //Efetua uma query no banco usando a variável $sel. Em caso de erro a mensagem é informada na tela
  $result = mysqli_query($link, $sel) or die ("Erro na seleção da tabela.");

  //Caso consiga logar, cria a sessão
  if (mysqli_num_rows ($result) == 1) {
    $linha = mysqli_fetch_array ($result);
    $nome = $linha['user_nome'];

    session_start();

    $_SESSION['user_login'] = $login;
    $_SESSION['user_pw'] = $senha;
    $_SESSION['user_nome'] = $nome;

    header('location:../generos.php');
  }

  //Caso contrário redireciona para a página de autenticação
  else{
    //Mostra ao usuário que o Login ou Senha estão incorretos e continua na página
    echo "<script>alert('Login e/ou senha incorretos.\\nVerifique os dados digitados.'); history.back();</script>";
  }

?>
