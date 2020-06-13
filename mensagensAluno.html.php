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
    <link rel="stylesheet" type="text/css" href="css/mensagensAluno.css" />


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


    $query_mensagem = $conn->prepare("SELECT nome_aluno,fk_recebimento_aluno_ra_aluno,data_mensagem,assunto,mensagem
    FROM aluno AS A 
    JOIN contato AS C ON A.RA = C.fk_recebimento_aluno_RA_aluno and A.RA = '{$id_usuario}'  ORDER BY data_mensagem DESC");
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
                        <?php echo date('d/m/Y H:i:s',strtotime($mensagens["data_mensagem"]));?></td>
                        <td><?php echo $mensagens["assunto"]?></td>
                        <td><?php echo $mensagens["mensagem"]?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="js/mensagensAluno.js"></script>


    <?php require_once 'reqFooter.php' ?>