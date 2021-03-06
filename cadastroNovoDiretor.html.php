<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />
    <link rel="stylesheet" type="text/css" href="css/boletimCadastro.css" />
</head>


<body class="body_estilizado">

    <?php
    include_once 'php/conexao.php';

    $id_usuario = $_SESSION["id_usuario"];
    $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
    $id_escola = $_SESSION["id_escola"];

    if ($id_tipo_usuario == 2) {
        require_once 'reqDiretor.php';
    } else if ($id_tipo_usuario == 3) {
        require_once 'reqHeader.php';
    } elseif ($id_tipo_usuario == 4) {
        require_once 'reqProfessor.php';
    }
    ?>

    <div class="container ">
        <form id="adicionarEscola" class="col s12" method="POST" action="php/cadastroContas/cadastrarNovoDiretor.php" enctype="multipart/form-data">
            <h4>Cadastro Diretor</h4><br>
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="file-field input-field col s12 m3 l3">
                        <div id="btnfoto" class="btn col s6 tooltipped" data-tooltip="Arquivos Permitidos: <br> .gif | .bmp | .png <br> .jpg | .jpeg">
                            <span><i class="material-icons">add_a_photo</i></span>
                            <input type="file" name="txt_file" />
                        </div>
                        <div class="file-path-wrapper">
                            <input id="foto" class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="input-field col s12 m8 l8">
                        <i class="material-icons prefix blue-icon">account_circle</i>
                        <input id="icon_titulo" type="text" name="nome_diretor" placeholder="Nome Diretor" id="nome_diretor" class="validate">
                        <label for="icon_titulo">Nome Diretor</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input name="rg" id="rg" type="tel" placeholder="62.548.678-7" data-mask="99.999.999-AA" class="validate">
                        <label id="lbl" for="icon_telephone">RG</label>
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input name="cpf" id="cpf" type="tel" placeholder="785.958.651-88" data-mask="000.000.000-00" class="validate" onblur="TestaCPF(this)">
                        <label id="lbl" for="icon_telephone">CPF</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m4 l2">
                            <i class="material-icons prefix blue-icon">location_on</i>
                            <input name="cep" id="cep" placeholder="08574-150" type="text" data-mask="00000-000" class="validate" onblur="pesquisacep(this.value);">
                            <label id="lbl" for="first_name">CEP</label>
                        </div>
                        <div id="a" class="input-field col s10 m4 l2">
                            <input id="cidade" placeholder="Cidade" type="text" class="validate">
                            <label id="lbl" for="first_name">Cidade</label>
                        </div>
                        <div id="a" class="input-field col s10 m4 l2">
                            <input id="bairro" placeholder="Bairro" type="text" class="validate">
                            <label id="lbl" for="first_name">Bairro</label>
                        </div>
                        <div id="a" class="input-field col s10 m4 l3">
                            <input id="rua" placeholder="Rua" type="text" class="validate">
                            <label id="lbl" for="first_name">Rua</label>
                        </div>
                        <div id="a" class="input-field col s10 m2 l1">
                            <input name="numero" id="numero" placeholder="Número" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Nº</label>
                        </div>
                        <div id="a" class="input-field col s10 m6 l2">
                            <input name="complemento" id="complemento" placeholder="Complemento" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Complemento</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix blue-icon">alternate_email</i>
                            <input name="email" id="email" type="email" placeholder="gestclass@enterprise.com" class="validate">
                            <label id="lbl" for="icon_telephone">Email</label>
                            <span class="helper-text" data-error="Ex: gestclass@enterprise.com" data-success="right"></span>
                        </div>
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix blue-icon">security</i>
                            <input name="senha" id="senha" type="password" placeholder="******" class="validate">
                            <label id="lbl" for="icon_telephone">Senha</label>
                        </div>
                        <div id="a" class="input-field col s10 m4 l4">
                            <input name="confsenha" id="confsenha" type="password" placeholder="******" class="validate" onblur="validarSenha()">
                            <label id="lbl" for="icon_telephone">Confirmar Senha</label>
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
                        <button id="btnFormCadEscola" type="submit" class="btn-flat btnLightBlue" name="btnFormCadEscola">
                            <i class="material-icons left">send</i>Cadastrar</button>
                    </div>
                </div>
        </form>
    </div>

    <script>
        var senha = document.getElementById("senha"),
            confSenha = document.getElementById("confsenha");

        function validarSenha() {
            if (senha.value != confSenha.value) {
                M.toast({
                    html: 'Senhas Diferentes',
                    classes: 'rounded'
                })
            } else {}
        }
    </script>
    <script src="js/cep.js"></script>
    <script src="js/validarCpf.js"></script>

    <?php require_once 'reqFooter.php' ?>