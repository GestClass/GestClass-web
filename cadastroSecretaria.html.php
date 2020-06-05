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
        <form name="frmcpf" id="secretaria" method="POST" action="php/cadastrarSecretaria.php" enctype="multipart/form-data">
            <h5>Secretaria</h5>
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
                    <input name="nome" id="nome_secretario" type="text" placeholder="Nome Secretario" class="validate">
                    <label id="lbl" for="icon_prefix">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m6 l6">
                    <i class="material-icons prefix blue-icon">ballot</i>
                    <input name="rg" id="rg" type="tel" placeholder="62.548.678-7" maxlength="12" data-mask="00.000.000-0" class="validate">
                    <label id="lbl" for="icon_telephone">RG</label>
                </div>
                <div class="input-field col s6 m6 l6">
                    <i class="material-icons prefix blue-icon">ballot</i>
                    <input name="cpf" id="cpf" type="tel" placeholder="785.958.651-88" data-mask="000.000.000-00" class="validate" onblur="TestaCPF(this)">
                    <label id="lbl" for="icon_telephone">CPF</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m3 l2">
                    <i class="material-icons prefix blue-icon">location_on</i>
                    <input name="cep" id="cep" placeholder="08574-150" type="text" data-mask="00000-000" class="validate" onblur="pesquisacep(this.value);">
                    <label id="lbl" for="first_name">CEP</label>
                </div>
                <div id="a" class="input-field col s10 m2 l2">
                    <input id="cidade" placeholder="Cidade" type="text" class="validate">
                    <label id="lbl" for="first_name">Cidade</label>
                </div>
                <div id="a" class="input-field col s10 m2 l2">
                    <input id="bairro" placeholder="Bairro" type="text" class="validate">
                    <label id="lbl" for="first_name">Bairro</label>
                </div>
                <div id="a" class="input-field col s10 m2 l3">
                    <input id="rua" placeholder="Rua" type="text" class="validate">
                    <label id="lbl" for="first_name">Rua</label>
                </div>
                <div id="a" class="input-field col s10 m1 l1">
                    <input name="numero" id="numero" placeholder="Nº" type="tel" class="validate ">
                    <label id="lbl" for="first_name">Nº</label>
                </div>
                <div id="a" class="input-field col s10 m2 l2">
                    <input name="complemento" id="complemento" placeholder="Complemento" type="tel" class="validate ">
                    <label id="lbl" for="first_name">Complemento</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m4 l4">
                    <i class="material-icons prefix blue-icon">alternate_email</i>
                    <input name="email" id="email" type="tel" placeholder="gestclass@enterprise.com" class="validate">
                    <label id="lbl" for="icon_telephone">Email</label>
                </div>
                <div class="input-field col s12 m4 l4">
                    <i class="material-icons prefix blue-icon">security</i>
                    <input name="senha" id="senha" type="password" placeholder="*******" class="validate">
                    <label id="lbl" for="icon_telephone">Senha</label>
                </div>
                <div id="a" class="input-field col s10 m4 l4">
                    <input name="confsenha" id="confsenha" type="password" placeholder="*******" class="validate">
                    <label id="lbl" for="icon_telephone">Confirma senha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">smartphone</i>
                    <input name="celular" id="celular" type="tel" placeholder="(11) 97765-3360" data-mask="(00) 00000-0000" class="validate">
                    <label id="lbl" for="icon_telephone">Celular</label>
                </div>
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">call</i>
                    <input name="telefone" id="telefone" type="tel" placeholder="(11) 4753-8560" data-mask="(00) 0000-0000" class="validate">
                    <label id="lbl" for="icon_telephone">Telefone</label>
                </div>
            </div>
            <div class="input-field right">
                <button name="btncadastrar" value="fomrSecretaria" id="btnFormContas" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i>Cadastrar</button>
            </div>
        </form>
    </div>

    <script src="js/query-3.3.1.min.js"></script>
    <script src="js/cep.js"></script>
    <script src="js/validarCpf.js"></script>
    <script src="js/default.js"></script>

    <?php require_once 'reqFooter.php' ?>