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

$query = $conn->prepare("SELECT * FROM escola");
$query->execute();

?>

<body>
    <div class="container">
        <h3 class="center">Caixa de Mensagens</h3>
        <br>
        <div id="escolas">
            <table class="highlight centered col s12 m12 l12">

                <thead>
                    <tr>
                        <th>Escola</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($dados = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                        <td><?php echo $dados["nome_escola"] ?></td>
                        <td><?php echo $dados["email"] ?></td>
                        <td><?php echo $dados["telefone"] ?></td>
                        <td><a href="arquivosEscolas.html.php?id=<?php echo $dados["ID_escola"] ?>">
                                <button id="btnTableChamada" type="submit" class="btn-flat btnAdmin tooltipped" data-tooltip="Ver Informações">
                                    <i class="small material-icons center">error_outline</i></button></a></td>
                </tbody>
                    <?php
                    }
                    ?>
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