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


</head>

<body>

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
    <h4 class="center">Dados pessoais responsável</h4>

    <?php

                
        $query_resp = $conn->prepare("SELECT * FROM responsavel WHERE ID_responsavel =" . $_GET['id'] . "");
        $query_resp->execute();
       $dados_resp = $query_resp->fetch(PDO::FETCH_ASSOC) ?>


    <div class="container col s12 m12 l12 ">
        <form id="responsavel" method="POST" action="alteracaoDados.html.php" enctype="multipart/form-data">
            <div class="col s12 m12 l12">
                <div class="row">
                    <div class="input-field col s12 m9 l9">
                        <i class="material-icons prefix blue-icon">account_circle</i>
                        <input name="nome_respon" id="nome_responsavel" type="text"
                            value="<?php echo$dados_resp['nome_responsavel']?>" readonly class="validate">
                        <label id="lbl" for="icon_telephone">Nome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m4 l4">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input name="rg_respon" id="rg" type="tel" data-mask="00.000.000-0"
                            value="<?php echo$dados_resp['RG']?>" readonly class="validate">
                        <label id="lbl" for="icon_telephone">RG</label>
                    </div>
                    <div class="input-field col s6 m4 l4">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input name="cpf_respon" id="cpf" type="tel" value="<?php echo$dados_resp['cpf']?>" readonly
                            data-mask="000.000.000-00" class="validate">
                        <label id="lbl" for="icon_telephone">CPF</label>
                    </div>
                    <div class="input-field col s6 m4 l4">
                        <i class="material-icons prefix blue-icon">cake</i>
                        <input name="nascimento_respon" id="data_nascimento"
                            value="<?php echo date('d/m/Y', strtotime($dados_resp['data_nascimento']))?>" readonly type="date" class=" validate">
                        <label id="lbl">Data Nascimento</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m3 l3">
                        <i class="material-icons prefix blue-icon">location_on</i>
                        <input name="cep" id="cep" value="<?php echo$dados_resp['cep']?>" readonly type="text"
                            class="validate">
                        <label id="lbl" for="first_name">CEP</label>
                    </div>
                    <div id="a" class="input-field col s10 m2 l3">
                        <input id="cidade" value="teste" readonly type="text" class="validate">
                        <label id="lbl" for="first_name">Cidade</label>
                    </div>
                    <div id="a" class="input-field col s10 m2 l3">
                        <input id="bairro" value="teste" readonly type="text" class="validate">
                        <label id="lbl" for="first_name">Bairro</label>
                    </div>
                    <div id="a" class="input-field col s10 m2 l4">
                        <i class="material-icons prefix blue-icon">edit_road</i>
                        <input id="rua" value="teste" readonly type="text" class="validate">
                        <label id="lbl" for="first_name">Rua</label>
                    </div>
                    <div id="a" class="input-field col s10 m1 l1">
                        <input name="numero" id="numero" value="<?php echo$dados_resp['numero']?>" readonly type="tel"
                            class="validate ">
                        <label id="lbl" for="first_name">Nº</label>
                    </div>
                    <div id="a" class="input-field col s10 m2 l2">
                        <input name="complemento" id="complemento" value="<?php echo$dados_resp['complemento']?>"
                            readonly type="tel" class="validate ">
                        <label id="lbl" for="first_name">Complemento</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m4 l5">
                        <i class="material-icons prefix blue-icon">alternate_email</i>
                        <input name="email_respon" id="email" type="tel" value="<?php echo$dados_resp['email']?>"
                            readonly class="validate">
                        <label id="lbl" for="icon_telephone">Email</label>
                    </div>
                    <div class="input-field col s12 m4 l5">
                        <i class="material-icons prefix blue-icon">smartphone</i>
                        <input name="celular_respon" id="celular" type="tel" value="<?php echo$dados_resp['celular']?>"
                            readonly data-mask="(00) 00000-0000" class="validate">
                        <label id="lbl" for="icon_telephone">Celular</label>
                    </div>
                    <div class="input-field col s12 m4 l5">
                        <i class="material-icons prefix blue-icon">call</i>
                        <input name="telefone_respon" id="telefone" type="tel"
                            value="<?php echo$dados_resp['telefone']?>" readonly data-mask="(00) 0000-0000"
                            class="validate">
                        <label id="lbl" for="icon_telephone">Telefone</label>
                    </div>
                    <div class="input-field col s12 m4 l5">
                        <i class="material-icons prefix blue-icon">call</i>
                        <input name="tel_comercial" id="telefone_comercial" type="tel"
                            value="<?php echo$dados_resp['telefone_comercial']?>" readonly data-mask=" (00) 0000-0000"
                            class="validate">
                        <label id="lbl" for="icon_telephone">Telefone Comercial</label>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <input type="text" name="tipo_conta" value="6" hidden>
                        <input type="text" name="id" value="<?php echo $_GET['id']?>" hidden>
                    </div>

                    <?php 
                if($id_tipo_usuario == 2 || $id_tipo_usuario == 3){?> 
                <input type="submit" class="waves-effect waves-light btn blue" value="Alterar dados">
                <?php } ?>   



                </div>

            </div>
    </div>
    </form>
    <?php  include_once 'reqFooter.php'?>