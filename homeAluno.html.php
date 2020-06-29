<?php

require_once 'reqAluno.php';
$id_usuario = $_SESSION["id_usuario"];

// echo "id usuario ->".$id_usuario."</br>";
// echo "id tipo usuario ->".$id_tipo_usuario."</br>";
// echo "id escola ->".$id_escola."</br>";
?>

<section class="section center">
    <div class="container">
        <div class="row">
            <div class="col s12 m4">
                <a class="modal-trigger" href="#modalGraficos">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-chart-line fa-6x blue-icon"></i>
                        <h5>Rendimento Disciplinar</h5>
                        <p>Acesso presença do aluno, atividades desempenhadas e gráficos de rendimentos .</p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a href="boletimVisualizacao.html.php">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-list-ol fa-6x blue-icon"></i>
                        <h5>Boletim Escolar</h5>
                        <p>Acesso a notas </p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a href="calendario.html.php">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-calendar-check fa-6x blue-icon"></i>
                        <h5>Calendário Escolar</h5>
                        <p>Calendário de atividades acadêmicas</p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a href="paginaManutencao.php">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-list-alt fa-6x blue-icon"></i>
                        <h5>Grade Escolar</h5>
                        <p>Visualização dos horários de aulas, nome dos professores, lista de chamada</p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a href="mensagensAluno.html.php">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-envelope fa-6x blue-icon"></i>
                        <h5>Mensagens</h5>
                        <p>Recebebimento de mensagens de professores, secretaria e diretores</p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a href="paginaManutencao.php">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-bell fa-6x blue-icon"></i>
                        <h5>Notificações</h5>
                        <p>Recebimento de notificações, como a dispensa antes do horário, advertências, ocorrências,
                            suspensões, etc..</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<?php

$query_mensagem = $conn->prepare("SELECT *
FROM aluno AS A 
JOIN contato AS C ON A.RA = C.fk_recebimento_aluno_id_aluno and A.RA = {$id_usuario} WHERE notificacao = 0 ORDER BY data_mensagem DESC;");
$query_mensagem->execute();
$notificacao = $query_mensagem->rowCount();

?>

<section class="floating-buttons">
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large light-blue lighten-1">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a href="#modalFeedback" class="modal-trigger btn-floating light-blue lighten-2 tooltipped" data-position="left" data-tooltip="Relate um Problema"><i class="material-icons">support_agent</i></a></li>
            <li><a href="graficoRendimento.html.php" class="btn-floating gray tooltipped" data-position="left" data-tooltip="Rendimento Disciplinar"><i class="material-icons">insert_chart</i></a></li>
            <li><a href="gradeCurricularExibicao.html.php" class="btn-floating brown tooltipped" data-position="left" data-tooltip="Grade Curricular"><i class="material-icons">toc</i></a></li>
            <li><a href="mensagensAluno.html.php" class="btn-floating teal lighten-4 tooltipped" data-position="left" data-tooltip="Caixa de Mensagens"><i class="material-icons">email</i></a><?php echo $notificacao?></li>
            <li><a href="boletimVisualizacao.html.php" class="btn-floating blue-grey darken-4 tooltipped" data-position="left" data-tooltip="Boletim Escolar"><i class="material-icons">format_list_numbered</i></a></li>
            <li><a href="calendario.html.php" class="btn-floating blue tooltipped" data-position="left" data-tooltip="Calendario Escolar"><i class="material-icons">event</i></a></li>
        </ul>
    </div>
</section>

<div id="modalFeedback" class="modal">
    <div class="modal-content">
        <h4>Digite o Problema que occoreu</h4><br>
        <div id="novaMensagem">
            <form action="php/enviarMensagem/enviarFeedback.php" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem" class="materialize-textarea"></textarea>
                        <label id="lbl" for="textarea1">Digite a sua Mensagem</label>
                    </div>
                </div>
                <div class="input-field right">
                    <button btn="btncadastrar" value="formMensagem" id="formMensagem" type="submit" class="btn-flat btnLightBlue"><i class="material-icons">send</i> Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="modalGraficos" class="modal ">
    <div class="modal-content">
        <h4 class="center"><i class="material-icons right">school</i>Rendimento Escolar</h4>
        <div class="input-field col s12 validate">
            <form action="graficoRendimento.html.php" method="POST">
                <h5 class="center">Seleciona a matéria desejada para acompanhar o rendimento:</h5>
                <select name="disciplinas">
                <?php
                     // Selecionar a turma do aluno
                    $sql_select_id_turma = $conn->prepare("SELECT fk_id_turma_aluno FROM aluno WHERE RA = $id_usuario");
                    // Executando
                    $sql_select_id_turma->execute();
                    // Armazenando array da informação
                    $array_turma = $sql_select_id_turma->fetch(PDO::FETCH_ASSOC);
                    // Armazenar ID turma
                    $id_turma = $array_turma['fk_id_turma_aluno'];

                    // Resgatando a turma do aluno
                    $sql_select_turma_aluno = $conn->prepare("SELECT nome_turma, fk_id_turno_turma FROM turma WHERE ID_turma = $id_turma");
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
                    $query_select_disciplinas = $conn->prepare("SELECT disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor AS id_disciplina, disciplina.nome_disciplina AS nome_disciplina FROM disciplinas_professor INNER JOIN disciplina ON (disciplinas_professor.fk_id_disciplina_professor_disciplinas_professor = disciplina.ID_disciplina) WHERE disciplinas_professor.fk_id_turma_professor_disciplinas_professor = $id_turma");
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


                <input type="hidden" name="id_disciplina" value="<?php $id_disciplina ?>" />
                <div class="center">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">check</i>Acessar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require_once 'reqFooter.php' ?>