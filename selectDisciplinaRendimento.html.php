<?php

include_once 'php/conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$ra_filho = $_POST['filhos'];

if ($ra_filho == null) {
?>
    <script>
        alert('Por Favor, Selecione um Filho!!');
        history.back();
    </script>
<?php
} else {

    $_SESSION['RA_filho'] = $ra_filho;
    $id_usuario = $_SESSION["id_usuario"];
    $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
    $id_escola = $_SESSION["id_escola"];


    // echo "id usuario ->".$id_usuario."</br>";
    // echo "id tipo usuario ->".$id_tipo_usuario."</br>";
    // echo "id escola ->".$id_escola."</br>";
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
    </head>

    <body class='bodyDisciplinaGrafico'>
        <button id="btnTable" type="submit" href='#modalAlunoSelect' class=" btnDisciplina modal-trigger  btn-flat btnLightBlue center">
            Selecionar Disciplina
        </button>
        <div id="modalAlunoSelect" class="modal" data-backdrop="static">
            <div class="modal-content">
                <div class="input-field col s12 validate">
                    <form action="graficoRendimento.html.php" method="POST">
                        <h4 class="center">Selecione a Disciplina</h4>
                        <div class="select">
                            <select name="disciplinas">
                                <option value="" disabled selected>Selecionar a Disciplina</option>
                        </div>
                        <?php
                        // Resgatando dados dos Alunos
                        $sql_select_dados_alunos = $conn->prepare("SELECT * FROM aluno WHERE RA = $ra_filho");
                        // Executando comando no banco
                        $sql_select_dados_alunos->execute();
                        // Armazenando retorno em um array com as informações
                        $aluno = $sql_select_dados_alunos->fetch(PDO::FETCH_ASSOC);
                        // variaveis de dados do aluno

                        $id_turma_aluno = $aluno['fk_id_turma_aluno'];

                        $query_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_disciplina, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor = disciplina.ID_disciplina) WHERE disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma_aluno GROUP BY  nome_disciplina");
                        // Executar
                        $query_select_disciplinas->execute();
                        // Armazenar em um array
                        while ($array_disciplinas = $query_select_disciplinas->fetch(PDO::FETCH_ASSOC)) {
                            // Armazenando o nome e o id da disciplina
                            $nome_disciplina = $array_disciplinas['nome_disciplina'];
                            $id_disciplina = $array_disciplinas['id_disciplina'];
                        ?>
                            <option value="<?php echo $id_disciplina ?>"><?php echo $nome_disciplina; ?></option>
                        <?php
                        }
                        ?>
                        </select>

                        <input type="hidden" name="id_disciplina" value="">
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