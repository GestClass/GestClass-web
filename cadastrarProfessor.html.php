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
                require_once 'reqAdmGest.php';
            } else if($id_tipo_usuario == 2){
                require_once 'reqDiretor.php';
            }else if($id_tipo_usuario == 3){
                require_once 'reqHeader.php';
            }elseif ($id_tipo_usuario == 4) {
                require_once 'reqProfessor.php';
            }elseif ($id_tipo_usuario  == 5) {
                require_once 'reqAluno.php';
            }else {
                require_once 'reqPais.php';
            }
    ?>

    <div class="container col s12 m12 l12 ">
        <form id="professor" method="POST" action="./controller/cadastro.controller.php">
            <h5>Professor</h5>
            <div class="row">
                <div class="file-field input-field col s12 m3 l3">
                    <div id="btnfoto" class="btn col s6">
                        <span><i class="material-icons">add_a_photo</i></span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input id="foto" class="file-path validate" type="text">
                    </div>
                </div>
                <div class="input-field col s12 m9 l9">
                    <i class="material-icons prefix blue-icon">account_circle</i>
                    <input id="nome_professor" type="text" placeholder="Nome Professor" class="validate">
                    <label id="lbl" for="icon_prefix">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m4 l4">
                    <i class="material-icons prefix blue-icon">ballot</i>
                    <input id="rg" placeholder="68.124.586-8" type="tel" data-mask="00.000.000-0" class="validate">
                    <label id="lbl" for="icon_telephone">RG</label>
                </div>
                <div class="input-field col s6 m4 l4">
                    <i class="material-icons prefix blue-icon">ballot</i>
                    <input id="cpf" placeholder="158.688.987-10" type="tel" data-mask="000.000.000-00" class="validate">
                    <label id="lbl" for="icon_telephone">CPF</label>
                </div>
                <div class="input-field col s12 m4 l4">
                    <i class="material-icons prefix blue-icon">cake</i>
                    <input id="data_nascimento" placeholder="Ano/Mes/Dia" type="text" class="datepicker validate">
                    <label id="lbl">Data Nascimento</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m4 l2">
                    <i class="material-icons prefix blue-icon">location_on</i>
                    <input id="cep" placeholder="08574-150" type="text" data-mask="00000-000" class="validate" onblur="pesquisacep(this.value);">
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
                    <input id="numero" placeholder="Número" type="tel" class="validate ">
                    <label id="lbl" for="first_name">Nº</label>
                </div>
                <div id="a" class="input-field col s10 m6 l2">
                    <input id="complemento" placeholder="Complemento" type="tel" class="validate ">
                    <label id="lbl" for="first_name">Complemento</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m4 l4">
                    <i class="material-icons prefix blue-icon">alternate_email</i>
                    <input id="email" placeholder="gestclass@entreprise.com" type="tel" class="validate">
                    <label id="lbl" for="icon_telephone">Email</label>
                </div>
                <div class="input-field col s12 m4 l4">
                    <i class="material-icons prefix blue-icon">security</i>
                    <input id="senha" placeholder="*******" type="password" class="validate">
                    <label id="lbl" for="icon_telephone">Senha</label>
                </div>
                <div id="a" class="input-field col s10 m4 l4">
                    <input id="confsenha" placeholder="*******" type="password" class="validate">
                    <label id="lbl" for="icon_telephone">Confirmar senha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">smartphone</i>
                    <input id="celular" placeholder="(11) 97765-3360" type="tel" data-mask="(00) 00000-0000" class="validate">
                    <label id="lbl" for="icon_telephone">Celular</label>
                </div>
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">call</i>
                    <input id="telefone" placeholder="(11) 9765-3360" type="tel" data-mask="(00) 0000-0000" class="validate">
                    <label id="lbl" for="icon_telephone">Telefone</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">school</i>
                    <select id="nome_tipo_turma" multiple>
                        <option value="" disabled selected>Selecione o Ensino</option>
                        <option value="1">Berçario</option>
                        <option value="2">Pré Escola</option>
                        <option value="3">Fundamental I</option>
                        <option value="4">Fundamental II</option>
                        <option value="5">Ensino Médio</option>
                    </select>
                    <label id="lbl">Tipos Turmas</label>
                </div>
                <div id="a" class="input-field col s10 m6 l6">
                    <select id="nome_turma" multiple>
                        <option value="" disabled selected>Selecione a Turma</option>
                        <option value="1">Berçario A</option>
                        <option value="2">Pré 1 A</option>
                        <option value="3">Pré 2 B</option>
                        <option value="4">1º ano A</option>
                        <option value="4">2º ano A</option>
                        <option value="4">3º ano A</option>
                        <option value="4">4º ano A</option>
                        <option value="4">5º ano A</option>
                        <option value="4">6º ano A</option>
                        <option value="4">7º ano A</option>
                        <option value="4">8º ano A</option>
                        <option value="4">9º ano A</option>
                        <option value="5">1º ano médio A</option>
                        <option value="5">2º ano médio A</option>
                        <option value="5">3º ano médio A</option>
                    </select>
                    <label id="lbl">Turmas</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">school</i>
                    <select id="nome_disciplina" multiple>
                        <option value="" disabled selected>Selecione a Disciplina</option>
                        <option value="1">Português</option>
                        <option value="2">Matemática</option>
                        <option value="3">Inglês</option>
                        <option value="4">Ciências</option>
                        <option value="5">Geografia</option>
                        <option value="6">História</option>
                        <option value="7">Ed Física</option>
                        <option value="8">Artes</option>
                        <option value="9">Biologia</option>
                        <option value="10">Sociologia</option>
                        <option value="11">Filosofia</option>
                        <option value="12">Química</option>
                        <option value="13">Física</option>
                    </select>
                    <label id="lbl">Diciplinas</label>
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