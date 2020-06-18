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
                <a href="graficoRendimentoDiretor.html.php">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-chart-line fa-6x blue-icon"></i>
                        <h5>Gráfico de Rendimento</h5>
                        <p>Acesso aos dados de desempenho das turmas por bimestre.</p>
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
                <a href="listarProfessores.html.php">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-chalkboard-teacher fa-6x blue-icon"></i>
                        <h5>Professores</h5>
                        <p>Acesso total a dados dos professores, atribuição de classes, alterações de dados, etc</p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a class="modal-trigger" href="#modalListaAlunos">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-list-alt fa-6x blue-icon"></i>
                        <h5>Listas de alunos</h5>
                        <p>Visualização das listas de alunos</p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a class="modal-trigger" href="#modalCadastroContas">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-address-book fa-6x blue-icon"></i>
                        <h5>Cadastro de contas</h5>
                        <p>Cadastro de novas contas ao aplicativo e remoção das mesmas, cadastro de novas contas de
                            nível igual ou
                            inferior</p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a href="perfil.html.php">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-cog fa-6x blue-icon"></i>
                        <h5>Configurações</h5>
                        <p>Configurações da conta</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div id="modalCadastroContas" class="modal">
        <div class="modal-content">
            <h4 class="center">Selecione o tipo de conta</h4>
            <div class="input-field col s12">
                <select id="selectConta" onchange="habilitaForm()">
                    <option value="" disabled selected>Contas</option>
                    <option value="1">Responsável/Aluno</option>
                    <option value="2">Aluno</option>
                    <option value="3">Professor</option>
                    <option value="4">Secretaria</option>
                </select>
            </div>
        </div>
    </div>

    <div id="modalAlterarTurmas" class="modal">
        <div class="modal-content">
            <h4 class="center">Selecione a turma para alterar</h4>
            <div class="input-field col s12">
                <form action="alteracaoTurmas.html.php" method="POST">
                    <select name='turma'>
                        <option value="" disabled selected>Turmas</option>
                        <?php $query_turmas = $conn->prepare('SELECT * FROM turma WHERE fk_id_escola_turma = ' . $id_escola . '');
                        $query_turmas->execute();
                        while ($dados_turmas = $query_turmas->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $dados_turmas['ID_turma'] ?>"><?php echo $dados_turmas['nome_turma'] ?>
                            </option><?php

                                    } ?>

                    </select>
                    <br><br><br><br><br>

                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">search</i>Pesquisar
                    </button>

                </form>
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
            <li><a href="#modalAlterarTurmas" class="modal-trigger btn-floating indigo accent-2 tooltipped" data-position="left" data-tooltip="Alterar turma dos alunos"><i class="material-icons">create</i></a></li>
            <li><a href="cadastroDatasFinaisBimestres.html.php" class="btn-floating gray tooltipped" data-position="left" data-tooltip="Atribuir datas de final de bimestre"><i class="material-icons">event_available</i></a></li>
            <li><a href="atribuicaoDisciplinas.html.php" class="btn-floating green tooltipped" data-position="left" data-tooltip="Atribuição de turmas e disciplinas"><i class="material-icons">import_contacts</i></a>
            </li>
            <li><a href="cadastroTurmas.html.php" class="btn-floating red tooltipped" data-position="left" data-tooltip="Cadastrar Turmas"><i class="material-icons">book</i></a></li>
            <li><a href="paginaManutencao.php" class="btn-floating yellow darken-1 tooltipped" data-position="left" data-tooltip="Notificações"><i class="material-icons">notifications_active</i></a></li>
            <li><a href="mensagensDiretor.html.php" class="btn-floating teal lighten-4 tooltipped" data-position="left" data-tooltip="Caixa de Mensagens"><i class="material-icons">email</i></a></li>
            <li><a href="calendario.html.php" class="btn-floating blue tooltipped" data-position="left" data-tooltip="Calendario Escolar"><i class="material-icons">event</i></a></li>
        </ul>
    </div>
</section>

<div id="modalListaAlunos" class="modal">
    <div class="modal-content">
        <h4>Selecione a turma</h4>
        <div class="input-field col s12">
            <form action="listaAlunos.html.php" method="POST">
                <select name="turmas">
                    <option value="" disabled selected>Selecione a Turma</option>
                    <?php

                    $query_select_id_turma = $conn->prepare("SELECT ID_turma FROM turma WHERE $id_escola");
                    $query_select_id_turma->execute();

                    while ($dados_turma_id = $query_select_id_turma->fetch(PDO::FETCH_ASSOC)) {
                        $id_turma = $dados_turma_id['ID_turma'];

                        $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
                        $query_select_turma->execute();

                        while ($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                            $nome_turma = $dados_turma_nome['nome_turma'];

                            $query_turno = $conn->prepare("SELECT fk_id_turno_turma FROM turma WHERE ID_turma = $id_turma");
                            $query_turno->execute();

                            while ($dados_turno = $query_turno->fetch(PDO::FETCH_ASSOC)) {
                                $id_turno = $dados_turno['fk_id_turno_turma'];

                                $query_turno_nome = $conn->prepare("SELECT nome_turno FROM turno WHERE ID_turno = $id_turno");
                                $query_turno_nome->execute();

                                while ($dados_nome_turno = $query_turno_nome->fetch(PDO::FETCH_ASSOC)) {
                                    $nome_turno = $dados_nome_turno['nome_turno'];

                    ?>
                                    <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?></option>
                    <?php
                                }
                            }
                        }
                    }
                    ?>
                </select>
                <br>
                <div class="center">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">search</i>Pesquisar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modalMensalidades" class="modal">
    <div class="modal-content">
        <h4>Selecione a turma</h4>
        <div class="input-field col s12">
            <form action="mensalidades.html.php" method="POST">
                <select name="turmas">
                    <option value="" disabled selected>Selecione a Turma</option>
                    <?php

                    $query_select_id_turma = $conn->prepare("SELECT ID_turma FROM turma WHERE $id_escola");
                    $query_select_id_turma->execute();

                    while ($dados_turma_id = $query_select_id_turma->fetch(PDO::FETCH_ASSOC)) {
                        $id_turma = $dados_turma_id['ID_turma'];

                        $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
                        $query_select_turma->execute();

                        while ($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                            $nome_turma = $dados_turma_nome['nome_turma'];

                            $query_turno = $conn->prepare("SELECT fk_id_turno_turma FROM turma WHERE ID_turma = $id_turma");
                            $query_turno->execute();

                            while ($dados_turno = $query_turno->fetch(PDO::FETCH_ASSOC)) {
                                $id_turno = $dados_turno['fk_id_turno_turma'];

                                $query_turno_nome = $conn->prepare("SELECT nome_turno FROM turno WHERE ID_turno = $id_turno");
                                $query_turno_nome->execute();

                                while ($dados_nome_turno = $query_turno_nome->fetch(PDO::FETCH_ASSOC)) {
                                    $nome_turno = $dados_nome_turno['nome_turno'];

                    ?>
                                    <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?></option>
                    <?php
                                }
                            }
                        }
                    }
                    ?>
                </select>
                <br>
                <div class="center">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">search</i>Pesquisar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#modalCadastroContas').on('shown.bs.modal', function() {
        $(window).trigger('resize');
    });
</script>
<?php require_once 'reqFooter.php' ?>