<!DOCTYPE html>
<html lang="pt-br">

<head>

    <link rel="stylesheet" type="text/css" href="css/cadastroTurmas.css" />

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
    ?>

    <div class="container col s12 m12 l12 "><br>
        <form id="cadastro_turmas" method="POST" action="php/cadastrarTurmas.php">
            <h3 class="center">Cadastrar Turmas</h5><br><br>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <select name="turno">
                            <option value="" disabled selected>Selecionar Turno</option>
                            <?php

                            $query_select_id_turno = $conn->prepare("SELECT ID_turno FROM turno WHERE $id_escola");
                            $query_select_id_turno->execute();

                            while ($dados_turno_id = $query_select_id_turno->fetch(PDO::FETCH_ASSOC)) {
                                $id_turno = $dados_turno_id['ID_turno'];

                                $query_select_nome_turno = $conn->prepare("SELECT nome_turno FROM turno WHERE ID_turno = $id_turno");
                                $query_select_nome_turno->execute();

                                while ($dados_turno_nome = $query_select_nome_turno->fetch(PDO::FETCH_ASSOC)) {
                                    $nome_turno = $dados_turno_nome['nome_turno'];

                            ?>
                                    <option value="<?php echo $id_turno ?>"><?php echo $nome_turno; ?></option>
                            <?php
                                }
                            }
                            ?>

                        </select>
                        <label id="lbl" for="first_name">Turno</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                        <input name="turma" id="nome_turma" placeholder="Ex: 3ºano A . . ." type="text" class="validate">
                        <label id="lbl" for="first_name">Turma</label>
                    </div>
                </div>
                <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                    <i class="material-icons left">send</i>Cadastrar
                </button>
        </form>
    </div>

    <script src="js/query-3.3.1.min.js"></script>
    <script src="js/cep.js"></script>
    <script src="js/default.js"></script>

    <?php require_once 'reqFooter.php' ?>