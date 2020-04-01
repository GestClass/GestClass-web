<?php

// A CONEXAO A BAIXO ESTA EM PDO, SE VOCE NAO TIVER A VERSAO 7 DO PHP NÃO VAI FUNCIONAR

define('HOST', 'localhost');
define('USER', 'root');
<<<<<<< HEAD
define('PASS', '1234');
define('DBNAME', 'GestClass');
=======
define('PASS', '');
define('DBNAME', 'gestclass');
>>>>>>> 17bf610ffa35399308f9c474de9769b66709cc3e

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS)
or die('Erro ao estabelecer a conexão!!!');


?>
