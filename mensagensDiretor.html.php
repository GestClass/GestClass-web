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


    $query_mensagem = $conn->prepare("SELECT nome_diretor,fk_recebimento_diretor_id_diretor,data_mensagem,assunto,mensagem
    FROM diretor AS D 
    JOIN contato AS c ON D.id_diretor = C.fk_recebimento_diretor_id_diretor and d.id_diretor = {$id_usuario}  ORDER BY data_mensagem DESC");
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
                                <?php echo date('d/m/Y H:i:s', strtotime($mensagens["data_mensagem"])); ?></td>
                            <td><?php echo $mensagens["assunto"] ?></td>
                            <td><?php echo $mensagens["mensagem"] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalEnviarAluno" class="modal">
        <div class="modal-content">
            <h4>Selecione a turma do aluno</h4>
            <div class="input-field col s12">
                <form action="listaAlunosMensagens.html.php" method="POST">
                    <select name="turmas">
                        <option value="" disabled selected>Selecione a Turma</option>
                        <?php

                        $query_select_id_turma = $conn->prepare("SELECT ID_turma FROM turma WHERE $id_escola");
                        $query_select_id_turma->execute();

                        while ($dados_turma_id = $query_select_id_turma->fetch(PDO::FETCH_ASSOC)) {
                            $id_turma = $dados_turma_id['ID_turma'];

                            $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
                            $query_select_turma->execute();

                            while ($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                                $nome_turma = $dados_turma_nome['nome_turma'];

                                $query_turno = $conn->prepare("SELECT fk_id_turno_turma FROM turma WHERE ID_turma = $id_turma");
                                $query_turno->execute();

                                while ($dados_turno = $query_turno->fetch(PDO::FETCH_ASSOC)) {
                                    $id_turno = $dados_turno['fk_id_turno_turma'];

                                    $query_turno_nome = $conn->prepare("SELECT nome_turno FROM turno WHERE ID_turno = $id_turno");
                                    $query_turno_nome->execute();

                                    while ($dados_nome_turno = $query_turno_nome->fetch(PDO::FETCH_ASSOC)) {
                                        $nome_turno = $dados_nome_turno['nome_turno'];

                        ?>
                                        <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?></option>
                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </select>
                    <br>
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">search</i>Pesquisar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalEnviarTurma" class="modal">
        <div class="modal-content">
            <h4>Nova Mensagem</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/enviarTurmas.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m4 l12">
                            <select name="destinatario">
                                <option value="" disabled selected>Selecione uma Turma</option>

                                <?php

                                $query_select_id_turma = $conn->prepare("SELECT ID_turma FROM turma WHERE $id_escola");
                                $query_select_id_turma->execute();

                                while ($dados_turma_id = $query_select_id_turma->fetch(PDO::FETCH_ASSOC)) {
                                    $id_turma = $dados_turma_id['ID_turma'];

                                    $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
                                    $query_select_turma->execute();

                                    while ($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                                        $nome_turma = $dados_turma_nome['nome_turma'];

                                        $query_turno = $conn->prepare("SELECT fk_id_turno_turma FROM turma WHERE ID_turma = $id_turma");
                                        $query_turno->execute();

                                        while ($dados_turno = $query_turno->fetch(PDO::FETCH_ASSOC)) {
                                            $id_turno = $dados_turno['fk_id_turno_turma'];

                                            $query_turno_nome = $conn->prepare("SELECT nome_turno FROM turno WHERE ID_turno = $id_turno");
                                            $query_turno_nome->execute();

                                            while ($dados_nome_turno = $query_turno_nome->fetch(PDO::FETCH_ASSOC)) {
                                                $nome_turno = $dados_nome_turno['nome_turno'];

                                ?>
                                                <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?></option>
                                <?php
                                            }
                                        }
                                    }
                                }
                                ?>
                            </select>
                            <label id="lbl" for="first_name">Escolha a turma para que deseja enviar a mensagem</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="text" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem aqui" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formProfessor" id="btnFormContas" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div id="modalEnviarProfessor" class="modal">
        <div class="modal-content">
            <h4>Nova Mensagem</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarDiretorProf.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m4 l12">
                            <select name="destinatario">
                                <option value="" disabled selected>Selecione um Professor</option>

                                <?php

                                $query_select_professor = $conn->prepare("SELECT ID_professor FROM professor WHERE fk_id_escola_professor = $id_escola");
                                $query_select_professor->execute();

                                while ($dados_professor = $query_select_professor->fetch(PDO::FETCH_ASSOC)) {
                                    $id_professor = $dados_professor["ID_professor"];

                                    $query_select_professor = $conn->prepare("SELECT nome_professor FROM professor WHERE ID_professor = $id_professor");
                                    $query_select_professor->execute();

                                    while ($dados_professor_nome = $query_select_professor->fetch(PDO::FETCH_ASSOC)) {
                                        $nome_professor = $dados_professor_nome["nome_professor"];

                                ?>
                                        <option value="<?php echo $id_professor ?>"><?php echo $nome_professor; ?></option>
                                <?php
                                    }
                                } ?>
                            </select>
                            <label id="lbl" for="first_name">Escolha a turma para que deseja enviar a mensagem</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="text" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem aqui" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formProfessor" id="btnFormContas" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div id="modalEnviarResponsavel" class="modal">
        <div class="modal-content">
            <h4>Selecione a turma do aluno</h4>
            <div class="input-field col s12">
                <form action="listaResponMensagens.html.php" method="POST">
                    <select name="turmas">
                        <option value="" disabled selected>Selecione a Turma</option>
                        <?php

                        $query_select_id_turma = $conn->prepare("SELECT ID_turma FROM turma WHERE $id_escola");
                        $query_select_id_turma->execute();

                        while ($dados_turma_id = $query_select_id_turma->fetch(PDO::FETCH_ASSOC)) {
                            $id_turma = $dados_turma_id['ID_turma'];

                            $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
                            $query_select_turma->execute();

                            while ($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                                $nome_turma = $dados_turma_nome['nome_turma'];

                                $query_turno = $conn->prepare("SELECT fk_id_turno_turma FROM turma WHERE ID_turma = $id_turma");
                                $query_turno->execute();

                                while ($dados_turno = $query_turno->fetch(PDO::FETCH_ASSOC)) {
                                    $id_turno = $dados_turno['fk_id_turno_turma'];

                                    $query_turno_nome = $conn->prepare("SELECT nome_turno FROM turno WHERE ID_turno = $id_turno");
                                    $query_turno_nome->execute();

                                    while ($dados_nome_turno = $query_turno_nome->fetch(PDO::FETCH_ASSOC)) {
                                        $nome_turno = $dados_nome_turno['nome_turno'];

                        ?>
                                        <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?></option>
                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </select>
                    <br>
                    <div class="center">
                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                            <i class="material-icons left">search</i>Pesquisar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalSecretaria" class="modal">
        <div class="modal-content">
            <h4>Nova Mensagem</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/enviarDiretor.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="text" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formMensagem" id="formMensagem" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalEncaminharMensagem" class="modal">
        <div class="modal-content">
            <h4>Encaminhar Mensagem Para Todos</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/encaminharDiretor.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m4 l12">
                            <select name="EncaminharMensagens" id="mensagemDiretor">
                                <option value="" disabled selected>Selecione uma Opção</option>
                                <?php

                                $query_select_id_usuario = $conn->prepare("SELECT ID_tipo_usuario FROM tipo_usuario WHERE $id_escola ORDER BY `ID_tipo_usuario` DESC LIMIT 4");
                                $query_select_id_usuario->execute();

                                while ($dados_id_usuario = $query_select_id_usuario->fetch(PDO::FETCH_ASSOC)) {
                                    $id_usuario = $dados_id_usuario['ID_tipo_usuario'];

                                    $query_select_nome_usuario = $conn->prepare("SELECT nome_usuario FROM tipo_usuario WHERE ID_tipo_usuario = $id_usuario");
                                    $query_select_nome_usuario->execute();

                                    while ($dados_nome_usuario = $query_select_nome_usuario->fetch(PDO::FETCH_ASSOC)) {
                                        $nome_usuario = $dados_nome_usuario['nome_usuario'];

                                ?>
                                        <option value="<?php echo $id_usuario ?>"><?php echo $nome_usuario; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <label id="lbl" for="first_name">Escolha para quem deseja enviar a mensagem</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="text" class="validate ">
                            <label id="lbl" for="first_name">Assunto</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" placeholder="Digite a mensagem aqui" class="materialize-textarea"></textarea>
                            <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                    <div class="input-field right">
                        <button btn="btncadastrar" value="formProfessor" id="btnFormContas" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large light-blue lighten-1">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a href="#modalEncaminharMensagem" class="modal-trigger btn-floating indigo lighten-2 tooltipped" data-position="left" data-tooltip="Encaminhar para Todos"><i class="material-icons">record_voice_over</i></a></li>
            <li><a href="#modalSecretaria" class="modal-trigger btn-floating grey darken-1 tooltipped" data-position="left" data-tooltip="Secretaria"><i class="material-icons">perm_identity</i></a></li>
            <li><a href="#modalEnviarResponsavel" class="modal-trigger btn-floating black tooltipped" data-position="left" data-tooltip="Responsável"><i class="material-icons">supervisor_account</i></a></li>
            <li><a href="#modalEnviarProfessor" class="modal-trigger btn-floating  yellow accent-2 tooltipped" data-position="left" data-tooltip="Professor"><i class="material-icons">portrait</i></a></li>
            <li><a href="#modalEnviarTurma" class="modal-trigger btn-floating blue tooltipped" data-position="left" data-tooltip="Turmas"><i class="material-icons">school</i></a></li>
            <li><a href="#modalEnviarAluno" class="modal-trigger btn-floating red lighten-2 tooltipped" data-position="left" data-tooltip="Aluno"><i class="material-icons">face</i></a></li>
        </ul>
    </div>

    <script src="js/mensagensDiretor.js"></script>


    <?php require_once 'reqFooter.php' ?>