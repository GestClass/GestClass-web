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
    <link rel="stylesheet" type="text/css" href="css/mensagensDiretor.css" />


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


    $query_mensagem = $conn->prepare("SELECT nome_diretor,fk_recebimento_diretor_id_diretor,data,assunto,mensagem
    FROM diretor AS D 
    JOIN contato AS c ON D.id_diretor = C.fk_recebimento_diretor_id_diretor and d.id_diretor = {$id_usuario}");
    $query_mensagem->execute();




    ?>

    <div class="container"><br><br><br>
        <div id="mensagens">
            <table class="highlight centered col s12 m12 l12">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Assunto</th>
                        <th>Mensagem</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($mensagens = $query_mensagem->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><i class="small left material-icons blue-icon hide-on-small-only">email</i>
                                <?php echo $mensagens["data"] ?></td>
                            <td><?php echo $mensagens["assunto"] ?></td>
                            <td><?php echo $mensagens["mensagem"] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalMensagem" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Nova Mensagem</h4><br>
            <div id="novaMensagem">
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <select id="mensagemDiretor" onchange="formDiretor()">
                            <option value="" disabled selected></option>
                            <optgroup label="Aluno">
                                <option value="1">Todas Turmas</option>
                                <option value="2">Uma Turma</option>
                                <option value="3">Um Aluno</option>
                            <optgroup label="Professor">
                                <option value="4">Todos Professores</option>
                                <option value="5">Um Professor</option>
                            <optgroup label="Responsável">
                                <option value="6">Todos Responsáveis</option>
                                <option value="7">Um Responsável</option>
                            <optgroup label="Outros">
                                <option value="8">Secretaria</option>
                                <option value="9">Toda Escola</option>
                        </select>
                        <label id="lbl" for="first_name">Escolha para quem deseja enviar a mensagem</label>
                    </div>
                </div>

                <form class="formTodasTurmasDiretor" id="formTodasTurmasDiretor" class="col s12" action="php/enviarDiretor.php">
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem para todas turmas" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formMensagem" id="formMensagem" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                    </div>
                </form>

                <form class="formUmaTurmaDiretor" id="formUmaTurmaDiretor" class="col s12" action="php/enviarDiretor.php">
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="nome_turma" type="text" id="autocomplete-input" placeholder="Digite o nome da turma" class="autocomplete validate">
                                    <label id="lbl" for="autocomplete-input">Nome Turma</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem para a turma" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formMensagem" id="formMensagem" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                    </div>
                </form>

                <form class="formUmAlunoDiretor" id="formUmAlunoDiretor" class="col s12" action="php/enviarDiretor.php">
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="nome_aluno" type="text" id="autocomplete-input" placeholder="Digite o nome do aluno" class="autocomplete validate">
                                    <label id="lbl" for="autocomplete-input">Nome Aluno</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem aqui para o aluno" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formMensagem" id="formMensagem" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                    </div>
                </form>

                <form class="formTodosProfessoresDiretor" id="formTodosProfessoresDiretor" class="col s12" action="php/enviarDiretor.php">
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem para todos professores" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formMensagem" id="formMensagem" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                    </div>
                </form>

                <form class="formUmProfessorDiretor" id="formUmProfessorDiretor" class="col s12" action="php/enviarDiretor.php">
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="nome_professor" type="text" id="autocomplete-input" placeholder="Digite o nome do professor" class="autocomplete validate">
                                    <label id="lbl" for="autocomplete-input">Nome Professor</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite a mensagem oara o professor" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formMensagem" id="formMensagem" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                    </div>
                </form>

                <form class="formTodosResponsavelDiretor" id="formTodosResponsavelDiretor" class="col s12" action="php/enviarDiretor.php">
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem para todos responsáveis" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formMensagem" id="formMensagem" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                    </div>
                </form>

                <form class="formUmResponsavelDiretor" id="formUmResponsavelDiretor" class="col s12" action="php/enviarDiretor.php">
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="nome_responsavel" type="text" id="autocomplete-input" placeholder="Digite o nome do responsavel" class="autocomplete validate">
                                    <label id="lbl" for="autocomplete-input">Nome Responsável</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem para o responsavel" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formMensagem" id="formMensagem" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                    </div>
                </form>

                <form class="formSecretariaDiretor" id="formSecretariaDiretor" class="col s12" action="php/enviarDiretor.php">
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem para secretaria" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formMensagem" id="formMensagem" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                    </div>
                </form>

                <form class="formEscolaGeralDiretor" id="formEscolaGeralDiretor" class="col s12" action="php/enviarDiretor.php">
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="tel" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem para toda escola" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formMensagem" id="formMensagem" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Sair</a>
        </div>
    </div>

    <div id="modalArquivados" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Mensagens Arquivadas</h4>
            <div id="arquivadas">
                <table class="highlight centered">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Assunto</th>
                            <th>Remetente</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><i class="small left material-icons  blue-icon">drafts</i> 23/04/2020</td>
                            <td>Vagas de estagios</td>
                            <td>Banco do Brasil</td>
                        </tr>
                        <tr>
                            <td><i class="small left material-icons  blue-icon">drafts</i> 22/04/2020</td>
                            <td>Vagas de estagios</td>
                            <td>Banco do Brasil</td>

                        </tr>
                        <tr>
                            <td><i class="small left material-icons  blue-icon">drafts</i> 15/04/2020</td>
                            <td>Vagas de estagios</td>
                            <td>Banco do Brasil</td>

                        </tr>
                        <tr>
                            <td><i class="small left material-icons  blue-icon">drafts</i> 10/04/2020</td>
                            <td>Vagas de estagios</td>
                            <td>Banco do Brasil</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Sair</a>
        </div>
    </div>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large light-blue lighten-1">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a href="#modalArquivados" class="modal-trigger btn-floating green accent-2 tooltipped" data-position="left" data-tooltip="Mensagens Arquivadas"><i class="material-icons">archive</i></a></li>
            <li><a href="#modalMensagem" class="modal-trigger btn-floating yellow lighten-2 tooltipped" data-position="left" data-tooltip="Nova Mensagem"><i class="material-icons">email</i></a></li>
        </ul>
    </div>

    <script src="js/mensagensDiretor.js"></script>


    <?php require_once 'reqFooter.php' ?>