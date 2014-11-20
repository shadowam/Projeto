<?php
  require_once "conexoes.php"; // requerindo as variáveis do config.php

  session_start();

  // Criando Um Array($cadastro) para ser utilizado na função GravaRegistro().
  $nome = Limpa(strip_tags(trim($_POST['user_nome']))); //Tira as tags html(strip_tags), tira os longos espaços(trim) => da variável
  $email = Limpa(strip_tags(trim($_POST['user_email']))); //Tira as tags html(strip_tags), tira os longos espaços(trim) => da variável
  $login = Limpa(strip_tags(trim($_POST['user_login']))); //Tira as tags html(strip_tags), tira os longos espaços(trim) => da variável 
  $senha1 = Limpa(strip_tags(trim($_POST['user_pw']))); //Tira as tags html(strip_tags), tira os longos espaços(trim) => da variável 

  /* Protegendo a senha usando o método Salt, que cria uma cadeia de dados extras durante
     o processo de Hash dificultando extretamente a possibilidade da senha ser crackeada. */
  $hash = hash('sha256', $senha1);

  function createSalt()
  {
      $text = md5(uniqid(rand(), true));
      return substr($text, 0, 3);
  }

  $salt = createSalt();
  $senha = hash('sha256', $salt . $hash);
  /* FIM DA CRIAÇÃO DE SENHA COM SALT */

  // Comando SQL para buscar 'login' digitado no banco de dados
  $sel = "SELECT * FROM user WHERE user_login = '$login'";

  // Efetua uma query no banco usando a variável $sel.
  $query = mysqli_query($mysql, $sel) or die (mysqli_error($mysql));
  // Se 'login' já existir no banco, informa ao usuário.
  if (mysqli_num_rows ($query) == 1) {
    echo "<script>alert('Login escolhido já cadastrado no sistema.\\nPor favor escolha outro.'); history.back();</script>"; 
  }
  // Senão
  else {
    // Variável para inserir os dados digitados no banco
    $inserir = "INSERT INTO user (user_nome, user_email, user_login, user_pw, salt)
                VALUES ('$nome', '$email', '$login', '$senha', '$salt')";

    // Tenta inserir os dados no banco usando a variável $inserir.
    $cad = mysqli_query($mysql, $inserir) or die (mysqli_error($mysql));

    // Se inserção não for sucedida, informa que ocorreu um erro, e fecha a conexão.
    if($cad != 1) {
      echo "<script>alert('O cadastro não pôde ser concluido. Tente novamente.');</script>";
      mysqli_error($cad);
      mysqli_close($mysql);
    }
    // Se inserção for bem sucedida
    else {
      // Cria variável para pegar os dados do banco, pesquisando pelo '$login'.
      $sel = "SELECT id, user_nome, user_pw, salt FROM user
              WHERE user_login = '$login'";

      // Efetua uma query usando a variável '$sel'.
      $result = mysqli_query($mysql, $sel) or die (mysqli_error($mysql));

      // Busca os dados requisitados pela variável $result, retornando como uma matriz associativa
      $userData = mysqli_fetch_array($result, MYSQL_ASSOC) or die (mysqli_error($result));
      // Remonta a senha do usuário juntando o hash de 'salt' que se encontra no banco e hash da variável '$senha'.
      $hash = hash('sha256', $userData['salt'] . hash('sha256', $senha));

      session_regenerate_id(); // Cria um novo ID para a sessão ativa(se houver) e mantém as informações da mesma
      $_SESSION['sess_user_id'] = $userData['id'];
      $_SESSION['sess_user_nome'] = $userData['user_nome'];
      session_write_close(); 

      mysqli_close($mysql);

      echo "<script>alert('Cadastro efetuado com sucesso!'); window.location.replace('../generos.php');</script>";
    }
  }

?>