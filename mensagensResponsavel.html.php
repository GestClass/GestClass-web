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


    $query_mensagem = $conn->prepare("SELECT nome_responsavel,fk_recebimento_responsavel_id_responsavel,data_mensagem,assunto,mensagem
    FROM responsavel AS R 
    JOIN contato AS C ON R.id_responsavel = C.fk_recebimento_responsavel_id_responsavel and R.id_responsavel = {$id_usuario}");
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
                                <?php echo $mensagens["data_mensagem"] ?></td>
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
                <form action="php/enviarMensagem/enviarResponsavel.php" method="post">
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <select name="destinatario" id="mensagemRespon">
                                <option value="" disabled selected></option>
                                <option value="1">Secretaria</option>
                                <option value="2">Diretor</option>
                            </select>
                            <label id="lbl" for="first_name">Escolha para quem deseja enviar a mensagem</label>
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
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Sair</a>
        </div>
    </div>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large light-blue lighten-1">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a href="#modalMensagem" class="modal-trigger btn-floating yellow lighten-2 tooltipped" data-position="left" data-tooltip="Secretaria ou Diretor"><i class="material-icons">perm_identity</i></a></li>
        </ul>
    </div>


    <?php require_once 'reqFooter.php' ?>