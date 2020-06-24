<?php

include_once 'php/conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];
$id_turma = $_POST['turma'];
$_SESSION['id_turma']=$id_turma;


// echo "id usuario ->".$id_usuario."</br>";
// echo "id tipo usuario ->".$id_tipo_usuario."</br>";
// echo "id escola ->".$id_escola."</br>";
?>
<!DOCTYPE html>
<html lang="pt">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        <title>GestClass - Is Cool Manage</title>
        <link rel="icon" href="assets/icon/logo.png" />
        <link rel="stylesheet" type="text/css" href="css/boletimVisualizacao.css" />
        <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
        <link rel="stylesheet" type="text/css" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
        <link rel="stylesheet" type="text/css" href="node_modules/animate.css/animate.min.css" />
        <link rel="stylesheet" type="text/css" href="node_modules/aos/dist/aos.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/menu.css" />
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/homeSecretaria.css" />
        <link rel="stylesheet" type="text/css" href="css/homePais.css" />
        <link rel="stylesheet" type="text/css" href="css/grafico.css" />
    </head>
    <body class='bodyDisciplinaGrafico'>
    <button id="btnTable" type="submit" href='#modalFilhosPuts' class=" btnDisciplina modal-trigger  btn-flat btnLightBlue center">
         Selecionar Disciplina
      </button>
    <div id="modalBoletimSelect" class="modal" data-backdrop="static">
        <div class="modal-content">
                <div class="input-field col s12 validate">
                    <form action="boletimCadastro.html.php"  method="POST">
                        <h5 class="center">Seleciona a turma:</h5>
                            <div class='select'>
                                <select name="disciplinas">
                                    <option value="" disabled selected>Selecione a Turma</option>
                                            <h4>Selecione a matéria desejada</h4>
                                            <i class="material-icons prefix blue-icon">library_books</i>
                                                <?php
                                                    $query_select_disciplina_turma_professor = $conn->prepare("SELECT fk_id_disciplina_professor_disciplinas_professor FROM disciplinas_professor WHERE fk_id_professor_disciplinas_professor = $id_usuario AND fk_id_turma_professor_disciplinas_professor= $id_turma");
                                                    $query_select_disciplina_turma_professor->execute();

                                                    while ($dados_disciplina_turma_professor = $query_select_disciplina_turma_professor->fetch(PDO::FETCH_ASSOC)) {

                                                    $id_disciplina = $dados_disciplina_turma_professor["fk_id_disciplina_professor_disciplinas_professor"];

                                                    $query_select_nome_disciplina = $conn->prepare("SELECT nome_disciplina FROM disciplina WHERE ID_disciplina = $id_disciplina;");
                                                    $query_select_nome_disciplina->execute();

                                                    while ($dados_nome_disciplina = $query_select_nome_disciplina->fetch(PDO::FETCH_ASSOC)) {
                                                        $nome_disciplina = $dados_nome_disciplina["nome_disciplina"];
                                                ?>
                                                    <option value="<?php echo $id_disciplina ?>"><?php echo $nome_disciplina ?></option>
                                                <?php
                                                }
                                            }
                                            ?>
                                            </select>
                                            <div class="button">
                                            <button id="btnTableChamada" type="submit" class=" btn-flat btnLightBlue ">
                                                Pesquisar
                                            </button>
                                            </div>
                    </form>
                </div>
            </div>
        </div>

<?php require_once 'reqFooter.php' ?>