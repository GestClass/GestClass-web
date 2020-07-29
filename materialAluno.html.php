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


    $query_material = $conn->prepare("SELECT *FROM aluno AS A 
    JOIN envio_material_apoio AS C ON A.RA = C.fk_id_aluno_recebimento_material and A.RA = $id_usuario  ORDER BY data_envio DESC");
    $query_material->execute();



    ?>

    <div class="container"><br>
        <h3 class="center">Materiais de Apoio</h3>
        <br><br>
        <div id="material">
            <table class="centered col s12 m12 l12">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Usuário</th>
                        <th>Assunto</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($materiais = $query_material->fetch(PDO::FETCH_ASSOC)) {
                        if ($materiais["fk_id_tipo_usuario_envio_material"] == 2) {
                            $dados_diretor = $materiais["fk_id_diretor_envio_material"];

                            $query_diretor = $conn->prepare("SELECT ID_diretor,nome_diretor FROM diretor WHERE ID_diretor = $dados_diretor");
                            $query_diretor->execute();

                            while ($diretor_dados = $query_diretor->fetch(PDO::FETCH_ASSOC)) {
                                $nome = $diretor_dados["nome_diretor"];
                    ?>
                                <tr>
                                    <td><?php echo date('d/m/Y H:i:s', strtotime($materiais["data_envio"])); ?></td>
                                    <td>Diretor</td>
                                    <td><?php echo $materiais["assunto_material"] ?></td>
                                    <td><a href="materialApoioAluno.html.php?id=<?php echo $materiais["ID_envio_material"] ?>&n=<?php echo $nome ?>&i=<?php echo $dados_diretor ?>&u=<?php echo 2 ?>">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Material de Apoio" style="margin-top: 5px;">
                                                <i class="small material-icons center">picture_as_pdf</i></button></a></td>
                                </tr>
                            <?php
                            }
                        } elseif ($materiais["fk_id_tipo_usuario_envio_material"] == 4) {
                            $dados_professor = $materiais["fk_id_professor_envio_material"];

                            $query_professor = $conn->prepare("SELECT ID_professor,nome_professor FROM professor WHERE ID_professor = $dados_professor");
                            $query_professor->execute();

                            while ($professor_dados = $query_professor->fetch(PDO::FETCH_ASSOC)) {
                                $nome = $professor_dados["nome_professor"];



                            ?>
                                <tr>
                                    <td><?php echo date('d/m/Y H:i:s', strtotime($materiais["data_envio"])); ?></td>
                                    <td>Professor</td>
                                    <td><?php echo $materiais["assunto_material"] ?></td>
                                    <td><a href="materialApoioAluno.html.php?id=<?php echo $materiais["ID_envio_material"] ?>&n=<?php echo $nome ?>&i=<?php echo $dados_professor ?>&u=<?php echo 4 ?>&d=<?php echo $materiais["fk_id_disciplina_material"];?>">
                                            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue tooltipped" data-tooltip="Ver Material de Apoio" style="margin-top: 5px;">
                                                <i class="small material-icons center">picture_as_pdf</i></button></a></td>
                                </tr>
                    <?php
                            }
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php require_once 'reqFooter.php' ?>