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
    <link rel="stylesheet" type="text/css" href="css/mensagensDProfessor.css" />


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


    $query_mensagem = $conn->prepare("SELECT *
    FROM professor AS P 
    JOIN contato AS C ON P.id_professor = C.fk_recebimento_professor_id_professor and P.id_professor = {$id_usuario}  ORDER BY data_mensagem DESC");
    $query_mensagem->execute();




    ?>

    <div class="container"><br><br><br>
        <div id="mensagens">
            <table class="highlight centered col s12 m12 l12">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Remetente</th>
                        <th>Nome</th>
                        <th>Assunto</th>
                        <th>Mensagem</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($mensagens = $query_mensagem->fetch(PDO::FETCH_ASSOC)) {
                        if ($mensagens["fk_id_tipo_usuario_envio"] == 2) {
                            $dados_diretor = $mensagens["fk_envio_diretor_id_diretor"];

                            $query_diretor = $conn->prepare("SELECT ID_diretor,nome_diretor FROM diretor WHERE ID_diretor = $dados_diretor");
                            $query_diretor->execute();

                            while ($diretor_dados = $query_diretor->fetch(PDO::FETCH_ASSOC)) {
                                $nome_diretor = $diretor_dados["nome_diretor"];
                    ?>
                                <tr>
                                    <td><i class="small left material-icons blue-icon hide-on-small-only">email</i>
                                        <?php echo date('d/m/Y H:i:s', strtotime($mensagens["data_mensagem"])); ?></td>
                                    <td>Diretor</td>
                                    <td><?php echo $nome_diretor ?></td>
                                    <td><?php echo $mensagens["assunto"] ?></td>
                                    <td><?php echo $mensagens["mensagem"] ?></td>
                                </tr>
                            <?php
                            }
                        } elseif ($mensagens["fk_id_tipo_usuario_envio"] == 3) {
                            $dados_secretario = $mensagens["fk_envio_secretario_id_secretario"];

                            $query_secretario = $conn->prepare("SELECT ID_secretario,nome_secretario FROM secretario WHERE ID_secretario = $dados_secretario");
                            $query_secretario->execute();

                            while ($secretario_dados = $query_secretario->fetch(PDO::FETCH_ASSOC)) {
                                $nome_secretario = $secretario_dados["nome_secretario"];

                            ?>
                                <tr>
                                    <td><i class="small left material-icons blue-icon hide-on-small-only">email</i>
                                        <?php echo date('d/m/Y H:i:s', strtotime($mensagens["data_mensagem"])); ?></td>
                                    <td>Secretario</td>
                                    <td><?php echo $nome_secretario ?></td>
                                    <td><?php echo $mensagens["assunto"] ?></td>
                                    <td><?php echo $mensagens["mensagem"] ?></td>
                                </tr>
                            <?php
                            }
                        } elseif ($mensagens["fk_id_tipo_usuario_envio"] == 5) {
                            $dados_aluno = $mensagens["fk_envio_aluno_ra_aluno"];

                            $query_aluno = $conn->prepare("SELECT RA,nome_aluno FROM aluno WHERE RA = $dados_aluno");
                            $query_aluno->execute();

                            while ($aluno_dados = $query_aluno->fetch(PDO::FETCH_ASSOC)) {
                                $nome_aluno = $aluno_dados["nome_aluno"];

                            ?>
                                <tr>
                                    <td><i class="small left material-icons blue-icon hide-on-small-only">email</i></a>
                                        <?php echo date('d/m/Y H:i:s', strtotime($mensagens["data_mensagem"])); ?></td>
                                    <td>aluno</td>
                                    <td><?php echo $nome_aluno ?></td>
                                    <td><?php echo $mensagens["assunto"] ?></td>
                                    <td><?php echo $mensagens["mensagem"] ?></td>
                                </tr>
                    <?php
                            }
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalEnviarAluno" class="modal">
        <div class="modal-content">
            <h4>Selecione a turma</h4>
            <div class="input-field col s12">
                <form action="listaAlunosMensagens.html.php" method="POST">
                    <select name="turmas">
                        <option value="" disabled selected>Selecione a Turma</option>

                        <?php

                        $query_select_turmas_professor = $conn->prepare("SELECT fk_id_turma_professor_turmas_professor FROM turmas_professor WHERE fk_id_professor_turmas_professor = $id_usuario");
                        $query_select_turmas_professor->execute();

                        while ($dados_turmas_professor = $query_select_turmas_professor->fetch(PDO::FETCH_ASSOC)) {

                            $id_turma = $dados_turmas_professor["fk_id_turma_professor_turmas_professor"];

                            $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
                            $query_select_turma->execute();

                            while ($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                                $nome_turma = $dados_turma_nome["nome_turma"];

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
                        } ?>
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

    <div id="modalEnviarTurma" class="modal ">
        <div class="modal-content">
            <h4>Nova Mensagem</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/enviarProfessorTurmas.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m4 l12">
                            <select name="destinatario" id="mensagemProf">
                                <option value="" disabled selected>Selecione uma Turma</option>

                                <?php

                                $query_select_turmas_professor = $conn->prepare("SELECT fk_id_turma_professor_turmas_professor FROM turmas_professor WHERE fk_id_professor_turmas_professor = $id_usuario");
                                $query_select_turmas_professor->execute();

                                while ($dados_turmas_professor = $query_select_turmas_professor->fetch(PDO::FETCH_ASSOC)) {

                                    $id_turma = $dados_turmas_professor["fk_id_turma_professor_turmas_professor"];

                                    $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
                                    $query_select_turma->execute();

                                    while ($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                                        $nome_turma = $dados_turma_nome["nome_turma"];

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

    <div id="modalSecreDiretor" class="modal">
        <div class="modal-content">
            <h4>Nova Mensagem</h4><br>
            <div id="novaMensagem">
                <form action="php/enviarMensagem/enviarProfessor.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m4 l12">
                            <select name="destinatario" id="mensagemProf">
                                <option value="" disabled selected>Selecione uma Opção</option>
                                <option value="1">Secretaria</option>
                                <option value="2">Diretor</option>
                            </select>
                            <label id="lbl" for="first_name">Escolha para quem deseja enviar a mensagem</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="assunto" id="assunto" placeholder="Digite o assunto" type="text" class="validate">
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

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large light-blue lighten-1">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a href="#modalSecreDiretor" class="modal-trigger btn-floating  yellow accent-2 tooltipped" data-position="left" data-tooltip="Secretaria ou Diretor"><i class="material-icons">portrait</i></a></li>
            <li><a href="#modalEnviarTurma" class="modal-trigger btn-floating blue tooltipped" data-position="left" data-tooltip="Turmas"><i class="material-icons">school</i></a></li>
            <li><a href="#modalEnviarAluno" class="modal-trigger btn-floating red lighten-2 tooltipped" data-position="left" data-tooltip="Aluno"><i class="material-icons">face</i></a></li>
        </ul>
    </div>


    <?php require_once 'reqFooter.php' ?>