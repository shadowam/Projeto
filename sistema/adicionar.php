<?php

  require_once "conexoes.php"; // requerindo as variáveis do config.php

  function GetImageExtension($imagetype) {
    if(empty($imagetype)) return false;

    switch($imagetype) {
      case 'image/bmp': return '.bmp';
      case 'image/gif': return '.gif';
      case 'image/jpeg': return '.jpg';
      case 'image/png': return '.png';
      default: return false;
    }
  }

  // Diretório onde as imagens serão salvas 
  $pasta = "../upload/";  

  // Pega a extensão do arquivo e renomeia para o dia/hora do upload
  $imgtype=$_FILES["foto"]["type"];
  $ext= GetImageExtension($imgtype);
  $imagename=date("d-m-Y")."-".time().$ext;

  // Variável para guardar o caminho e nome do arquivo (Ex. C:\Java\logo.png)
  $arquivo = $pasta.$imagename;

  $genero = mysqli_real_escape_string($mysql, $_POST['genero']);
  $carac = mysqli_real_escape_string($mysql, $_POST['carac']);
  $hist = mysqli_real_escape_string($mysql, $_POST['historia']);

  $infoimage = getimagesize($_FILES["foto"]["tmp_name"]);

  // Verifica por erros
  if ($_FILES['foto']['error'] > 0) {
    echo "<script>alert('Aconteceu um erro durante o upload.'); history.back();</script>";
    //die ('Aconteceu um erro durante o upload.');
  }

  // Verifica se arquivo já existe
  if (file_exists($arquivo)) {
    unlink($arquivo);
    die ("<script>alert('Um arquivo com esse nome já existe.'); history.back();</script>");
  }

  // Verifica tamanho do arquivo (imagens até 500kb)
  if ($_FILES["foto"]["size"] > 500000) {
    unlink($arquivo);
    die ("<script>alert('Desculpe, o arquivo ultrapassa o tamanho limite (500kb).'); history.back();</script>");
  }

  // Limita os formatos aceitos
  if ($infoimage['mime'] != 'image/png' && $infoimage['mime'] != 'image/gif' && $infoimage['mime'] != 'image/jpeg' && $infoimage['mime'] != 'image/bmp') {
    unlink($arquivo);
    die ("<script>alert('Formato de arquivo inválido!\\nApenas arquivos JPG, PNG, GIF e BMP são aceitos.'); history.back();</script>");
  }
  if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $arquivo)) {
    unlink($arquivo);
    die ("<script>alert('Erro ao fazer upload do arquivo.\\nVerifique se o destino está disponível.'); history.back();</script>");
  }

  $inserir = "INSERT INTO genero (gen_nome, gen_foto, gen_carac, gen_hist) VALUES ('$genero', 'projeto/$arquivo', '$carac', '$hist')";

  mysqli_query($mysql, $inserir) OR die (mysqli_error($mysql));

  mysqli_close($mysql);

  die ("<script>alert('Gênero adicionado com sucesso!'); window.location.replace('../painel/gerenciar-gen.php');</script>");

?>
