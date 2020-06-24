<?php

include_once 'conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$id_padrao = $_POST["id_padrao"];
$id_aula = $_POST["id_aula"];
$nome_aula = $_POST["aula"];
$inicio = $_POST["inicio"];
$termino = $_POST["termino"];
$nome_padrao = $_POST["nome_padrao"];
$teste = $_POST["teste"];

foreach ($nome_padrao as $teste) {

    $result = count($nome_aula);
    for ($cont = 0; $cont < ($result); $cont++) {
        // echo $id_aula[$cont] . "<br><br>";
        echo $teste[$cont] . "<br><br>";
        // echo $nome_aula[$cont] . "<br><br>";
        // echo $inicio[$cont] . "<br><br>";
        // echo $termino[$cont] . "<br><br>";
    }
}




//     // $query_update = $conn->prepare("UPDATE  aula_escola  SET  ID_aula_escola = , nome_padrao = , nome_aula = , aula_start = , aula_end = , fk_id_turno_aula_escola = , fk_id_escola_aula_escola = WHERE fk_id_escola_aula_escola = :id_escola");
// }

// echo $nome_aula[$cont] . "<br><br>";
// echo $inicio[$cont] . "<br><br>";
// echo $termino[$cont] . "<br><br>";
// echo $id_aula[$cont] . "<br><br>";
// echo $id_padrao[$cont] . "<br><br>";