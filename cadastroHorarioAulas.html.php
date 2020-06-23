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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
    ?>

    <div class="container col s12 m12 l12 "><br>
        <form id="horarioAula" class="center" method="POST" action="php/cadastrarHorarioAulas.php">
            <div class="container">
                <h5>Cadastro de Novos Horário de Aulas</h5><br><br>
                <div id="idDiv">
                    <div class="row" id="remove">
                        <div class="input-field col s12 m3 l3">
                            <input name="aula[]" id="aula[]" placeholder="Ex: Primeira Aula" type="text" class="validate ">
                            <label id="lbl" for="first_name">Nome da Aula</label>
                        </div>
                        <div class="input-field col s6 m3 l3">
                            <input name="inicio[]" id="inicio[]" placeholder="07:00:00" type="tel" class="validate">
                            <label id="lbl" for="first_name">Início da Aula</label>
                        </div>
                        <div class="input-field col s6 m3 l3">
                            <input name="termino[]" id="termino[]" placeholder="07:50:00" type="tel" class="validate">
                            <label id="lbl" for="first_name">Término da Aula</label>
                        </div>
                        <div class="input-field col s6 m2 l2">
                            <button id="add_div" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Adicionar"><i class="material-icons">add_circle</i></button>
                        </div>
                    </div>
                </div><br>
                <div class="input-field right">
                    <button name="btncadastrar" value="formAluno" id="formAluno" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Cadastrar</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            var maximo = 10; //maximo de 5 campos
            var i = 1;
            $('#add_div').click(function(e) {
                e.preventDefault(); //previne novos cliques
                if (i < maximo) {
                    $('#idDiv').append('<div class="row">\
                    <div class="input-field col s12 m3 l3"><input name="aula[]" id="aula[]" placeholder="Ex: Segunda Aula" type="text" class="validate "><label class="active" id="lbl" for="first_name">Nome da Aula</label></div>\
                    <div class="input-field col s6 m3 l3"><input name="inicio[]" id="inicio[]" placeholder="07:00:00" type="tel" class="validate"><label class="active" id="lbl" for="first_name">Início da Aula</label></div>\
                    <div class="input-field col s6 m3 l3"><input name="termino[]" id="termino[]" placeholder="07:50:00" type="tel" class="validate"><label class="active" id="lbl" for="first_name">Término da Aula</label></div>\
                    <a href="#" class="remove"><i class="small material-icons left" style="color:red;">delete</i></a>\
                    </div>\
                    ');
                    i++;
                }
            });
            // Remove o div anterior
            $('#idDiv').on("click", ".remove", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                i--;
            });
        });
    </script>

    <script src="js/query-3.3.1.min.js"></script>
    <script src="js/default.js"></script>
    <script src="js/validarCpf.js"></script>

    <?php require_once 'reqFooter.php' ?>