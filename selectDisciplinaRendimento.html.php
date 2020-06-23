<?php

include_once 'php/conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];
$ra_filho=$_POST['filhos'];
$_SESSION['RA_filho']=$ra_filho;
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
    <button id="btnTable" type="submit" href='#modalFilhosPuts' class=" btnDisciplina modal-trigger  btn-flat btnLightBlue center">
         Selecionar Disciplina
      </button>
        <div id="modalFilhosPuts" class="modal" data-backdrop="static">
        <div class="modal-content">
            <div class="input-field col s12 validate">
            <form action="graficoRendimento.html.php"  method="POST">
                    <h5 class="center">Seleciona a matéria desejada para acompanhar o rendimento:</h5>
                    <div class='select'>
                    <select name="disciplinas">
                        <option value="" disabled selected>Selecione a Disciplina</option>
                        </div>
                        <?php
                    // Resgatando dados dos Alunos
                        $sql_select_dados_alunos = $conn->prepare("SELECT * FROM aluno WHERE RA = $ra_filho");
                        // Executando comando no banco
                        $sql_select_dados_alunos->execute();
                        // Armazenando retorno em um array com as informações
                        $aluno = $sql_select_dados_alunos->fetch(PDO::FETCH_ASSOC);
                        // variaveis de dados do aluno
                        $nome_aluno = $aluno['nome_aluno'];
                        $id_turma_aluno = $aluno['fk_id_turma_aluno'];


                    
                        // Resgatando a turma do aluno
                        $sql_select_turma_aluno = $conn->prepare("SELECT nome_turma, fk_id_turno_turma FROM turma WHERE ID_turma = $id_turma_aluno");
                        // Executando comando 
                        $sql_select_turma_aluno->execute();
                        // Armazenando nome da turma
                        $turma_array = $sql_select_turma_aluno->fetch(PDO::FETCH_ASSOC);
                        // Variável nome turma
                        $nome_turma_aluno = $turma_array['nome_turma'];
                        $id_turno = $turma_array['fk_id_turno_turma'];


                    
                        // Resgatar nome do turno
                        $sql_select_nome_turno = $conn->prepare("SELECT nome_turno FROM turno WHERE ID_turno = $id_turno");
                        // Executando o comando
                        $sql_select_nome_turno->execute();
                        // Armazenando nome do turno
                        $turno = $sql_select_nome_turno->fetch(PDO::FETCH_ASSOC);
                        // Armazenando o nome em variável
                        $nome_turno = $turno['nome_turno'];
                        $_SESSION['nome_turno']=$nome_turno;
                        $query_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_disciplina, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor = disciplina.ID_disciplina) WHERE disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma_aluno");
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
                    <div class="button">
                    <button id="btnTableChamada" type="submit" class=" btn-flat btnLightBlue ">
                        Pesquisar
                    </button>
                    </div>
                    </form>
            </div>
        </div>
        </div>


<?php require_once 'reqFooter.php' ?>