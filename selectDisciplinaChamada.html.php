<?php

include_once 'php/conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];


$id_turma = $_POST['turmas'];

if ($id_turma == null) {
?>
    <script>
        alert('Por Favor, Selecione uma Turma');
        history.back();
    </script>
<?php
} else {


?>
    <!DOCTYPE html>
    <html lang="pt">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        <title>GestClass - Is Cool Manage</title>
        <link rel="icon" href="assets/icon/logo.png" />
        <link rel="stylesheet" type="text/css" href="css/boletimVisualizacao.css" />
        <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
        <link rel="stylesheet" type="text/css" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
        <link rel="stylesheet" type="text/css" href="node_modules/animate.css/animate.min.css" />
        <link rel="stylesheet" type="text/css" href="node_modules/aos/dist/aos.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/menu.css" />
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/homeSecretaria.css" />
        <link rel="stylesheet" type="text/css" href="css/homePais.css" />
        <link rel="stylesheet" type="text/css" href="css/grafico.css" />
        <link rel="stylesheet" type="text/css" href="css/homeProfessor.css" />
    </head>

    <body class='bodyDisciplinaGrafico'>
        <button id="btnTable" type="submit" href='#modalSelectChamada' class=" btnDisciplina modal-trigger  btn-flat btnLightBlue center">
            Selecionar Disciplina
        </button>
        <div id="modalSelectChamada" class="modal" data-backdrop="static">
            <div class="modal-content">
                <div class="input-field col s12 validate">
                    <form action="chamada.html.php" method="POST">
                        <input type="hidden" name="id_turma" value="<?php echo $id_turma; ?>">
                        <h4 class="center">Seleciona a Disciplina</h4>
                        <div class='select'>
                            <select name="disciplinas">
                                <option value="" disabled selected>Selecionar Disciplina</option>
                                <h4>Selecione a matéria desejada</h4>
                                <i class="material-icons prefix blue-icon">library_books</i>
                                <?php
                                $query_select_disciplina_turma_professor = $conn->prepare("SELECT fk_id_disciplina_professor_disciplinas_professor FROM disciplinas_professor WHERE fk_id_professor_disciplinas_professor = $id_usuario AND fk_id_turma_professor_disciplinas_professor= $id_turma");
                                $query_select_disciplina_turma_professor->execute();

                                while ($dados_disciplina_turma_professor = $query_select_disciplina_turma_professor->fetch(PDO::FETCH_ASSOC)) {

                                    $id_disciplina = $dados_disciplina_turma_professor["fk_id_disciplina_professor_disciplinas_professor"];

                                    $query_select_nome_disciplina = $conn->prepare("SELECT nome_disciplina FROM disciplina WHERE ID_disciplina = $id_disciplina;");
                                    $query_select_nome_disciplina->execute();

                                    while ($dados_nome_disciplina = $query_select_nome_disciplina->fetch(PDO::FETCH_ASSOC)) {
                                        $nome_disciplina = $dados_nome_disciplina["nome_disciplina"];
                                ?>
                                        <option value="<?php echo $id_disciplina ?>"><?php echo $nome_disciplina ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <div class="center">
                                <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                                    <i class="material-icons left">search</i>Pesquisar
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>


    <?php
    require_once 'reqFooter.php';
}
    ?>