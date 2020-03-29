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
    <!-- <link rel="stylesheet" type="text/css" href="css/cadastroEscola.css" /> -->


</head>

<body>

    <?php 
         require_once 'reqNoLog.php';
         include_once 'php/conexao.php';
    
        $id = $_GET["id_escola"];

        session_start();

        $_SESSION["id_da_escola"] = $id;
        
    
    ?>

    <div class="container ">
        <form id="adicionarEscola" class="col s12" method="POST" action="php/cadastrarDiretor.php" enctype="multipart/form-data">
            <h4>Cadastro Diretor</h4><br>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="row">
                        <div class="input-field col s12 l6">
                            <i class="material-icons prefix blue-icon">account_circle</i>
                            <input id="icon_titulo" type="text" name="nome_diretor" id="nome_diretor" class="validate">
                            <label for="icon_titulo">Nome Diretor</label>
                        </div>
                        <div class="file-field input-field col s12 l6">
                            <div id="btnfoto" class="btn col s6">
                                <span><i class="material-icons">add_a_photo</i></span>
                                <input type="file" name="txt_file"/>
                            </div>
                            <div class="file-path-wrapper">
                                <input id="foto" class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 l6">
                            <i class="material-icons prefix blue-icon">folder_shared</i>
                            <input placeholder="506.525.428-16" name="cpf" id="cpf" type="text" class="validate" data-mask="000.000.000-00">
                            <label for="first_name">CPF</label>
                        </div>
                        <div class="input-field col s12 l6">
                            <i class="material-icons prefix blue-icon">folder_shared</i>
                            <input placeholder="85.658.884-4" name="rg" id="rg" type="text" class="validate" data-mask="00.000.000-0">
                            <label for="first_name">RG</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 l4">
                            <i class="material-icons prefix blue-icon">alternate_email</i>
                            <input placeholder="gestclass@enterprise.com" name="email" id="email" type="email" class="validate">
                            <label for="email">Email</label>
                            <span class="helper-text" data-error="wrong" data-success="right"></span>
                        </div>
                        <div class="input-field col s12 l4">
                            <i class="material-icons prefix blue-icon">security</i>
                            <input placeholder="*******" name="senha" id="senha" type="password" class="validate">
                            <label for="first_name">Senha</label>
                        </div>
                        <div class="input-field col s12 l4">
                            <input placeholder="*******" name="confsenha" id="confsenha" type="password" class="validate">
                            <label for="first_name">Confirmar senha</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 l6">
                            <i class="material-icons prefix blue-icon">location_on</i>
                            <input data-mask="00000-000" placeholder="08574-310" name="cep" id="cep" type="text" class="validate">
                            <label for="first_name">CEP</label>
                        </div>
                        <div class="input-field col s12 l2">
                            <input placeholder="Número" name="numero" id="numero" type="text" class="validate">
                            <!-- <label for="first_name">Nº</label> -->
                        </div>
                        <div class="input-field col s12 l4">
                            <input placeholder="Complemento" name="complemento" id="complemento" type="text" class="validate">
                            <!-- <label for="first_name">Complemento</label> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 l6">
                            <i class="material-icons prefix blue-icon">call</i>
                            <input data-mask="(00) 00000-0000" placeholder="(11) 97765-3360" name="telefone" id="telefone" type="text" class="validate">
                            <label for="first_name">Telefone</label>
                        </div>
                        <div class="input-field col s12 l6">
                            <i class="material-icons prefix blue-icon">phone_android</i>
                            <input data-mask="(00) 00000-0000" placeholder="(11) 97765-3360" name="celular" id="celular" type="text" class="validate">
                            <label for="first_name">Celular</label>
                        </div>
                    </div>
                </div>
                
                <div class="input-field right">
                    <button id="btnFormCadEscola" type="submit" class="btn-flat btnLightBlue" name="btnFormCadEscola">
                        <i class="material-icons left">send</i>Enviar</button>
                </div>
            </div>
    </div>
    </div>
    </div>
    </form>
    </div>

    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="js/default.js"></script>

</body>

</html>