<?php

// $conexao = mysqli_connect(
//     'localhost',
//     'root',
//     '',
//     'gestclass'
// )
//     or die('Erro ao estabelecer a conexão!!!');


// A CONEXAO A BAIXO ESTA EM PDO, SE VOCE NAO TIVER A VERSAO 7 DO PHP NÃO VAI FUNCIONAR
  
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'gestclass');

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);

?>