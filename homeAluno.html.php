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
                        <p>Acesso as atividades desempenhadas em cada disciplina</p>
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
                <a href="gradeCurricularExibicao.html.php">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-list-alt fa-6x blue-icon"></i>
                        <h5>Grade Curricular</h5>
                        <p>Visualização da grade de horários de aulas</p>
                    </div>
                </a>
            </div>
            <?php

                $query_mensagem = $conn->prepare("SELECT *
                FROM aluno AS A 
                JOIN contato AS C ON A.RA = C.fk_recebimento_aluno_ra_aluno and A.RA = {$id_usuario} WHERE notificacao = 0 ORDER BY data_mensagem DESC;");
                $query_mensagem->execute();
                $notificacao = $query_mensagem->rowCount();


            ?>
            <div class="col s12 m4">
                <a href="mensagensAluno.html.php">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-envelope fa-6x blue-icon"></i><span class="notifi center-align"><?php echo $notificacao ?></span>
                        <h5>Mensagens</h5>
                        <p>Caixa de mensagens recebidas</p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a class="modal-trigger" href="#modalFeedback">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-headset fa-6x blue-icon"></i>
                        <h5>Feedback</h5>
                        <p>Relate problemas encontrados no sistema</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>


<section class="floating-buttons">
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large light-blue lighten-1">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a href="#modalGraficos" class="modal-trigger btn-floating gray tooltipped" data-position="left" data-tooltip="Rendimento Disciplinar"><i class="material-icons">trending_up</i></a></li>
            <li><a href="boletimVisualizacao.html.php" class="btn-floating blue-grey darken-4 tooltipped" data-position="left" data-tooltip="Boletim Escolar"><i class="material-icons">format_list_numbered</i></a></li>
            <li><a href="calendario.html.php" class="btn-floating blue tooltipped" data-position="left" data-tooltip="Calendario Escolar"><i class="material-icons">event</i></a></li>
            <li><a href="gradeCurricularExibicao.html.php" class="btn-floating brown tooltipped" data-position="left" data-tooltip="Grade Curricular"><i class="material-icons">toc</i></a></li>
            <li><a href="mensagensAluno.html.php" class="btn-floating teal lighten-4 tooltipped" data-position="left" data-tooltip="Caixa de Mensagens"><i class="material-icons">email</i></a></li>
            <li><a href="#modalFeedback" class="modal-trigger btn-floating light-blue lighten-2 tooltipped" data-position="left" data-tooltip="Relate um Problema"><i class="material-icons">support_agent</i></a></li>
            <li><a href="materialAluno.html.php" class="btn-floating indigo tooltipped" data-position="left" data-tooltip="Materiais de Apoio"><i class="material-icons">picture_as_pdf</i></a></li>
        </ul>
    </div>
</section>


<?php require_once 'reqFooter.php' ?>