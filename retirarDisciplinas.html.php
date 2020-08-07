<!DOCTYPE html>

<head>
    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />
</head>

<body class="body_estilizado">
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
    }
        $id_professor = $_GET['id'];
        

        $select_professor = $conn->prepare("SELECT nome_professor FROM professor WHERE ID_professor = $id_professor");
        $select_professor->execute();
        $array_professor = $select_professor->fetch(PDO::FETCH_ASSOC);
        $nome_professor = $array_professor['nome_professor'];

    ?>

        <div class="container col s12 m12 l12" id="container_boletimCadastro">
            <h3 class="center">Disciplinas lecionadas</h3>
            <br>
            <hr>
            <h5 class="center">Professor: <?php echo $nome_professor ?></h5>
            <br>
            <hr><br><br>

            <table class="striped centered">
                <thead>
                    <th>
                        Máteria
                    </th>
                    <th>
                        Turma
                    </th>
                    <th>
                        Dia
                    </th>
                    <th>
                        Horário Início
                    </th>
                    <th>
                        Horário Termino
                    </th>
                </thead>
                <tbody><?php

                    $query_turmas_professor = $conn->prepare("SELECT * FROM turmas_professor WHERE fk_id_professor_turmas_professor = $id_professor ");
                    $query_turmas_professor->execute();

                    if ($query_turmas_professor->rowCount()) {
                        while ($turmas_professor = $query_turmas_professor->fetch(PDO::FETCH_ASSOC)) {
                            $id_turma_professor = $turmas_professor['fk_id_turma_professor_turmas_professor'];
                    
                            $query_materias = $conn->prepare("SELECT grade_curricular.ID_grade_curricular AS id_disciplina, disciplina.nome_disciplina AS nome_disciplina, dia_semana.nome_dia AS dia_semana, aula_escola.aula_start AS horario_inicio, aula_escola.aula_end AS horario_termino, turma.nome_turma  FROM grade_curricular LEFT JOIN disciplina ON (grade_curricular.fk_id_disciplina_grade_curricular = disciplina.ID_disciplina) INNER JOIN dia_semana ON (grade_curricular.fk_id_dia_semana_grade_curricular = dia_semana.ID_dia_semana) INNER JOIN  aula_escola ON (grade_curricular.fk_id_aula_escola_grade_curricular = aula_escola.ID_aula_escola) LEFT JOIN turma ON (grade_curricular.fk_id_turma_grade_curricular = turma.ID_turma) WHERE grade_curricular.fk_id_turma_grade_curricular = $id_turma_professor AND aula_escola.ID_aula_escola != 4");
                            $query_materias->execute();

                        
                            while ($materias = $query_materias->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                            <tr>
                                <td>
                                    <?php echo $materias['nome_disciplina']; ?>
                                </td>

                                <td>
                                    <?php echo $materias['nome_turma']; ?>
                                </td>

                                <td>
                                    <?php echo $materias['dia_semana']; ?>
                                </td>

                                <td>
                                    <?php echo $materias['horario_inicio']; ?>
                                </td>
                                <td>
                                    <?php echo $materias['horario_termino']; ?>
                                    
                                </td>
                                <td>
                                    <form action="php/deleteUsuarios/deletarAtribuicao.php" method="POST">
                                    <input type="hidden" name="id_disciplina" value="<?php echo $materias['id_disciplina']; ?>">
                                    <input type="hidden" name="id_professor" value="<?php echo $id_professor; ?>">
                                        <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                            <i class="material-icons left">delete</i>Desativar
                                        </button>
                                    </form>
                                </td>
                            </tr>


                        <?php
                            }
                        }
                    }
                    
                         else {
                             ?>
                        <script>
                            alert('Nenhuma Máteria Encontrada')
                            history.back()
                        </script>
                    <?php
                         }
                        
                    
                    ?>
                </tbody>
            </table>
        </div>