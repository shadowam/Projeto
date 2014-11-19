<?php

  //dados de acesso ao BD MySQL
  define ('HOSTNAME' , 'localhost'); // Nome do Servidor.
  define ('USUARIO' , 'root'); // Nome de usuário da conexão.
  define ('SENHA' , NULL); // Senha da conexão.
  define ('BANCO' , 'u501434944_music'); // Nome do banco.
  define ('CHARSET' , 'utf8'); // Define a codigificação dos caracteres.

  $mysql = mysqli_connect(HOSTNAME, USUARIO, SENHA, BANCO) or die (mysqli_connect_error($mysql)); // Variável link recebe a conexão.
  
  // FUNÇÕES DE CONEXÃO
  // Função que liga o banco
  Function ConectaBanco() {
    $mysql = mysqli_connect(HOSTNAME, USUARIO, SENHA, BANCO) or die (mysqli_connect_error($mysql)); // Variável link recebe a conexão.
    return $mysql; // Returna a conexão.
  }

  // Função que fecha o banco
  Function FechaBanco($mysql){
    mysqli_close($mysql) or die (mysqli_connect_error());
  }

  // Função que envia a Query
  Function ExecutaQuery($query) {
    $mysql = ConectaBanco(); // Recebe os dados de conexão e os armazena no $mysql.
    ConectaBanco(); // Liga o banco.
    $result = mysqli_query($mysql , $query) or die (mysqli_error($mysql)); // Executa a query.
    FechaBanco($mysql); // Desconecta do banco;
    return $result; // retorna o resultado da query;
  }

  // Função quer retira o ' dos textos e protege contra sql injection
  function Limpa($data) { // recebe o array com os dados a serem utilizados em querys e tira todos os ' (apóstrofos*) Protegendo contra sql injection.
    $mysql = ConectaBanco();  // Recebe os dados de conexão e os armazena no $mysql.
    if (!is_array($data)) // Se a variável passada por referência não for um array ...
      $data = mysqli_real_escape_string($mysql , $data); // Função utilizada para tirar os caracteres que podem prejudicar o banco.
    else { // se for um array ...
      $novo_array = $data; // novo_array recebe $data.
      foreach ($novo_array as $indice => $valores ) { // a cada laço o foreach atribui os indices do $novo_array na variável indice e os valores do $novo_array na variável $valores
        $indice =  Limpa($indice); // Função recursiva, como agora a variável indice não é um array ele vai cair no primeiro if dessa função Limpa() limpando os caracteres que podem prejudicar o banco.
        $valores = Limpa($valores); // Função recursiva, como agora a variável valores não é um array ele vai cair no primeiro if dessa função Limpa() limpando os caracteres que podem prejudicar o banco.
        $data[$indice] = $valores;  // No final de cada laço o array $data será remontado com os novos índices e valores($indice => valores);
      } // fim o foreach, ou seja, ele rodou todo o array $data e limpou todos os caracteres que podem prejudicar o banco.
    } // fim do else
    FechaBanco($mysql); // Ao final a função fecha a conexão com o banco.
    return($data); // Retorna o array prontinho para ser trabalhado e enviado como query para o banco =).
  }  

?>
