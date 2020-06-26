<?php

require_once  'conexao.php';

// $id_usuario = $_SESSION["id_usuario"];
// $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];
$nome_padrao = $_GET["nome_padrao"];


$query_select = $conn->prepare("SELECT ID_aula_escola FROM aula_escola WHERE fk_id_escola_aula_escola = $id_escola AND nome_padrao = $nome_padrao");
$query_select->execute();
$id = $query_select->fetch(PDO::FETCH_ASSOC);

// $id = implode($id_aulas);

// $result = count($id);
// for ($cont = 0; $cont < ($result); $cont++) {
//     echo $nome_padrao . "<br><br>";
//     echo $id[$cont] . "<br><br>";
// }

// $id_da_grade = implode($id_grade);

// $query_delete_grade = $conn->prepare("DELETE FROM grade_curricular WHERE ID_grade_curricular = $id_da_grade");
// $query_delete_grade->execute();

// $query_delete_aula = $conn->prepare("DELETE FROM aula_escola WHERE ID_aula_escola = :id_aula AND fk_id_escola_aula_escola = $id_escola");
// $query_delete_aula->bindParam(':id_aula', $id_aula);

// if ($query_delete_grade->execute() && $query_delete_aula->execute()) {
//     if ($id_tipo_usuario == 2) {
//         echo "<script>alert('Aula excluida com sucesso');
//         window.location='../homeDiretor.html.php';
//         </script>";
//     } elseif ($id_tipo_usuario == 3) {
//         echo "<script>alert('Aula excluida com sucesso');
//         window.location='../homeSecretaria.html.php';
//         </script>";
//     } else {
//         echo "<script>alert('Usuario sem permissão');
//         window.location='../index.php'</script>";
//     }
// } else {
//     if ($id_tipo_usuario == 2) {
//         echo "<script>alert('Aula nao excluida');
//         window.location='../homeDiretor.html.php';
//         </script>";
//     } elseif ($id_tipo_usuario == 3) {
//         echo "<script>alert('Aula nao excluida');
//         window.location='../homeSecretaria.html.php';
//         </script>";
//     } else {
//         echo "<script>alert('Usuario sem permissão');
//         window.location='../index.php'</script>";
//     }
// }
// 
