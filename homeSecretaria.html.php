<?php

require_once 'reqHeader.php';

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
                <a class="modal-trigger" href="#modalListaFuncionarios">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-chalkboard-teacher fa-6x blue-icon"></i>
                        <h5>Funcionários</h5>
                        <p>Lista de funcionários e acesso aos dados dos mesmos</p>
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
            <p>Envio de boletos para Pais e Responsáveis</p>
          </div>
        </a>
      </div>
      <div class="col s12 m4">
        <a href="cadastroTurmas.html.php">
          <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
            <i class="fas fa-book fa-6x blue-icon"></i>
            <h5>Cadastro de Turmas</h5>
            <p>Cadastro de novas Turmas pertencentes a escola</p>
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
FROM responsavel AS R 
JOIN contato AS C ON R.id_responsavel = C.fk_recebimento_responsavel_id_responsavel and R.id_responsavel = {$id_usuario} WHERE notificacao = 0 ORDER BY data_mensagem DESC;");
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
      <li><a href="#modalGradeCurricular" class="modal-trigger btn-floating brown accent-2 tooltipped" data-position="left" data-tooltip="Atribuir grade curricular de turmas"><i class="material-icons">toc</i></a></li>
      <li><a href="#modalHorarioAulas" class="modal-trigger btn-floating grey tooltipped" data-position="left" data-tooltip="Cadastro Horário Aulas"><i class="material-icons">access_time</i></a></li>
      <li><a href="atribuicaoDisciplinas.html.php" class="btn-floating green tooltipped" data-position="left" data-tooltip="Atribuição de turmas e disciplinas"><i class="material-icons">import_contacts</i></a></li>
      <li><a href="mensagensSecretaria.html.php" class="btn-floating teal lighten-4 tooltipped" data-position="left" data-tooltip="Caixa de Mensagens"><i class="material-icons">email</i></a><?php echo $notificacao ?></li>
    </ul>
  </div>
</section>
    
<?php require_once 'reqFooter.php' ?>