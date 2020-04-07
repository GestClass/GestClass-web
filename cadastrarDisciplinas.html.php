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

    <div id="turmas_disci" class="container col s12 m12 l12 ">
        <form id="disciplina_turmas" method="POST" action="php/cadastrarDisciplinas.php" enctype="multipart/form-data">
            <h5>Cadastro Turmas e Disciplinas</h5><br><br>

            <label id="lbl">Turmas</label>
            <div class="input-field col s12 m12 l12">
                <select name="turmas">
                    <optgroup label="Berçario">
                        <option value="1">Berçario - A</option>
                    </optgroup>
                    <optgroup label="Pré-Escola">
                        <option value="2">Pré-1 A</option>
                        <option value="3">Pré-2 A</option>
                    </optgroup>
                    <optgroup label="Fundamental I">
                        <option value="4">1ºano A</option>
                        <option value="5">2ºano A</option>
                        <option value="7">3ºano A</option>
                        <option value="8">4ºano A</option>
                    </optgroup>
                    <optgroup label="Fundamental II">
                        <option value="9">5ºano A</option>
                        <option value="10">6ºano A</option>
                        <option value="11">7ºano A</option>
                        <option value="12">8ºano A</option>
                        <option value="13">9ºano A</option>
                    </optgroup>
                    <optgroup label="Ensino Médio">
                        <option value="14">1ºmédio A</option>
                        <option value="15">1ºmédio A</option>
                        <option value="16">1ºmédio A</option>
                    </optgroup>
                </select>
            </div><br>

            <div class="input-field col s12 m12 l12 ">
                <div class="col s4 m4 l3 ">
                    <label id="lbl" for="first_name">Disciplinas</label>
                </div><br>
                <div class="row">
                    <div class="col s6 m2 l2">

                        <label class="left">
                            <input id="disciplina" type="checkbox" class="filled-in checkbox-blue-grey" name="portugues" value="1" />
                            <span>Português</span>
                        </label>

                        <label class="left">
                            <input id="disciplina" type="checkbox" class="filled-in checkbox-blue-grey" name="ingles" value="2" />
                            <span>Inglês</span>
                        </label>

                    </div>
                    <div class="col s6 m2 l2">

                        <label class="left">
                            <input id="disciplina" type="checkbox" class="filled-in checkbox-blue-grey" name="matematica" value="3" />
                            <span>Matemática</span>
                        </label>

                        <label class="left">
                            <input id="disciplina" type="checkbox" class="filled-in checkbox-blue-grey" name="biologia" value="4" />
                            <span>Biologia</span>
                        </label>

                    </div>
                    <div class="col s6 m2 l2">

                        <label class="left">
                            <input id="disciplina" type="checkbox" class="filled-in checkbox-blue-grey" name="ciencias" value="5" />
                            <span>Ciências</span>
                        </label>

                        <label class="left">
                            <input id="disciplina" type="checkbox" class="filled-in checkbox-blue-grey" name="quimica" value="6" />
                            <span>Quimica</span>
                        </label>

                    </div>
                    <div class="col s6 m2 l2">

                        <label class="center">
                            <input id="disciplina" type="checkbox" class="filled-in checkbox-blue-grey" name="fisica" value="7" />
                            <span>Física&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </label>

                        <label class="center">
                            <input id="disciplina" type="checkbox" class="filled-in checkbox-blue-grey" name="filosofia" value="8" />
                            <span>Filosofia</span>
                        </label>

                    </div>
                    <div class="col s6 m2 l2">

                        <label class="left">
                            <input id="disciplina" type="checkbox" class="filled-in checkbox-blue-grey" name="historia" value="9" />
                            <span>História</span>
                        </label>

                        <label class="left">
                            <input id="disciplina" type="checkbox" class="filled-in checkbox-blue-grey" name="geografia" value="10" />
                            <span>Geografia</span>
                        </label>

                    </div>
                    <div class="col s6 m2 l2">

                        <label class="left">
                            <input id="disciplina" type="checkbox" class="filled-in checkbox-blue-grey" name="sociologia" value="11" />
                            <span>Sociologia</span>
                        </label>

                        <label class="left">
                            <input id="disciplina" type="checkbox" class="filled-in checkbox-blue-grey" name="ed_fisica" value="12" />
                            <span>Ed Física</span>
                        </label>

                    </div>
                </div>
            </div>
            <div class="input-field right">
                <button btn="btncadastrar" value="formProfessor" id="btnFormContas" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i>Cadastrar</button>
            </div>
        </form>
    </div>

    <script src="js/query-3.3.1.min.js"></script>
    <script src="js/default.js"></script>

    <?php require_once 'reqFooter.php' ?>