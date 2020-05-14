<?php
require_once 'conexao.php';
$idTurma = "";
$idTurma = $_POST['id'];       
$_SESSION['idTurma'] = $idTurma;

echo $idTurma;
?>