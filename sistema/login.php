<?php
  require_once "conexoes.php"; // requerindo as variáveis do config.php

  ob_start();
  session_start();

  if(isset($_POST['enviar'])) {

    unset($_SESSION['sess_admin_id']);
    unset($_SESSION['sess_admin_nome']);

    // as variáveis login e senha recebem os dados digitados na página anterior
    $login = Limpa(strip_tags(trim($_POST['login1']))); //Tira as tags html(strip_tags), tira os longos espaços(trim) => da variável
    $senha = Limpa(strip_tags(trim($_POST['senha1'])));

    //Comando SQL de verificação de usuário
    $sel = "SELECT id, user_nome, user_pw, salt FROM user
            WHERE user_login = '$login'";

    //Efetua uma query no banco usando a variável $sel. Em caso de erro a mensagem é informada na tela
    $result = mysqli_query($mysql, $sel) or die (mysqli_error($sel));

    if (mysqli_num_rows ($result) == 0) { // Usuário não encontrado, volta para a página anterior.
      echo "<script>alert('Usuário não encontrado!'); history.back();</script>";
    }

    else { 
      // Busca os dados requisitados pela variável $result, retornando como uma matriz associativa
      $userData = mysqli_fetch_array($result, MYSQL_ASSOC); 
      // Remonta a senha do usuário juntando o hash de 'salt' que se encontra no banco e hash da variável '$senha'.
      $hash = hash('sha256', $userData['salt'] . hash('sha256', $senha)); 

      if($hash != $userData['user_pw']) {// Compara a senha no banco, se for diferente informa ao usuário.
        echo "<script>alert('Senha incorreta!'); history.back();</script>";
      }
      else { // se senha estiver correta, criar nova sessão e redireciona para a página inicial.
        session_regenerate_id();
        $_SESSION['sess_user_id'] = $userData['id'];
        $_SESSION['sess_user_nome'] = $userData['user_nome'];
        session_write_close();

        mysqli_close($mysql);
        
        header('Location: ../generos.php');
      }
    }
  }

  else if(isset($_POST['loginadm'])){

    // remove as variáveis de sessão caso por algum erro o usuário normal não tenha sido deslogado
    unset($_SESSION['sess_user_id']);
    unset($_SESSION['sess_user_nome']);

    // as variáveis login e senha recebem os dados digitados na página anterior
    $login = Limpa(strip_tags(trim($_POST['login']))); //Tira as tags html(strip_tags), tira os longos espaços(trim) => da variável
    $senha = Limpa(strip_tags(trim($_POST['senha'])));

    //Comando SQL de verificação de usuário
    $sel = "SELECT id, nome, login, senha, salt FROM admin
            WHERE login = '$login'";

    //Efetua uma query no banco usando a variável $sel. Em caso de erro a mensagem é informada na tela
    $result = mysqli_query($mysql, $sel) or die (mysqli_error($sel));

    if (mysqli_num_rows ($result) == 0) { // Administrador não encontrado, volta para a página anterior.
      echo "<script>alert('Administrador não existe!'); history.back();</script>";
    }

    else { 
      // Busca os dados requisitados pela variável $result, retornando como uma matriz associativa
      $userData = mysqli_fetch_array($result, MYSQL_ASSOC); 
      // Remonta a senha do usuário juntando o hash de 'salt' que se encontra no banco e hash da variável '$senha'.
      $hash = hash('sha256', $userData['salt'] . hash('sha256', $senha)); 

      if($hash != $userData['senha']) {// Compara a senha no banco, se for diferente informa ao usuário.
        echo "<script>alert('Senha incorreta!'); history.back();</script>";
      }
      else { // se senha estiver correta, criar nova sessão e redireciona para a página inicial.
        session_regenerate_id();
        $_SESSION['sess_admin_id'] = $userData['id'];
        $_SESSION['sess_admin_nome'] = $userData['nome'];
        session_write_close();

        mysqli_close($mysql);
        
        header('Location: ../painel/painel.php');
      }
    }
  }

?>
