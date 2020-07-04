<?php

require_once 'reqDiretor.php';

$id_escola = $_SESSION["id_escola"];


// echo "id usuario ->".$id_usuario."</br>";
// echo "id tipo usuario ->".$id_tipo_usuario."</br>";
// echo "id escola ->".$id_escola."</br>";

?>

<section class="section center">
    <div class="container">
        <div class="row">
            <div class="col s12 m4">
                <a class="modal-trigger" href="#modalCadastroContas">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-address-book fa-6x blue-icon"></i>
                        <h5>Cadastro de contas</h5>
                        <p>Cadastro de novas contas de nível igual ou inferior</p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a href="listarProfessores.html.php">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-chalkboard-teacher fa-6x blue-icon"></i>
                        <h5>Professores</h5>
                        <p>Lista de professores e acesso aos dados dos mesmos</p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a class="modal-trigger" href="#modalListaAlunos">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-list-alt fa-6x blue-icon"></i>
                        <h5>Listas de alunos</h5>
                        <p>Visualização das listas de alunos e acesso aos dados dos mesmos</p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a class="modal-trigger" href="#modalMensalidades">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-file-invoice-dollar fa-6x blue-icon"></i>
                        <h5>Mensalidade</h5>
                        <p>Acesso total aos dados da mensalidade dos alunos. </p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a class="modal-trigger" href="#modalTurmas">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-chart-line fa-6x blue-icon"></i>
                        <h5>Rendimento Disciplinar</h5>
                        <p>Acesso aos dados de desempenho das turmas por bimestre.</p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a href="calendario.html.php">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-calendar-check fa-6x blue-icon"></i>
                        <h5>Calendário Escolar</h5>
                        <p>Adesão, remoção e alteração de atividades no calendário</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<?php

$query_mensagem = $conn->prepare("SELECT *
FROM diretor AS D 
JOIN contato AS C ON D.id_diretor = C.fk_recebimento_diretor_id_diretor and D.id_diretor = {$id_usuario} WHERE notificacao = 0 ORDER BY data_mensagem DESC;");
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
            <li><a href="#modalAlterarTurmas" class="modal-trigger btn-floating indigo accent-2 tooltipped" data-position="left" data-tooltip="Alterar turma dos alunos"><i class="material-icons">create</i></a></li>
            <li><a href="#modalAlterarHorario" class="modal-trigger btn-floating red darken-3 tooltipped" data-position="left" data-tooltip="Alterar Padrão de Horários de Aulas"><i class="material-icons">access_time</i></a></li>
            <li><a href="#modalHorarioAulas" class="modal-trigger btn-floating grey tooltipped" data-position="left" data-tooltip="Cadastro de Padrões de Horários Aulas"><i class="material-icons">access_time</i></a></li>
            <li><a href="#modalGradeCurricular" class="modal-trigger btn-floating brown accent-2 tooltipped" data-position="left" data-tooltip="Atribuir Grade Curricular para Turmas"><i class="material-icons">toc</i></a></li>
            <li><a href="atribuicaoDisciplinas.html.php" class="btn-floating green tooltipped" data-position="left" data-tooltip="Atribuição de Disciplinas para Turma"><i class="material-icons">import_contacts</i></a></li>
            <li><a href="cadastroTurmas.html.php" class="btn-floating red tooltipped" data-position="left" data-tooltip="Cadastrar Turmas"><i class="material-icons">book</i></a></li>
            <li><a href="cadastroDatasFinaisBimestres.html.php" class="btn-floating tooltipped" data-position="left" data-tooltip="Atribuir Datas de Final de Bimestre"><i class="material-icons">event_available</i></a></li>
            <li><span class="notifi center-align"><?php echo $notificacao ?></span><a href="mensagensDiretor.html.php" class="btn-floating teal lighten-4 tooltipped" data-position="left" data-tooltip="Caixa de Mensagens"><i class="material-icons">email</i></a></li>
        </ul>
    </div>
</section>

<!-- <script>
    $('#modalCadastroContas').on('shown.bs.modal', function() {
        $(window).trigger('resize');
    });
</script> -->
<?php require_once 'reqFooter.php' ?>