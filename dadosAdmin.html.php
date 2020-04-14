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
    <link rel="stylesheet" type="text/css" href="css/admins.css" />


</head>

<body>

    <?php 
    
    require_once 'reqMenuAdm.php';
    include_once 'php/conexao.php';

    $id_admin = $_GET["id_admin"];
    $_SESSION['id_admin'] = $id_admin;

    $query = $conn->prepare("select * from admin where id_admin=$id_admin");
    $query->execute();
    $dados = $query->fetch(PDO::FETCH_ASSOC);
    
   
    
    ?>

    <div class="container ">
        <div id="dadosEscola">
            <form id="adicionarEscola" class="col s12" method="POST" action="php/dadosAdmin.php"
                enctype="multipart/form-data">
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="container">
                            <h5>Formulario de atualização de dados</h5><br>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix blue-icon">account_balance</i>
                                    <input id="icon_titulo" type="text" name="nome" id="nome"
                                        class="validate" value="<?php echo $dados["nome"]?>">
                                    <label for="icon_titulo">Nome</label>
                                </div>
                                <div class="file-field input-field col s12 m6 l6">
                                    <div id="btnfotoAdmin" class="btn col s6">
                                        <span><i class="material-icons">add_a_photo</i></span>
                                        <input type="file" name="txt_file" />
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input id="foto" class="file-path validate" type="text"
                                            value="<?php echo $dados["foto"]?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l6 ">
                                    <i class="material-icons prefix blue-icon">alternate_email</i>
                                    <input placeholder="gestclass@enterprise.com" name="email" id="email" type="email"
                                        class="validate" value="<?php echo $dados["email"]?>">
                                    <label for="email">Email</label>
                                    <span class="helper-text" data-error="wrong" data-success="right"></span>
                                </div>
                                <div class="input-field  col s12 m6 l6">
                                    <i class="material-icons prefix blue-icon">calendar_today</i>
                                    <input placeholder="datanascimento" name="datanascimento" id="datanascimento"
                                        placeholder="2000/09/05" type="text" class="datepicker validate"
                                        value="<?php echo $dados["data_nascimento"]?>">
                                    <label for="first_name">data de nascimento</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m4 l4">
                                    <i class="material-icons prefix blue-icon">security</i>
                                    <input placeholder="************" name="senha" id="senha" type="password"
                                        class="validate" value="<?php echo $dados["senha"]?>">
                                    <label for="first_name">senha atual</label>
                                </div>
                                <div class="input-field col s12 m4 l4">
                                    <i
                                        class="material-icons prefix blue-icon hide-on-large-only hide-on-small-only ">security</i>
                                    <input placeholder="************" name="novasenha" id="novasenha" type="password"
                                        class="validate" value="">
                                    <label for="first_name">nova senha </label>
                                </div>
                                <div class="input-field col s12 m4 l4">
                                    <i
                                        class="material-icons prefix blue-icon hide-on-large-only hide-on-small-only ">security</i>
                                    <!-- <i class="material-icons prefix blue-icon">call</i> -->
                                    <input placeholder="************" name="confsenha" id="confsenha" type="password"
                                        class="validate" value="">
                                    <label for="first_name">confirmar senha</label>
                                </div>
                            </div>

                        </div>
            </form>
        </div>




        <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
        <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
        <script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
        <script src="js/default.js"></script>
        <script src="js/custom.js"></script>
</body>

</html>