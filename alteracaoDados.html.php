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
    <link rel="stylesheet" type="text/css" href="css/dadosAlunos.css" />

    <script src="js/validarCpf.js"></script>
    <script src="js/cep.js"></script>


</head>

<body>

    <?php

    include_once 'php/conexao.php';

    $id_usuario = $_SESSION["id_usuario"];
    $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
    $id_escola = $_SESSION["id_escola"];

    if ($id_tipo_usuario == 2) {
        require_once 'reqDiretor.php';
    } elseif ($id_tipo_usuario == 3) {
        require_once 'reqHeader.php';
    } elseif ($id_tipo_usuario == 4) {
        require_once 'reqProfessor.php';
    }






    $tipo_usuario = $_POST['tipo_conta'];
    $id_usuario = $_POST['id'];


    if ($tipo_usuario == "5") {
        $query_alunos = $conn->prepare("SELECT * FROM aluno WHERE RA =" . $id_usuario . "");
        $query_alunos->execute();
        while ($dados_alunos = $query_alunos->fetch(PDO::FETCH_ASSOC)) {

    ?>
            <h4 class="center">Alteração de dados </h4>
            <div class="container col s12 m12 l12 ">
                <form id="aluno" method="POST" action="php/alteracaoDados.php" enctype="multipart/form-data">
                    <div class="row">

                        <div class="file-field input-field col s12 m4 l2">
                            <div id="btnfoto" class="btn col s6">
                                <span><i class="material-icons">add_a_photo</i></span>
                                <input type="file" name="foto_file" />
                            </div>
                            <div class="file-path-wrapper">
                                <input id="foto" value="<?php echo $dados_alunos['foto'] ?>" class="file-path validate" type="text" name="foto_file">
                            </div>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix blue-icon">account_circle</i>
                            <input name="nome" id="nome_aluno" type="text" value="<?php echo $dados_alunos['nome_aluno'] ?>" class="validate ">
                            <label id="lbl" for="first_name">Nome Aluno</label>
                        </div>
                        <div class="input-field col s6 m4 l4">
                            <i class="material-icons prefix blue-icon">cake</i>
                            <input name="data_nascimento" id="data_nascimento" value="<?php echo $dados_alunos['data_nascimento'] ?>" type="date" class="validate">
                            <label id="lbl">Data Nascimento</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="ra" id="RA" placeholder="8956478-9" value=<?php echo $dados_alunos['RA'] ?> data-mask="0000000-0" type="text" class="validate">
                            <label id="lbl" for="first_name">RA</label>
                        </div>
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="rg" id="RG" value="<?php echo $dados_alunos['RG'] ?>" type="tel" class="validate " data-mask="00.000.000-0">
                            <label id="lbl" for="first_name">RG</label>
                        </div>
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="cpf" id="CPF" value="<?php echo $dados_alunos['cpf'] ?>" type="text" class="validate" data-mask="000.000.000-00" onblur="TestaCPF(this)">
                            <label id="lbl" for="first_name">CPF</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix blue-icon">alternate_email</i>
                            <input name="email" id="email" value="<?php echo $dados_alunos['email'] ?>" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Email</label>
                        </div>
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix blue-icon">smartphone</i>
                            <input name="celular" id="celular" value="<?php echo $dados_alunos['celular'] ?>" type="tel" data-mask="(00) 00000-0000" class="validate ">
                            <label id="lbl" for="first_name">Celular</label>
                        </div>
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix blue-icon">call</i>
                            <input name="telefone" id="telefone" value="<?php echo $dados_alunos['telefone'] ?>" type="tel" data-mask="(00) 0000-0000" class="validate">
                            <label id="lbl" for="first_name">Telefone</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6 validate">
                            <i class="material-icons prefix blue-icon">school</i>
                            <input name="id_turma" id="telefone" type="text" class="validate" value="<?php echo $dados_alunos['fk_id_turma_aluno'] ?>">
                            <label id="lbl">Turma</label>
                        </div>

                        <div>
                            <input type="text" name="tipo_conta" value="<?php echo $tipo_usuario ?>" hidden>
                        </div>
                    </div>

                    <div class="row">
                        <input type="submit" class="btn-flat btnLightBlue center" value="Salvar Alterações">

                    </div>
                </form>

            </div>
            </div><?php

                }
            } elseif ($tipo_usuario == "6") {
                $query_resp = $conn->prepare("SELECT * FROM responsavel WHERE ID_responsavel =" . $id_usuario . "");
                $query_resp->execute();
                $dados_resp = $query_resp->fetch(PDO::FETCH_ASSOC) ?>

        <h4 class="center">Alteração de dados </h4><br>
        <div class="container col s12 m12 l12 ">
            <form id="responsavel" method="POST" action="php/alteracaoDados.php" enctype="multipart/form-data">
                <div class="col s12 m12 l12">
                    <div class="row">
                        <div class="file-field input-field col s12 m2 l2">
                            <div id="btnfoto" class="btn col s6">
                                <span><i class="material-icons">add_a_photo</i></span>
                                <input type="file" name="foto_file" />
                            </div>
                            <div class="file-path-wrapper">
                                <input id="foto" value="<?php echo $dados_resp['foto'] ?>" class="file-path validate" type="text" name="foto_file">
                            </div>
                        </div>
                        <div class="input-field col s12 m10 l6">
                            <i class="material-icons prefix blue-icon">account_circle</i>
                            <input name="nome_respon" id="nome_responsavel" type="text" value="<?php echo $dados_resp['nome_responsavel'] ?>" class="validate">
                            <label id="lbl" for="icon_telephone">Nome</label>
                        </div>
                        <div class="input-field col s12 m6 l4">
                            <i class="material-icons prefix blue-icon">cake</i>
                            <input name="nascimento_respon" id="data_nascimento" value="<?php echo $dados_resp['data_nascimento'] ?>" type="date" class=" validate">
                            <label id="lbl">Data Nascimento</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="rg_respon" id="rg" type="tel" data-mask="00.000.000-0" value="<?php echo $dados_resp['RG'] ?>" class="validate">
                            <label id="lbl" for="icon_telephone">RG</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="cpf_respon" id="cpf" type="tel" value="<?php echo $dados_resp['cpf'] ?>" class="validate" data-mask="000.000.000-00" onblur="TestaCPF(this)">
                            <label id="lbl" for="icon_telephone">CPF</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m3 l3">
                            <i class="material-icons prefix blue-icon">location_on</i>
                            <input name="cep" id="cep" value="<?php echo $dados_resp['cep'] ?>" type="text" class="validate" data-mask="00000-000" onblur="pesquisacep(this.value);">
                            <label id="lbl" for="first_name">CEP</label>
                        </div>
                        <div class="input-field col s7 m2 l2">
                            <input id="cidade" placeholder="Cidade" type="text" class="validate">
                            <label id="lbl" for="first_name">Cidade</label>
                        </div>
                        <div class="input-field col s6 m2 l2">
                            <input id="bairro" placeholder="Bairro" type="text" class="validate">
                            <label id="lbl" for="first_name">Bairro</label>
                        </div>
                        <div class="input-field col s6 m2 l2">
                            <input id="rua" placeholder="Rua" type="text" class="validate">
                            <label id="lbl" for="first_name">Rua</label>
                        </div>
                        <div class="input-field col s6 m1 l1">
                            <input name="numero" id="numero" value="<?php echo $dados_resp['numero'] ?>" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Nº</label>
                        </div>
                        <div class="input-field col s6 m2 l2">
                            <input name="complemento" id="complemento" value="<?php echo $dados_resp['complemento'] ?>" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Complemento</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 m4 l4">
                            <i class="material-icons prefix blue-icon">smartphone</i>
                            <input name="celular_respon" id="celular" type="tel" value="<?php echo $dados_resp['celular'] ?>" data-mask="(00) 00000-0000" class="validate">
                            <label id="lbl" for="icon_telephone">Celular</label>
                        </div>
                        <div class="input-field col s6 m4 l4">
                            <i class="material-icons prefix blue-icon">call</i>
                            <input name="telefone_respon" id="telefone" type="tel" value="<?php echo $dados_resp['telefone'] ?>" data-mask="(00) 0000-0000" class="validate">
                            <label id="lbl" for="icon_telephone">Telefone</label>
                        </div>
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix blue-icon">call</i>
                            <input name="tel_comercial" id="telefone_comercial" type="tel" value="<?php echo $dados_resp['telefone_comercial'] ?>" data-mask="(00) 0000-0000" class="validate">
                            <label id="lbl" for="icon_telephone">Telefone Comercial</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix blue-icon">alternate_email</i>
                            <input name="email_respon" id="email" type="tel" value="<?php echo $dados_resp['email'] ?>" class="validate">
                            <label id="lbl" for="icon_telephone">Email</label>
                        </div>
                    </div>
                    <div>
                        <input type="text" name="tipo_conta" value="6" hidden>
                    </div>
                    <div>
                        <input type="text" name="ID_responsavel" value="<?php echo $dados_resp['ID_responsavel'] ?>" hidden>
                    </div>
                </div>
        </div>
        <div class="row">
            <input type="submit" class="btn-flat btnLightBlue center" value="Salvar Alterações">

        </div>
        </form>
    <?php
            } elseif ($tipo_usuario == "4") {
                $query_prof = $conn->prepare('SELECT * FROM professor WHERE ID_professor = ' . $id_usuario . '');
                $query_prof->execute();
                $dados_prof = $query_prof->fetch(PDO::FETCH_ASSOC) ?>

        <h4 class="center">Alteração de dados </h4><br>
        <div class="container col s12 m12 l12 ">
            <form id="professor" method="POST" action="php/alteracaoDados.php" enctype="multipart/form-data">
                <div class="col s12 m12 l12">
                    <div class="row">
                        <div class="file-field input-field col s12 m3 l2">
                            <div id="btnfoto" class="btn col s6">
                                <span><i class="material-icons">add_a_photo</i></span>
                                <input type="file" name="foto_file" />
                            </div>
                            <div class="file-path-wrapper">
                                <input id="foto" class="file-path validate" value="<?php echo $dados_prof['foto'] ?>" type="text" name="foto_file">
                            </div>
                        </div>
                        <div class="input-field col s12 m9 l4">
                            <i class="material-icons prefix blue-icon">account_circle</i>
                            <input name="nome_professor" id="nome_responsavel" type="text" value="<?php echo $dados_prof['nome_professor'] ?>" class="validate">
                            <label id="lbl" for="icon_telephone">Nome</label>
                        </div>
                        <div class="input-field col s6 m6 l3">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="rg" id="rg" value="<?php echo $dados_prof['rg'] ?>" type="tel" class="validate">
                            <label id="lbl" for="icon_telephone">RG</label>
                        </div>
                        <div class="input-field col s6 m6 l3">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="cpf" id="cpf" value="<?php echo $dados_prof['cpf'] ?>" type="tel" class="validate" data-mask="000.000.000-00" onblur="TestaCPF(this)">
                            <label id="lbl" for="icon_telephone">CPF</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s5 m3 l2">
                            <i class="material-icons prefix blue-icon">location_on</i>
                            <input name="cep" id="cep" value="<?php echo $dados_prof['cep'] ?>" data-mask="00000-000" onblur="pesquisacep(this.value);" type="text" class="validate">
                            <label id="lbl" for="first_name">CEP</label>
                        </div>
                        <div class="input-field col s7 m2 l2">
                            <input id="cidade" placeholder="Cidade" type="text" class="validate">
                            <label id="lbl" for="first_name">Cidade</label>
                        </div>
                        <div class="input-field col s6 m2 l2">
                            <input id="bairro" placeholder="Bairro" type="text" class="validate">
                            <label id="lbl" for="first_name">Bairro</label>
                        </div>
                        <div class="input-field col s6 m2 l2">
                            <input id="rua" placeholder="Rua" type="text" class="validate">
                            <label id="lbl" for="first_name">Rua</label>
                        </div>
                        <div class="input-field col s3 m1 l1">
                            <input name="numero" id="numero" value="<?php echo $dados_prof['numero'] ?>" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Nº</label>
                        </div>
                        <div class="input-field col s9 m2 l3">
                            <input name="complemento" id="complemento" value="<?php echo $dados_prof['complemento'] ?>" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Complemento</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 m6 l4">
                            <i class="material-icons prefix blue-icon">smartphone</i>
                            <input name="celular" id="celular" value="<?php echo $dados_prof['celular'] ?>" type="tel" data-mask="(00) 00000-0000" class="validate">
                            <label id="lbl" for="icon_telephone">Celular</label>
                        </div>
                        <div class="input-field col s6 m6 l4">
                            <i class="material-icons prefix blue-icon">call</i>
                            <input name="telefone" id="telefone" value="<?php echo $dados_prof['telefone'] ?>" type="tel" data-mask="(00) 0000-0000" class="validate">
                            <label id="lbl" for="icon_telephone">Telefone</label>
                        </div>
                        <div class="input-field col s12 m12 l4">
                            <i class="material-icons prefix blue-icon">alternate_email</i>
                            <input name="email" id="email" value="<?php echo $dados_prof['email'] ?>" type="tel" class="validate">
                            <label id="lbl" for="icon_telephone">Email</label>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                    <div>
                        <input type="text" name="tipo_conta" value="<?php echo $tipo_usuario ?>" hidden>
                    </div>
                    <div>
                        <input type="text" name="ID_professor" value="<?php echo $dados_prof['ID_professor'] ?>" hidden>
                    </div>
                    <div class="row">
                        <input type="submit" class="btn-flat btnLightBlue center" value="Salvar Alterações">

                    </div>

                </div>

            </form>
        <?php
            } elseif ($tipo_usuario == "3") {
                $query_sec = $conn->prepare("SELECT * FROM secretario WHERE ID_secretario =" . $id_usuario . "");
                $query_sec->execute();
                $dados_sec = $query_sec->fetch(PDO::FETCH_ASSOC) ?>

            <h4 class="center">Alteração de dados </h4>
            <div class="container col s12 m12 l12 ">
                <form id="secretaria" method="POST" action="php/alteracaoDados.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="file-field input-field col s12 m2 l2">
                            <div id="btnfoto" class="btn col s6">
                                <span><i class="material-icons">add_a_photo</i></span>
                                <input type="file" name="foto_file" />
                            </div>
                            <div class="file-path-wrapper">
                                <input id="foto" class="file-path validate" value="<?php echo $dados_sec['foto'] ?>" type="text" name="foto_file">
                            </div>
                        </div>
                        <div class="input-field col s12 m10 l10">
                            <input name="nome_secretario" id="nome_secretario" type="text" value="<?php echo $dados_sec['nome_secretario'] ?>" class="validate">
                            <label id="lbl" for="icon_prefix">Nome</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="rg" id="rg" value="<?php echo $dados_sec['rg'] ?>" type="tel" class="validate">
                            <label id="lbl" for="icon_telephone">RG</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="cpf" id="cpf" value="<?php echo $dados_sec['cpf'] ?>" type="tel" data-mask="000.000.000-00" onblur="TestaCPF(this)">
                            <label id="lbl" for="icon_telephone">CPF</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m3 l3">
                            <i class="material-icons prefix blue-icon">location_on</i>
                            <input name="cep" id="cep" value="<?php echo $dados_sec['cep'] ?>" data-mask="00000-000" onblur="pesquisacep(this.value);" type="text" class="validate">
                            <label id="lbl" for="first_name">CEP</label>
                        </div>
                        <div class="input-field col s7 m2 l2">
                            <input id="cidade" placeholder="Cidade" type="text" class="validate">
                            <label id="lbl" for="first_name">Cidade</label>
                        </div>
                        <div class="input-field col s6 m2 l2">
                            <input id="bairro" placeholder="Bairro" type="text" class="validate">
                            <label id="lbl" for="first_name">Bairro</label>
                        </div>
                        <div class="input-field col s6 m2 l2">
                            <input id="rua" placeholder="Rua" type="text" class="validate">
                            <label id="lbl" for="first_name">Rua</label>
                        </div>
                        <div class="input-field col s12 m1 l1">
                            <input name="numero" id="numero" value="<?php echo $dados_sec['numero'] ?>" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Nº</label>
                        </div>
                        <div class="input-field col s12 m2 l2">
                            <input name="complemento" id="complemento" value="<?php echo $dados_sec['complemento'] ?>" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Complemento</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix blue-icon">alternate_email</i>
                            <input name="email" id="email" value="<?php echo $dados_sec['email'] ?>" type="tel" class="validate">
                            <label id="lbl" for="icon_telephone">Email</label>
                        </div>
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix blue-icon">smartphone</i>
                            <input name="celular" id="celular" value="<?php echo $dados_sec['celular'] ?>" type="tel" data-mask="(00) 00000-0000" class="validate">
                            <label id="lbl" for="icon_telephone">Celular</label>
                        </div>
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix blue-icon">call</i>
                            <input name="telefone" id="telefone" value="<?php echo $dados_sec['telefone'] ?>" type="tel" data-mask="(00) 0000-0000" class="validate">
                            <label id="lbl" for="icon_telephone">Telefone</label>
                        </div>
                    </div>
                    <div>
                        <input type="text" name="tipo_conta" value="3" hidden>
                    </div>
                    <div>
                        <input type="text" name="ID_secretario" value="<?php echo $dados_sec['ID_secretario'] ?>" hidden>
                    </div>
                    <div class="row">
                        <input type="submit" class="btn-flat btnLightBlue center" value="Salvar Alterações">
                    </div>
            </div>


            </form>
        <?php
            } elseif ($tipo_usuario == "2") {
                $query_dir = $conn->prepare("SELECT * FROM diretor WHERE ID_diretor = " . $id_usuario . "");
                $query_dir->execute();
                $dados_dir = $query_dir->fetch(PDO::FETCH_ASSOC) ?>

            <h4 class="center">Alteração de dados </h4>
            <div class="container col s12 m12 l12 ">
                <form id="adicionarEscola" class="col s12" method="POST" action="php/alteracaoDados.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="file-field input-field col s12 m2 l2">
                            <div id="btnfoto" class="btn col s6">
                                <span><i class="material-icons">add_a_photo</i></span>
                                <input type="file" name="foto_file" />
                            </div>
                            <div class="file-path-wrapper">
                                <input id="foto" class="file-path validate" value="<?php echo $dados_dir['foto'] ?>" type="text" name="foto_file">
                            </div>
                        </div>
                        <div class="input-field col s12 m10 l10">
                            <input name="nome_diretor" id="nome_diretor" type="text" value="<?php echo $dados_dir['nome_diretor'] ?>" class="validate">
                            <label id="lbl" for="icon_prefix">Nome</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="rg" id="rg" value="<?php echo $dados_dir['rg'] ?>" type="tel" class="validate">
                            <label id="lbl" for="icon_telephone">RG</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="cpf" id="cpf" value="<?php echo $dados_dir['cpf'] ?>" type="tel" data-mask="000.000.000-00" onblur="TestaCPF(this)">
                            <label id="lbl" for="icon_telephone">CPF</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m3 l3">
                            <i class="material-icons prefix blue-icon">location_on</i>
                            <input name="cep" id="cep" value="<?php echo $dados_dir['cep'] ?>" data-mask="00000-000" onblur="pesquisacep(this.value);" type="text" class="validate">
                            <label id="lbl" for="first_name">CEP</label>
                        </div>
                        <div class="input-field col s7 m2 l2">
                            <input id="cidade" placeholder="Cidade" type="text" class="validate">
                            <label id="lbl" for="first_name">Cidade</label>
                        </div>
                        <div class="input-field col s6 m2 l2">
                            <input id="bairro" placeholder="Bairro" type="text" class="validate">
                            <label id="lbl" for="first_name">Bairro</label>
                        </div>
                        <div class="input-field col s6 m2 l2">
                            <input id="rua" placeholder="Rua" type="text" class="validate">
                            <label id="lbl" for="first_name">Rua</label>
                        </div>
                        <div class="input-field col s12 m1 l1">
                            <input name="numero" id="numero" value="<?php echo $dados_dir['numero'] ?>" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Nº</label>
                        </div>
                        <div class="input-field col s12 m2 l2">
                            <input name="complemento" id="complemento" value="<?php echo $dados_dir['complemento'] ?>" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Complemento</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix blue-icon">alternate_email</i>
                            <input name="email" id="email" value="<?php echo $dados_dir['email'] ?>" type="tel" class="validate">
                            <label id="lbl" for="icon_telephone">Email</label>
                        </div>
                        <div class="input-field col s12 m6 l4">
                            <i class="material-icons prefix blue-icon">smartphone</i>
                            <input name="celular" id="celular" value="<?php echo $dados_dir['celular'] ?>" type="tel" data-mask="(00) 00000-0000" class="validate">
                            <label id="lbl" for="icon_telephone">Celular</label>
                        </div>
                        <div class="input-field col s12 m6 l4">
                            <i class="material-icons prefix blue-icon">call</i>
                            <input name="telefone" id="telefone" value="<?php echo $dados_dir['telefone'] ?>" type="tel" data-mask="(00) 0000-0000" class="validate">
                            <label id="lbl" for="icon_telephone">Telefone</label>
                        </div>
                    </div>
                    <div>
                        <input type="text" name="tipo_conta" value="2" hidden>
                    </div>
                    <div>
                        <input type="text" name="ID_diretor" value="<?php echo $dados_dir['ID_diretor'] ?>" hidden>
                    </div>
                    <div class="row">
                        <input type="submit" class="btn-flat btnLightBlue center" value="Salvar Alterações">
                    </div>

            </div>


        </div>

    <?php
            }


            include_once 'reqFooter.php' ?>