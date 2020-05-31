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
                <?php while ($mensagens = $query_mensagem->fetch(PDO::FETCH_ASSOC)) {?>
                    <tr>
                        <td><i class="small left material-icons blue-icon hide-on-small-only">email</i>
                            <?php echo $mensagens["data"]?></td>
                        <td><?php echo $mensagens["assunto"]?></td>
                        <td><?php echo $mensagens["mensagem"]?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalMensagem" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Nova Mensagem</h4><br>
            <div id="novaMensagem">
                <div class="row">
                    <div class="input-field col s12 m4 l12">
                        <select name="opcMensagem" id="opcMensagem">
                            <option value="" disabled selected></option>
                            <option value="1">Aluno</option>
                            <option value="2">Responsável</option>
                            <option value="3">Professor</option>
                            <option value="4">Diretor</option>
                        </select>
                        <label id="lbl" for="first_name">Escolha para quem deseja enviar a mensagem</label>
                    </div>
                </div>
                <label id="lbl">Encaminhar para:</label><br><br>
                <div class="row">
                    <div class="col s6 m2 l4">

                        <label class="left">
                            <input id="escola_geral" type="checkbox" class="filled-in checkbox-blue-grey"
                                name="ecola_geral" value="1" />
                            <span>Toda Escola</span>
                        </label>

                    </div>
                    <div class="col s6 m2 l4">
                        <label class="left">
                            <input id="alunos_geral" type="checkbox" class="filled-in checkbox-blue-grey"
                                name="alunos_geral" value="2" />
                            <span>Todos Alunos</span>
                        </label>

                    </div>
                    <div class="col s6 m2 l4">

                        <label class="left">
                            <input id="responsaveis_geral" type="checkbox" class="filled-in checkbox-blue-grey"
                                name="responsaveis_geral" value="3" />
                            <span>Todos Responsáveis</span>
                        </label>

                    </div>
                </div>
                <form class="col s12" action="php/enviarDiretor.php">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="mensagem" id="mensagem" class="materialize-textarea"></textarea>
                            <label for="textarea1">Digite a sua Mensagem</label>
                        </div>
                    </div>
                </form>
                <div class="input-field right">
                    <button btn="btncadastrar" value="formProfessor" id="btnFormContas" type="submit"
                        class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                </div>
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
            <li><a href="#modalArquivados" class="modal-trigger btn-floating green tooltipped" data-position="left"
                    data-tooltip="Mensagens Arquivadas"><i class="material-icons">archive</i></a></li>
            <li><a href="#modalMensagem" class="modal-trigger btn-floating yellow tooltipped" data-position="left"
                    data-tooltip="Nova Mensagem"><i class="material-icons">email</i></a></li>
        </ul>
    </div>

    <script src="js/mensagensDiretor.js"></script>


    <?php require_once 'reqFooter.php' ?>