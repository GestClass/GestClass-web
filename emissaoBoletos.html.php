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
    <link rel="stylesheet" type="text/css" href="css/mensagensResponsavel.css" />

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


    $query_boleto = $conn->prepare("SELECT ID_envio_boleto,fk_id_responsavel_recebimento_boleto, data_envio, boleto FROM envio_boleto WHERE fk_id_responsavel_recebimento_boleto = $id_usuario ORDER BY data_envio DESC");
    $query_boleto->execute();

    ?>

    <div class="container"><br>
        <h3 class="center">Emissão de Boletos</h4><br>
        <div id="boletos">
            <table class="highlight col s12 m12 l12">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Boletos</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($listar = $query_boleto->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><i class="small left material-icons blue-icon hide-on-small-only">picture_as_pdf</i>
                                <?php echo date('d/m/Y H:i:s', strtotime($listar["data_envio"])); ?></td>
                            <td><a download="assets/boletos/<?php echo $listar["boleto"] ?>" href="assets/boletos/<?php echo $listar["boleto"] ?>"><?php echo $listar["boleto"] ?></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>



    <?php require_once 'reqFooter.php' ?>