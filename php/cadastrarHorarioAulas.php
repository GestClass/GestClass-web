<?php

include_once 'conexao.php';

$id_escola = $_SESSION["id_escola"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$nomeHorario = $_POST["nomeHorario"];
$aulaNome = $_POST["aula"];
$inicio = $_POST["inicio"];
$termino = $_POST["termino"];
$turno = $_POST["turno"];

if (($aulaNome != "") && ($inicio != "") && ($termino != "")) {

    $result = count($aulaNome);
    for ($cont = 0; $cont < ($result); $cont++) {

        $queryInsert = $conn->prepare("INSERT INTO aula_escola(nome_padrao, nome_aula, aula_start, aula_end, fk_id_turno_aula_escola, fk_id_escola_aula_escola) 
        VALUES (:nomeHorario, :aulaNome, :inicio, :termino, :turno, :id_escola)");

        $queryInsert->bindParam(':nomeHorario', $nomeHorario, PDO::PARAM_STR);
        $queryInsert->bindParam(':aulaNome', $aulaNome[$cont], PDO::PARAM_STR);
        $queryInsert->bindParam(':inicio', $inicio[$cont], PDO::PARAM_STR);
        $queryInsert->bindParam(':termino', $termino[$cont], PDO::PARAM_STR);
        $queryInsert->bindParam(':turno', $turno, PDO::PARAM_STR);
        $queryInsert->bindParam(':id_escola', $id_escola, PDO::PARAM_STR);
        $queryInsert->execute();

        if ($queryInsert->rowCount()) {
            if ($id_tipo_usuario == 2) {

                echo "<script>alert('Horário Criado com Sucesso');
                window.location='../homeDiretor.html.php';
                </script>";
            } elseif ($id_tipo_usuario == 3) {

                echo "<script>alert('Horário Criado com Sucesso');
                window.location='../homeSecretaria.html.php';
                </script>";
            } else {
                echo "<script>alert('Usuario sem permissão');
                window.location='../index.php'</script>";
            }
        } else {
            if ($id_tipo_usuario == 2) {

                echo "<script>alert('Erro ao criar Horário');
                window.location='../homeDiretor.html.php';
                </script>";
            } elseif ($id_tipo_usuario == 3) {

                echo "<script>alert('Erro ao criar Horário');
                window.location='../homeSecretaria.html.php';
            </script>";
            } else {
                echo "<script>alert('Usuario sem permissão');
                window.location='../index.php'</script>";
            }
        }
    }
} else {
    if ($id_tipo_usuario == 2) {

        echo "<script>alert('Preencha os Campos e Tente Novamente');
        window.location='../../homeDiretor.html.php';
        </script>";
    } elseif ($id_tipo_usuario == 3) {

        echo "<script>alert('Preencha os Campos e Tente Novamente');
        window.location='../../homeSecretaria.html.php';
        </script>";
    } else {
        echo "<script>alert('Usuario sem permissão');
        window.location='../../index.php'</script>";
    }
}
