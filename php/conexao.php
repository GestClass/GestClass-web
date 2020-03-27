<?php

// A CONEXAO A BAIXO ESTA EM PDO, SE VOCE NAO TIVER A VERSAO 7 DO PHP NÃO VAI FUNCIONAR
  
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'GestClass');

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS)
or die('Erro ao estabelecer a conexão!!!');


?>