<?php

$aulaNome = $_POST["aula"];
$inicio = $_POST["inicio"];
$termino = $_POST["termino"];

$result = count($aulaNome);

for ($i = 0; $i < ($result); $i++) {
    echo "Aula: " . $aulaNome[$i]."<br>";
    echo " Inicio: " . $inicio[$i] . "<br>";
    echo " Termino: " . $termino[$i] . "<br><br>";
}

?>