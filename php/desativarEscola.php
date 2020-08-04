<?php
include_once  'conexao.php';

$id_escola = $_GET['id_escola'];
$situacao = false;

$query_desativar = $conn->prepare("UPDATE escola SET situacao = :false WHERE ID_escola = :id_escola");
$query_desativar->bindParam(':false', $situacao, PDO::FETCH_ASSOC);
$query_desativar->bindParam(':id_escola', $id_escola, PDO::FETCH_ASSOC);
$query_desativar->execute();

if ($query_desativar->rowCount()) {
    ?>
            <script>
                alert('Escola desativada com sucesso!');
                window.location = '../cadastroEscola.html.php';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Erro ao desativar escola!');
                window.location = '../cadastroEscola.html.php';
            </script>
    <?php
        }
    
    ?>
