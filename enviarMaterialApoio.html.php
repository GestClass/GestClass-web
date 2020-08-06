<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />

    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css" />


</head>

<body>

    <?php
    include_once 'php/conexao.php';

    $id_usuario = $_SESSION["id_usuario"];
    $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
    $id_escola = $_SESSION["id_escola"];

    if ($id_tipo_usuario == 1) {
        require_once 'reqMenuAdm.php';
    } else if ($id_tipo_usuario == 2) {
        require_once 'reqDiretor.php';
    } else if ($id_tipo_usuario == 3) {
        require_once 'reqHeader.php';
    } elseif ($id_tipo_usuario == 4) {
        require_once 'reqProfessor.php';
    } elseif ($id_tipo_usuario  == 5) {
        require_once 'reqAluno.php';
    } else {
        require_once 'reqPais.php';
    }

    $ra_aluno = $_GET["ra"];
    $nome_aluno = $_GET["nome"];

    if ($id_tipo_usuario == 2) {
    ?>
        <div class="container"><br>
            <h4 class="center">Enviar Material de Apoio ao Aluno</h4><br>
            <form action="php/enviarMaterial/enviarMaterialAluno.php" enctype="multipart/form-data" method="POST">
                <div class="modal-content">
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <input name="ra" value="<?php echo $ra_aluno; ?>" type="text" readonly>
                            <label id="lbl" for="first_name">RA Aluno</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input name="nome" value="<?php echo $nome_aluno; ?>" type="text" readonly>
                            <label id="lbl" for="first_name">Nome Aluno</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input type="text" name="ra" value="<?php echo $ra_aluno ?>" hidden>
                            <input name="assunto" placeholder="Digite o assunto" type="text" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field col s11 m11 l11">
                            <div id="btnMaterial" class="btn col s6 m6 l6">
                                <span>Escolha o arquivo &nbsp;&nbsp;&nbsp;<i class="material-icons">picture_as_pdf</i></span>
                                <input type="file" name="material" />
                            </div>
                            <div class="file-path-wrapper">
                                <input id="material" class="file-path validate" type="text">
                            </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;<i class="material-icons small tooltipped" data-tooltip="Arquivos Permitidos: <br> .pdf | .doc | .docx | .jpg <br> .jpeg | .png | .gif | .txt <br> .ppt | .pptx | .xls | .xlsx" style="margin-top: 20px; color: #64b5f6; margin-left: 10px;">info_outline</i>
                    </div>
                    <div class="input-field right">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">send</i>Enviar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    <?php } elseif ($id_tipo_usuario == 4) {
    ?>
        <div class="container"><br>
            <h4 class="center">Enviar Material de Apoio ao Aluno</h4><br>
            <form action="php/enviarMaterial/enviarMaterialAluno.php" enctype="multipart/form-data" method="POST">
                <div class="modal-content">
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <input name="ra" value="<?php echo $ra_aluno; ?>" type="text" readonly>
                            <label id="lbl" for="first_name">RA Aluno</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input name="nome" value="<?php echo $nome_aluno; ?>" type="text" readonly>
                            <label id="lbl" for="first_name">Nome Aluno</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <input type="text" name="ra" value="<?php echo $ra_aluno ?>" hidden>
                            <input name="assunto" placeholder="Digite o assunto" type="text" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <select name="disciplina">
                                <option value="" disabled selected>Selecione a Disciplina</option>
                                <?php
                                $query_select_disciplina_turma_professor = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor, disciplina.nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor = ID_disciplina) WHERE disciplinas_professor.fk_id_professor_disciplinas_professor = $id_usuario AND disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma GROUP BY disciplina.nome_disciplina");
                                $query_select_disciplina_turma_professor->execute();

                                while ($dados_disciplina_turma_professor = $query_select_disciplina_turma_professor->fetch(PDO::FETCH_ASSOC)) {

                                    $id_disciplina = $dados_disciplina_turma_professor["fk_id_disciplina_professor_disciplinas_professor"];
                                    $nome_disciplina = $dados_disciplina_turma_professor["nome_disciplina"];
                                ?>
                                    <option value="<?php echo $id_disciplina ?>"><?php echo $nome_disciplina ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <label id="lbl" for="first_name">Disciplina</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field col s11 m11 l11">
                            <div id="btnMaterial" class="btn col s6 m6 l6">
                                <span>Escolha o arquivo &nbsp;&nbsp;&nbsp;<i class="material-icons">picture_as_pdf</i></span>
                                <input type="file" name="material" />
                            </div>
                            <div class="file-path-wrapper">
                                <input id="material" class="file-path validate" type="text" name="material">
                            </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;<i class="material-icons small tooltipped" data-tooltip="Arquivos Permitidos: <br> .pdf | .doc | .docx | .jpg <br> .jpeg | .png | .gif | .txt <br> .ppt | .pptx | .xls | .xlsx" style="margin-top: 20px; color: #64b5f6; margin-left: 10px;">info_outline</i>
                    </div>
                    <div class="input-field right">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">send</i>Enviar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    <?php
    } ?>


    <script src="js/custom.js"></script>


    <?php require_once 'reqFooter.php' ?>