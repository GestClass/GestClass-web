<?php
    include_once 'conexao.php';

    $presenca = array(isset($_POST['presenca[]']) ? $_POST['presenca[]'] : 0);
    $RA = $_POST["RA"];

    echo "<pre>";
    var_dump($presenca);
    echo $RA;












?>