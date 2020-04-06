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
        <form id="professor" method="POST" action="php/cadastrarProfessor.php" enctype="multipart/form-data">
            <h5>Professor</h5>
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
                    <input name="nome" id="nome_professor" type="text" placeholder="Nome Professor" class="validate">
                    <label id="lbl" for="icon_prefix">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m6 l6">
                    <i class="material-icons prefix blue-icon">ballot</i>
                    <input name="rg" id="rg" placeholder="68.124.586-8" type="tel" data-mask="00.000.000-0" class="validate">
                    <label id="lbl" for="icon_telephone">RG</label>
                </div>
                <div class="input-field col s6 m6 l6">
                    <i class="material-icons prefix blue-icon">ballot</i>
                    <input name="cpf" id="cpf" placeholder="158.688.987-10" type="tel" data-mask="000.000.000-00" class="validate">
                    <label id="lbl" for="icon_telephone">CPF</label>
                </div>
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
                    <input name="email" id="email" placeholder="gestclass@entreprise.com" type="tel" class="validate">
                    <label id="lbl" for="icon_telephone">Email</label>
                </div>
                <div class="input-field col s12 m4 l4">
                    <i class="material-icons prefix blue-icon">security</i>
                    <input name="senha" id="senha" placeholder="*******" type="password" class="validate">
                    <label id="lbl" for="icon_telephone">Senha</label>
                </div>
                <div id="a" class="input-field col s10 m4 l4">
                    <input name="confsenha" id="confsenha" placeholder="*******" type="password" class="validate">
                    <label id="lbl" for="icon_telephone">Confirmar senha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">smartphone</i>
                    <input name="celular" id="celular" placeholder="(11) 97765-3360" type="tel" data-mask="(00) 00000-0000" class="validate">
                    <label id="lbl" for="icon_telephone">Celular</label>
                </div>
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">call</i>
                    <input name="telefone" id="telefone" placeholder="(11) 9765-3360" type="tel" data-mask="(00) 0000-0000" class="validate">
                    <label id="lbl" for="icon_telephone">Telefone</label>
                </div>
            </div>

            <div class="input-field col s12 m12 l12 ">
                <div class="col s4 m4 l3 ">
                    <label id="lbl" for="first_name">Turmas</label>
                </div><br>
                <div class="row">
                    <div class="col s6 m2 l2">

                        <label class="left">
                            <input id="turma" type="checkbox" class="filled-in checkbox-blue-grey" name="bercario_a" value="1" />
                            <span>Berçario A</span>
                        </label>

                        <label class="left">
                            <input id="turma" type="checkbox" class="filled-in checkbox-blue-grey" name="pre1_a" value="2" />
                            <span>Pré 1 A</span>
                        </label>

                    </div>
                    <div class="col s6 m2 l2">

                        <label class="left">
                            <input id="turma" type="checkbox" class="filled-in checkbox-blue-grey" name="pre2_a" value="3" />
                            <span>Pré 2 A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </label>

                        <label class="left">
                            <input id="turma" type="checkbox" class="filled-in checkbox-blue-grey" name="ano1_a" value="4" />
                            <span>1ºano A</span>
                        </label>

                    </div>
                    <div class="col s6 m2 l2">

                        <label class="left">
                            <input id="turma" type="checkbox" class="filled-in checkbox-blue-grey" name="ano2_a" value="5" />
                            <span>2ºano A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </label>

                        <label class="left">
                            <input id="turma" type="checkbox" class="filled-in checkbox-blue-grey" name="ano3_a" value="6" />
                            <span>3ºano A</span>
                        </label>

                    </div>
                    <div class="col s6 m2 l2">

                        <label class="center">
                            <input id="turma" type="checkbox" class="filled-in checkbox-blue-grey" name="ano4_a" value="8" />
                            <span>4ºano A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </label>

                        <label class="center">
                            <input id="turma" type="checkbox" class="filled-in checkbox-blue-grey" name="ano5_a" value="9" />
                            <span>5ºano A</span>
                        </label>

                    </div>
                    <div class="col s6 m2 l2">

                        <label class="left">
                            <input id="turma" type="checkbox" class="filled-in checkbox-blue-grey" name="ano6_a" value="10" />
                            <span>6ºano A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </label>

                        <label class="left">
                            <input id="turma" type="checkbox" class="filled-in checkbox-blue-grey" name="ano7_a" value="11" />
                            <span>7ºano A</span>
                        </label>

                    </div>
                    <div class="col s6 m2 l2">

                        <label class="left">
                            <input id="turma" type="checkbox" class="filled-in checkbox-blue-grey" name="ano8_a" value="12" />
                            <span>8ºano A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </label>

                        <label class="left">
                            <input id="turma" type="checkbox" class="filled-in checkbox-blue-grey" name="ano9_a" value="13" />
                            <span>9ºano A</span>
                        </label>

                    </div>
                    <br><br><br>
                    <div class="col s6 m2 l2">

                        <label class="left">
                            <input id="turma" type="checkbox" class="filled-in checkbox-blue-grey" name="medio1_a" value="14" />
                            <span>1ºmédio A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </label>

                        <label class="left">
                            <input id="turma" type="checkbox" class="filled-in checkbox-blue-grey" name="medio2_a" value="15" />
                            <span>2ºmédio A</span>
                        </label>

                        <label class="left">
                            <input id="turma" type="checkbox" class="filled-in checkbox-blue-grey" name="medio3_a" value="16" />
                            <span>3ºmédio A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </label>

                    </div>

                </div>
            </div>

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
    <script src="js/cep.js"></script>
    <script src="js/default.js"></script>

    <?php require_once 'reqFooter.php' ?>