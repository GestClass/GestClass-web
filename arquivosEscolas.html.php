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
    <link rel="stylesheet" type="text/css" href="css/admins.css" />

</head>

<?php require_once 'reqMenuAdm.php';
$id_escola = $_GET["id"];
?>

<body>
    <div class="container">
        <h3 class="center">Caixa de Mensagens</h3>
        <br>
        <div id="escolas">
            <table class="highlight centered col s12 m12 l12">

                <thead>
                    <tr>
                        <th>Arquivo</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <td>Mensagens</td>
                    <td>Mensagens trocada pelos usuários</td>
                    <td><a href="php/excluirArquivosEscolas.php?id=<?php echo $id_escola ?>&opc=<?php echo '1'?>">
                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center">
                                <i class="material-icons left">delete</i>Excluir Arquivo</button></a></td>
                </tbody>

                <tbody>
                    <td>Materiais de Apoio</td>
                    <td>Materiais enviado aos alunos</td>
                    <td><a href="php/excluirArquivosEscolas.php?id=<?php echo $id_escola ?>&opc=<?php echo '2'?>">
                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center">
                                <i class="material-icons left">delete</i>Excluir Arquivo</button></a></td>
                </tbody>

                <tbody>
                    <td>Outros Arquivos</td>
                    <td>Arquivos enviado aos responsáveis</td>
                    <td><a href="php/excluirArquivosEscolas.php?id=<?php echo $id_escola ?>&opc=<?php echo '3'?>">
                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center">
                                <i class="material-icons left">delete</i>Excluir Arquivo</button></a></td>
                </tbody>

            </table>
        </div>
    </div>
</body>

<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script src="js/customAdm.js"></script>
<script src="js/default.js"></script>

</html>