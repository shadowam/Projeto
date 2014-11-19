<?php
  require_once "sistema/conexoes.php"; // requerindo as variáveis do config.php

  include "sistema/session.php";
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
  <head>
    <title>Música Brasil - Tudo sobre a música brasileira</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="content-language" content="pt-br" />
    <meta name="description" content="Gêneros músicas, estilos, bandas e artistas"/>
    <meta name="author" content="minor S.A"/>
    <meta name="keywords" content="músicas, tudo sobre bandas, características das músicas brasileiras"/>
    <link rel="stylesheet" type="text/css" href="estilos/estilo_prin.css" />
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />
    <link rel="icon" type="image/png" href="imagens/favicon.ico" />
  </head>
  <body>
    <?php

      // quantidade máxima de
      // registros exibidos por página
      $registros = 9;

      // define a página atual onde o usuário se encontra
      // verifica se o usuário clicou na lista de páginas
      // da paginação PHP e atribui a página clicada ou 1
      // para a página atual
      $pagina_atual = isset($_REQUEST['pagina'])? intval($_REQUEST['pagina']) : 1;

      // encontra a quantidade total de registros no banco de dados ordenados pelo ID
      $resultado = $mysql->query("SELECT count(*) AS total FROM genero ORDER BY gen_id")->fetch_assoc();
      $registros_total = $resultado['total'];

      // calculo para encontrar o total
      // de páginas necessárias para a paginação
      $paginas = ceil($registros_total / $registros);

      // Calcula os intervalos iniciais e finais
      // para saber quais registros vamos mostrar
      $fim = $registros * $pagina_atual;
      $inicio = ($fim - $registros);

      // utilizamos o limite inicial com a quantidade máxima de registros retornados pela consulta.
      // a consulta agora está ordenada por nome do país
      $sql = "SELECT * FROM genero ORDER BY gen_id LIMIT {$inicio}, {$registros}";
      $dados = $mysql->query($sql);                        

      // Fecha a conexão com o banco de dados
      $mysql->close();

    ?>

    <div id="topo"> 
      <div id="top_conteudo"> 
        <p id="site_nome"><a href="index.php" ><span>música</span>brasil</a></p>
        <div class="bemvindo">Bem vindo(a) <?php echo $_SESSION['user_nome']; ?>.<a class="sair" href="sistema/logout.php">Sair</a></div>
        
        <a href="painel/painel.php" class="painel"><img src="imagens/painel.png" alt="engrenagens" title="Obs: Só será visivel ao ADMIN !"/></a>
        
        <div id="divisao"> </div>

        <ul id="nave">
          <li><a href="#">Home</a></li>
          <li><a href="generos.php">Gêneros</a></li>
          <li><a href="#">Novidades</a></li>
          <li><a href="#">Minha Conta</a></li>
          <li><a href="#">Blablabla</a></li>
        </ul>
      </div > <!-- FIM DA DIV top_conteudo -->
    </div> <!-- FIM DA DIV topo -->
    <div id="conteudo">
      <h1>Gêneros</h1>
      
      <div class="linha_conteudo2"></div>

      <?php
        while($dado = $dados->fetch_assoc()) {
          print "       
            <div class='bloco'>
            <div class='imagem'>
              <a href='generos/".($dado['gen_nome']).".php''>  
                <img src='".$dado['gen_foto']."' alt='".utf8_decode($dado['gen_nome'])."' title='".utf8_decode($dado['gen_nome'])."' />
              </a>
              </div>
              <p class='titulo'><a id='sub' href='generos/".utf8_decode($dado['gen_nome']).".php'>".utf8_decode($dado['gen_nome'])."</a></p>
              <p class='descri'>Ópera, Sinfonia,  Sonata</p>
            </div> ";
        }
      ?>

      <div class="linha_conteudo"></div>

      <ul class="navegacao">
         
      <?php for ($pagina = 1; $pagina <= $paginas; $pagina++) : ?>
          <?php if ($pagina == $pagina_atual): ?>
              <li class="active"><?php print $pagina; ?></li>
          <?php else: ?>
            <li>
                <a href="?pagina=<?php print $pagina; ?>">
                  <?php print $pagina; ?>
                </a>
            </li>
          <?php endif; ?>
      <?php endfor; ?>
      </ul>

    </div> <!-- FIM DA DIV conteudo -->

    <div id="rodape">
      <div id="conteudo_rodape">
        <p>Informações sobre o site e blablabla</p>
        <p>FAQ / Sobre / Bla bla bla / Política de Privacidade / Bla bla bla / Termos de serviço</p>
        <p>Copyright &copy;M.ino.R 2015 blablabla</p>
        <p>......Mais alguma coisa se tiver .........</p>
      </div > <!-- FIM DA DIV conteudo_rodape -->
    </div> <!-- FIM DA DIV rodape -->
  </body>
</html>