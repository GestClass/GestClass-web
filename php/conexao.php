<?php

// A CONEXAO A BAIXO ESTA EM PDO, SE VOCE NAO TIVER A VERSAO 7 DO PHP NÃO VAI FUNCIONAR

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '1234');
define('DBNAME', 'gestclass');

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS)
or die('Erro ao estabelecer a conexão!!!');

session_start();

?>
