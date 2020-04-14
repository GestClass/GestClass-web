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

<body>
    <?php 
        require_once 'reqMenuAdm.php';
        
        $query_adm = $conn->prepare("select * from admin");
        $query_adm->execute();
        
    ?>
    <h4 class="center-align">Administradores GestClass</h4>
    <div class="container">
        <div class="row">
        <?php while ($dados_adm = $query_adm->fetch(PDO::FETCH_ASSOC)) {?>
            <ul class="collection">
                <li class="collection-item avatar">
                    <img src="assets/imagensBanco/<?php echo $dados_adm['foto']?>" alt="" class="circle">
                    <span class="title"><?php echo $dados_adm['nome']?></span>
                    <p><?php echo $dados_adm['email']?><br>
                    <?php echo $dados_adm['data_nascimento']?>
                    </p>
                    <div class="row">
                            <div class="col s12">
                                <a href="dadosAdmin.html.php?id_admin=<?php echo $dados_adm['ID_admin'];?>"
                                    class="secondary-content" title="Dados da Admin"><i
                                        class="material-icons blue-icon">visibility</i></a>
                            </div>
                            <div class="col s12">
                                <a href="php/deletarAdmin.php?id_admin=<?php echo $dados_adm['ID_admin'];?>"
                                    style="right:50px" class="secondary-content" title="Excluir admin"><i
                                        class="material-icons red-icon">delete</i></a>
                            </div>
                        </div>
                </li>
            </ul>
            <?php }?>
        </div>
    </div>
    


</body>

<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
<script src="js/customAdm.js"></script>
<script src="js/default.js"></script>

</html>