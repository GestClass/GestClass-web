<?php

require_once 'reqAluno.php';


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
                        <h5>Rendimento Escolar</h5>
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
                        <p>Envio e recebebimento de mensagens de professores, secretaria e diretores</p>
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

<section class="floating-buttons">
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large light-blue lighten-1">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a href="#modalFeedback" class="modal-trigger btn-floating light-blue lighten-2 tooltipped" data-position="left" data-tooltip="Relate um Problema"><i class="material-icons">build</i></a></li>
            <li><a href="paginaManutencao.php" class="btn-floating black tooltipped" data-position="left" data-tooltip="Gráfico de rendimento"><i class="material-icons">insert_chart</i></a></li>
            <li><a href="paginaManutencao.php" class="btn-floating yellow darken-1 tooltipped" data-position="left" data-tooltip="Notificações"><i class="material-icons">notifications_active</i></a></li>
            <li><a href="paginaManutencao.php" class="btn-floating blue-grey darken-4 tooltipped" data-position="left" data-tooltip="Boletim Escolar"><i class="material-icons">format_list_numbered_rtl</i></a></li>
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
            <form action="graficoRendimento.php" method="POST">
                <h5 class="center">Seleciona a matéria desejada para acompanhar o rendimento do seu filho:</h5>
                <select name="disciplinas">
                    <h4>Selecione o tipo de conta</h4>
                    <option value="" disabled selected>Selecione a Disciplina</option>
                    <?php
                    $id_escola = $_SESSION["id_escola"];
                    $query_select_id = $conn->prepare("SELECT ID_disciplina FROM disciplina WHERE $id_escola ORDER BY `ID_disciplina` DESC LIMIT 10 ");
                    $query_select_id->execute();

                    while ($dados_id = $query_select_id->fetch(PDO::FETCH_ASSOC)) {
                        $id_disciplina = $dados_id['ID_disciplina'];
                        $query_select_nome = $conn->prepare("SELECT nome_disciplina FROM disciplina WHERE ID_disciplina = $id_disciplina");
                        $query_select_nome->execute();
                        while ($dados_nome = $query_select_nome->fetch(PDO::FETCH_ASSOC)) {
                            $nome = $dados_nome['nome_disciplina'];

                    ?>
                            <option value="<?php echo $id_disciplina ?>"><?php echo $nome; ?></option>
                    <?php
                        }
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