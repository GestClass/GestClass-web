<?

  class Image
  {
    static function processaImagem($foto = array())
    {
      if (!preg_match("/\.(gif|bmp|png|jpg|jpeg|jfif){1}$/i", $foto["name"], $ext)) { 
        $msg = "O arquivo enviado não é uma foto";
      } else {

        preg_match("/\.(gif|bmp|png|jpg|jpeg|jfif){1}$/i", $foto["name"], $ext);
        $nomeImagem = md5(uniqid(time())) . "." . $ext[1];
        $caminho = "../upload/" . $nomeImagem;
        move_uploaded_file($foto["tmp_name"], $caminho);

        $msg = $nomeImagem;
      }

      return $msg;
    }
  }
?>
