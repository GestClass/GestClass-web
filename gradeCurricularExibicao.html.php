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

if ($id_tipo_usuario == 6) {
    $ra = $_POST['filhos'];
    if ($ra == null) {
        ?>
        <script>
            alert('aa');
            history.back();
        </script>
        <?php
    } 
} else {
    $ra = $id_usuario;
}

// Resgatando nome da escola
$sql_select_nome_escola = $conn->prepare("SELECT nome_escola FROM escola WHERE ID_escola = $id_escola");
$sql_select_nome_escola->execute();
// Armazenando nome da escola
$escola = $sql_select_nome_escola->fetch(PDO::FETCH_ASSOC);
// Nome da escola
$nome_escola = $escola['nome_escola'];



// Resgatando dados dos Alunos
$sql_select_dados_alunos = $conn->prepare("SELECT * FROM aluno WHERE RA = $ra");
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

?>

<div class="container col s12 m12 l12 z-depth-5 " id="container_boletimVisualizacao">
    <div class="row">
        <div class="col s12 m12 l12 ">
            <h3 class="center">Grade Curricular</h3>
            <br>
            <h5 class="center"><?php echo $nome_escola ?></h5>
            <br>
            <table class="info highlight">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>RA</th>
                        <th>Turma</th>
                        <th>Turno</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $nome_aluno; ?></td>
                        <td><?php echo $ra; ?></td>
                        <td><?php echo $nome_turma_aluno; ?></td>
                        <td><?php echo $nome_turno; ?></td>

                </tbody>
            </table>

            <ul id="tabs-swipe-demo" class="tabs blue lighten-3">
                <li class="tab col s1 m2 l2 "><a href="#segunda">Segunda</a></li>
                <li class="tab col s1 m2 l2 "><a href="#terca">Terça</a></li>
                <li class="tab col s1 m2 l2 "><a href="#quarta">Quarta</a></li>
                <li class="tab col s1 m2 l2 "><a href="#quinta">Quinta</a></li>
                <li class="tab col s1 m2 l2 "><a href="#sexta">Sexta</a></li>
                <li class="tab col s1 m2 l2 "><a href="#sabado">Sábado</a></li>
            </ul>
        </div>

        <div class="col s12 m12 l12 " id="segunda">
            <table class="info highlight striped">
                <thead>
                    <tr>
                        <th>Aula</th>
                        <th>Disciplina</th>
                        <th>Início</th>
                        <th>Término</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // Segunda-Ferira id = 2
                    $id_dia = 2;
                    $select_dados_grade_escola = $conn->prepare("SELECT disciplina.nome_disciplina AS nome_disciplina, aula_escola.nome_aula AS nome_aula, aula_escola.aula_start AS aula_start, aula_escola.aula_end AS aula_end FROM grade_curricular LEFT JOIN disciplina ON (grade_curricular.fk_id_disciplina_grade_curricular = disciplina.ID_disciplina) INNER JOIN  aula_escola ON (grade_curricular.fk_id_aula_escola_grade_curricular = aula_escola.ID_aula_escola) WHERE grade_curricular.fk_id_turma_grade_curricular = $id_turma_aluno AND fk_id_dia_semana_grade_curricular = $id_dia ORDER BY aula_start ASC");
                    $select_dados_grade_escola->execute();
                    while ($array_dados_grade = $select_dados_grade_escola->fetch(PDO::FETCH_ASSOC)) {
                        $nome_disciplina = $array_dados_grade['nome_disciplina'];
                        $nome_aula = $array_dados_grade['nome_aula'];
                        $aula_start = $array_dados_grade['aula_start'];
                        $aula_end = $array_dados_grade['aula_end'];

                        if ($nome_disciplina == null) {
                            $nome_disciplina = '&nbsp;&nbsp;&nbsp;&nbsp;-';
                        }
                    ?>
                        <tr>
                            <td><?php echo $nome_aula; ?></td>
                            <td><?php echo $nome_disciplina; ?></td>
                            <td><?php echo $aula_start; ?></td>
                            <td><?php echo $aula_end; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="col s12 m12 l12" id="terca">
            <table class="info highlight striped">
                <thead>
                    <tr>
                        <th>Aula</th>
                        <th>Disciplina</th>
                        <th>Início</th>
                        <th>Término</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // Terça-Ferira id = 3
                    $id_dia = 3;
                    $select_dados_grade_escola = $conn->prepare("SELECT disciplina.nome_disciplina AS nome_disciplina, aula_escola.nome_aula AS nome_aula, aula_escola.aula_start AS aula_start, aula_escola.aula_end AS aula_end FROM grade_curricular LEFT JOIN disciplina ON (grade_curricular.fk_id_disciplina_grade_curricular = disciplina.ID_disciplina) INNER JOIN  aula_escola ON (grade_curricular.fk_id_aula_escola_grade_curricular = aula_escola.ID_aula_escola) WHERE grade_curricular.fk_id_turma_grade_curricular = $id_turma_aluno AND fk_id_dia_semana_grade_curricular = $id_dia ORDER BY aula_start ASC");
                    $select_dados_grade_escola->execute();
                    while ($array_dados_grade = $select_dados_grade_escola->fetch(PDO::FETCH_ASSOC)) {
                        $nome_disciplina = $array_dados_grade['nome_disciplina'];
                        $nome_aula = $array_dados_grade['nome_aula'];
                        $aula_start = $array_dados_grade['aula_start'];
                        $aula_end = $array_dados_grade['aula_end'];

                        if ($nome_disciplina == null) {
                            $nome_disciplina = '&nbsp;&nbsp;&nbsp;&nbsp;-';
                        }
                    ?>
                        <tr>
                            <td><?php echo $nome_aula; ?></td>
                            <td><?php echo $nome_disciplina; ?></td>
                            <td><?php echo $aula_start; ?></td>
                            <td><?php echo $aula_end; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="col s12 m12 l12" id="quarta">
        <table class="info highlight striped">
                <thead>
                    <tr>
                        <th>Aula</th>
                        <th>Disciplina</th>
                        <th>Início</th>
                        <th>Término</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // Quarta-Ferira id = 4
                    $id_dia = 4;
                    $select_dados_grade_escola = $conn->prepare("SELECT disciplina.nome_disciplina AS nome_disciplina, aula_escola.nome_aula AS nome_aula, aula_escola.aula_start AS aula_start, aula_escola.aula_end AS aula_end FROM grade_curricular LEFT JOIN disciplina ON (grade_curricular.fk_id_disciplina_grade_curricular = disciplina.ID_disciplina) INNER JOIN  aula_escola ON (grade_curricular.fk_id_aula_escola_grade_curricular = aula_escola.ID_aula_escola) WHERE grade_curricular.fk_id_turma_grade_curricular = $id_turma_aluno AND fk_id_dia_semana_grade_curricular = $id_dia ORDER BY aula_start ASC");
                    $select_dados_grade_escola->execute();
                    while ($array_dados_grade = $select_dados_grade_escola->fetch(PDO::FETCH_ASSOC)) {
                        $nome_disciplina = $array_dados_grade['nome_disciplina'];
                        $nome_aula = $array_dados_grade['nome_aula'];
                        $aula_start = $array_dados_grade['aula_start'];
                        $aula_end = $array_dados_grade['aula_end'];

                        if ($nome_disciplina == null) {
                            $nome_disciplina = '&nbsp;&nbsp;&nbsp;&nbsp;-';
                        }
                    ?>
                        <tr>
                            <td><?php echo $nome_aula; ?></td>
                            <td><?php echo $nome_disciplina; ?></td>
                            <td><?php echo $aula_start; ?></td>
                            <td><?php echo $aula_end; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="col s12 m12 l12" id="quinta">
        <table class="info highlight striped">
                <thead>
                    <tr>
                        <th>Aula</th>
                        <th>Disciplina</th>
                        <th>Início</th>
                        <th>Término</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // Quinta-Ferira id = 5
                    $id_dia = 5;
                    $select_dados_grade_escola = $conn->prepare("SELECT disciplina.nome_disciplina AS nome_disciplina, aula_escola.nome_aula AS nome_aula, aula_escola.aula_start AS aula_start, aula_escola.aula_end AS aula_end FROM grade_curricular LEFT JOIN disciplina ON (grade_curricular.fk_id_disciplina_grade_curricular = disciplina.ID_disciplina) INNER JOIN  aula_escola ON (grade_curricular.fk_id_aula_escola_grade_curricular = aula_escola.ID_aula_escola) WHERE grade_curricular.fk_id_turma_grade_curricular = $id_turma_aluno AND fk_id_dia_semana_grade_curricular = $id_dia ORDER BY aula_start ASC");
                    $select_dados_grade_escola->execute();
                    while ($array_dados_grade = $select_dados_grade_escola->fetch(PDO::FETCH_ASSOC)) {
                        $nome_disciplina = $array_dados_grade['nome_disciplina'];
                        $nome_aula = $array_dados_grade['nome_aula'];
                        $aula_start = $array_dados_grade['aula_start'];
                        $aula_end = $array_dados_grade['aula_end'];

                        if ($nome_disciplina == null) {
                            $nome_disciplina = '&nbsp;&nbsp;&nbsp;&nbsp;-';
                        }
                    ?>
                        <tr>
                            <td><?php echo $nome_aula; ?></td>
                            <td><?php echo $nome_disciplina; ?></td>
                            <td><?php echo $aula_start; ?></td>
                            <td><?php echo $aula_end; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="col s12 m12 l12 " id="sexta">
        <table class="info highlight striped">
                <thead>
                    <tr>
                        <th>Aula</th>
                        <th>Disciplina</th>
                        <th>Início</th>
                        <th>Término</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // Sexta-Ferira id = 6
                    $id_dia = 6;
                    $select_dados_grade_escola = $conn->prepare("SELECT disciplina.nome_disciplina AS nome_disciplina, aula_escola.nome_aula AS nome_aula, aula_escola.aula_start AS aula_start, aula_escola.aula_end AS aula_end FROM grade_curricular LEFT JOIN disciplina ON (grade_curricular.fk_id_disciplina_grade_curricular = disciplina.ID_disciplina) INNER JOIN  aula_escola ON (grade_curricular.fk_id_aula_escola_grade_curricular = aula_escola.ID_aula_escola) WHERE grade_curricular.fk_id_turma_grade_curricular = $id_turma_aluno AND fk_id_dia_semana_grade_curricular = $id_dia ORDER BY aula_start ASC");
                    $select_dados_grade_escola->execute();
                    while ($array_dados_grade = $select_dados_grade_escola->fetch(PDO::FETCH_ASSOC)) {
                        $nome_disciplina = $array_dados_grade['nome_disciplina'];
                        $nome_aula = $array_dados_grade['nome_aula'];
                        $aula_start = $array_dados_grade['aula_start'];
                        $aula_end = $array_dados_grade['aula_end'];

                        if ($nome_disciplina == null) {
                            $nome_disciplina = '&nbsp;&nbsp;&nbsp;&nbsp;-';
                        }
                    ?>
                        <tr>
                            <td><?php echo $nome_aula; ?></td>
                            <td><?php echo $nome_disciplina; ?></td>
                            <td><?php echo $aula_start; ?></td>
                            <td><?php echo $aula_end; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="col s12 m12 l12 " id="sabado">
        <table class="info highlight striped">
                <thead>
                    <tr>
                        <th>Aula</th>
                        <th>Disciplina</th>
                        <th>Início</th>
                        <th>Término</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // Sabádo id = 7
                    $id_dia = 7;
                    $select_dados_grade_escola = $conn->prepare("SELECT disciplina.nome_disciplina AS nome_disciplina, aula_escola.nome_aula AS nome_aula, aula_escola.aula_start AS aula_start, aula_escola.aula_end AS aula_end FROM grade_curricular LEFT JOIN disciplina ON (grade_curricular.fk_id_disciplina_grade_curricular = disciplina.ID_disciplina) INNER JOIN  aula_escola ON (grade_curricular.fk_id_aula_escola_grade_curricular = aula_escola.ID_aula_escola) WHERE grade_curricular.fk_id_turma_grade_curricular = $id_turma_aluno AND fk_id_dia_semana_grade_curricular = $id_dia ORDER BY aula_start ASC");
                    $select_dados_grade_escola->execute();
                    while ($array_dados_grade = $select_dados_grade_escola->fetch(PDO::FETCH_ASSOC)) {
                        $nome_disciplina = $array_dados_grade['nome_disciplina'];
                        $nome_aula = $array_dados_grade['nome_aula'];
                        $aula_start = $array_dados_grade['aula_start'];
                        $aula_end = $array_dados_grade['aula_end'];

                        if ($nome_disciplina == null) {
                            $nome_disciplina = '&nbsp;&nbsp;&nbsp;&nbsp;-';
                        }
                    ?>
                        <tr>
                            <td><?php echo $nome_aula; ?></td>
                            <td><?php echo $nome_disciplina; ?></td>
                            <td><?php echo $aula_start; ?></td>
                            <td><?php echo $aula_end; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<script src="js/default.js"></script>
<script src="js/boletimVisualizacao.js"></script>

<?php require_once 'reqFooter.php' ?>