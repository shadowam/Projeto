<?php

  require_once "conexoes.php"; // requerindo as variáveis do config.php
  require_once "funcoes.php"; // requerindo as funções do config.php

  // Criando Um Array($cadastro) para ser utilizado na função GravaRegistro().
  $cadastro['user_nome'] = Limpa(strip_tags(trim($_POST['user_nome']))); //Tira as tags html(strip_tags), tira os longos espaços(trim) => da variável
  $cadastro['user_email'] = Limpa(strip_tags(trim($_POST['user_email']))); //Tira as tags html(strip_tags), tira os longos espaços(trim) => da variável
  $cadastro['user_login'] = Limpa(strip_tags(trim($_POST['user_login']))); //Tira as tags html(strip_tags), tira os longos espaços(trim) => da variável 
  $cadastro['user_pw'] = Limpa(strip_tags(trim($_POST['user_pw']))); //Tira as tags html(strip_tags), tira os longos espaços(trim) => da variável 

  $login = $cadastro['user_login'];
  $senha = $cadastro['user_pw'];

  // Comando SQL de verificação de autenticação
  $sel = "SELECT * FROM user WHERE user_login = '$login'";

  //Efetua uma query no banco usando a variável $sel. Em caso de erro a mensagem é informada na tela
  $query = mysqli_query($mysql, $sel) or die ("Erro na seleção da tabela.");

  if (mysqli_num_rows ($query) == 1) {
    echo "<script>alert('Login digitado já cadastrado no sistema.\\nPor favor escolha outro.'); history.back();</script>"; 
  }

  else{
    $result = GravaRegistro('user', $cadastro); // <= envio como referência para a função GravaRegistro, os parâmetros 'user' que é o nome da tabela que eu quero gravar
                                              // e o array ($cadastro) que será gravado. Dessa forma a função GravaRegistro vai trabalhar com as referencias de acordo com as instruções que estão nela. 
  // OBS: POSTERIORMENTE CABE IMPLEMENTAR UMA FUNÇÃO QUE VERIFICA SE O CADASTRO JÁ EXISTE. (SELECT ...)

    if($result){
      echo "<script>alert('Cadastro efetuado com sucesso!');</script>";

      //Comando SQL de verificação de autenticação
      $sel = "SELECT * FROM user WHERE user_login = '$login' AND user_pw = '$senha'";

      //Efetua uma query no banco usando a variável $sel. Em caso de erro a mensagem é informada na tela
      $result = mysqli_query($mysql, $sel) or die ("Erro na seleção da tabela.");

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
      else {
        mysqli_error($result);
      }
    }
  }

    //window.location.replace('../entrar.php')</script>";

    //header("location: generos.php "); // Após o cadastro, a página redireciona o usuário à página generos.php, isso futuramente será modificado colocando instruções para criar sessões ...
?>