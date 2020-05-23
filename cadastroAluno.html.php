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
    <link rel="stylesheet" type="text/css" href="css/cadastroContas.css" />


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

    <div class="container col s12 m12 l12 ">
        <form id="aluno" method="POST" action="php/cadastrarAluno.php" enctype="multipart/form-data">
            <h5>Aluno</h5>
            <div class="row">
                <div class="file-field input-field col s12 m3 l3">
                    <div id="btnfoto" class="btn col s6">
                        <span><i class="material-icons">add_a_photo</i></span>
                        <input type="file" name="foto_file" />
                    </div>
                    <div class="file-path-wrapper">
                        <input id="foto" class="file-path validate" type="text" name="foto_file">
                    </div>
                </div>
                <div class="input-field col s12 m9 l9">
                    <i class="material-icons prefix blue-icon">account_circle</i>
                    <input name="nome" id="nome_aluno" type="text" placeholder="Nome Aluno" class="validate ">
                    <label id="lbl" for="first_name">Nome Aluno</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m4 l2">
                    <i class="material-icons prefix blue-icon">cake</i>
                    <input name="data_nascimento" id="data_nascimento" placeholder="2000/09/05" type="text" class="datepicker validate">
                    <label id="lbl">Data Nascimento</label>
                </div>
                <div class="input-field col s6 m4 l2">
                    <i class="material-icons prefix blue-icon">ballot</i>
                    <input name="ra" id="RA" placeholder="8956478-9" type="text" class="validate" data-mask="0000000-0">
                    <label id="lbl" for="first_name">RA</label>
                </div>
                <div class="input-field col s6 m4 l2">
                    <i class="material-icons prefix blue-icon">ballot</i>
                    <input name="rg" id="RG" placeholder="65.745.984-6" type="tel" class="validate ">
                    <label id="lbl" for="first_name">RG</label>
                </div>
                <div class="input-field col s6 m6 l3">
                    <i class="material-icons prefix blue-icon">ballot</i>
                    <input name="cpf" id="CPF" placeholder="614.755.014-16" type="tel" data-mask="000.000.000-00" class="validate ">
                    <label id="lbl" for="first_name">CPF</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <i class="material-icons prefix blue-icon">ballot</i>
                    <input name="cpf_respon" id="CPF" placeholder="614.755.014-16" type="tel" data-mask="000.000.000-00" class="validate ">
                    <label id="lbl" for="first_name">CPF Responsável</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m4 l4">
                    <i class="material-icons prefix blue-icon">alternate_email</i>
                    <input name="email" id="email" placeholder="gestclass@enterprise.com" type="tel" class="validate ">
                    <label id="lbl" for="first_name">Email</label>
                </div>
                <div class="input-field col s12 m4 l4">
                    <i class="material-icons prefix blue-icon">security</i>
                    <input name="senha" id="senha" placeholder="********" type="password" class="validate ">
                    <label id="lbl" for="first_name">Senha</label>
                </div>
                <div id="a" class="input-field col s10 m4 l4">
                    <input name="confsenha" id="confsenha" placeholder="********" type="password" class="validate ">
                    <label id="lbl" for="first_name">Confirmar senha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">smartphone</i>
                    <input name="celular" id="celular" placeholder="(11) 97765-3360" type="tel" data-mask="(00) 00000-0000" class="validate ">
                    <label id="lbl" for="first_name">Celular</label>
                </div>
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">call</i>
                    <input name="telefone" id="telefone" placeholder="(11) 4002-8922" type="tel" data-mask="(00) 0000-0000" class="validate">
                    <label id="lbl" for="first_name">Telefone</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12 validate">
                    <i class="material-icons prefix blue-icon">school</i>
                    <select id="selectTurma">
                        <option value="" disabled selected>Selecione a Turma</option>
                        <?php

                        $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE $id_escola");
                        $query_select_turma->execute();
 
                        while ($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                            $nome_turma = $dados_turma_nome['nome_turma'];

                            $query_select_id_turma = $conn->prepare("SELECT ID_turma FROM turma WHERE $id_escola");
                            $query_select_id_turma->execute();

                            while ($dados_turma_id = $query_select_id_turma->fetch(PDO::FETCH_ASSOC)) {
                                $id_turma = $dados_turma_id;
                        ?>
                                <option name="turma" value="<?php echo $id_turma ?>"><?php echo $nome_turma; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <label id="lbl">Turma</label>
                </div>
            </div>
            <div class="input-field right">
                <button name="btncadastrar" value="formAluno" id="formAluno" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Cadastrar</button>
            </div>
        </form>
    </div>

    <script src="js/query-3.3.1.min.js"></script>
    <script src="js/default.js"></script>

    <?php require_once 'reqFooter.php' ?>