<?

  class Image
  {
    static function processaImagem($arq = array(), $fotoAtual = null)
    {
      if ($fotoAtual == null) {
        if (verificaArquivo($arq)) {
          $msg = upaImagem($arq);
        } else {
          $msg = "O arquivo enviado não é uma foto";
        }
      } else {
        $resp = verificaArquivo($arq);
        if ($resp) {
          excluiImagem($fotoAtual);
          $msg = upaImagem($arq);
        } else {
          $msg = "O arquivo enviado não é uma foto";
        }
      }
      return $msg;
    }

    function verificaArquivo($arq = array())
    {
      if (!preg_match("/\.(gif|bmp|png|jpg|jpeg|jfif){1}$/i", $arq["name"], $ext)) { 
        return false;
      } else {
        return true;
      }
    }
    function upaImagem($foto = array())
    {
      preg_match("/\.(gif|bmp|png|jpg|jpeg|jfif){1}$/i", $foto["name"], $ext);
      $nomeImagem = md5(uniqid(time())) . "." . $ext[1];
      $caminho = "../upload/" . $nomeImagem;
      move_uploaded_file($foto["tmp_name"], $caminho);
      
      return $nomeImagem;
    }
    function excluiImagem($fotoAtual)
    {
      unlink("../upload/" . $fotoAtual);
    }
  }

?>