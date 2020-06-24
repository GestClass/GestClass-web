<?php

require_once 'reqPais.php';
include_once 'php/conexao.php';

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];


// echo "id usuario ->".$id_usuario."</br>";
// echo "id tipo usuario ->".$id_tipo_usuario."</br>";
// echo "id escola ->".$id_escola."</br>";
?>
<section class="section center">
    <div class="container">
        <div class="row">
            <div class="col s12 m4">
                <a class="modal-trigger" href="#modalFilhosGrafico">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-chart-line fa-6x blue-icon"></i>
                        <h5>Rendimento Escolar</h5>
                        <p>Acesso a frequência do aluno, atividades desempenhadas e gráficos de rendimentos .</p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a class="modal-trigger" href="#modalFilhos">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-list-ol fa-6x blue-icon"></i>
                        <h5>Boletim Escolar</h5>
                        <p>Visualização de notas do aluno</p>
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
                <a href="emissaoBoletos.html.php">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-file-invoice-dollar fa-6x blue-icon"></i>
                        <h5>Financeiro</h5>
                        <p>Emissão de segunda via de boleto</p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a class="modal-trigger" href="#modalChat">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-comment-dots fa-6x blue-icon"></i>
                        <h5>Mensagens</h5>
                        <p>Envio e recebebimento de mensagens de professores, secretaria e diretores</p>
                    </div>
                </a>
            </div>
            <div class="col s12 m4">
                <a class="modal-trigger" href="#modalNotif">
                    <div class="card-panel z-depth-3 cardZoom grey-text text-darken-4 hoverable">
                        <i class="fas fa-bell fa-6x blue-icon"></i>
                        <h5>Notificações</h5>
                        <p>Central de notificações</p>
                    </div>
                </a>
            </div>
        </div>

    </div>

    <div id="modalCadastroContas" class="modal">
        <div class="modal-content">
            <h4>Selecione o tipo de conta</h4>
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
</section>
<div id="modalChat" class="modal ">
    <div class="modal-content">
        <h4 class="center"> <i class="material-icons right">vpn_key</i>Validação de Segurança</h4>
        <div class="input-field col s12 validate">
            <form action="php/pinNotif.php" method="POST">
                <input placeholder="Digite o seu pin de acesso" id="first_name" name="pin" value="pin" type="password" data-mask="000000" class="validate" />
                <div class="center">
                    <a class="btn-flat btnLightBlue1 centerr" href="#modalPin">Esqueceu o PIN?</a>
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">verified_user</i>Entrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="modalNotif" class="modal ">
    <div class="modal-content">
        <h4 class="center"> <i class="material-icons right">vpn_key</i>Validação de Segurança</h4>
        <div class="input-field col s12 validate">
            <form action="php/pinChat.php" method="POST">
                <input placeholder="Digite o seu pin de acesso" id="first_name" name="pin" value="pin" type="number" class="validate" />
                <div class="center">
                    <a class="btn-flat btnLightBlue1 centerr" href="#modalPin">Esqueceu o PIN?</a>
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">verified_user</i>Entrar
                    </button>
                </div>


            </form>
        </div>
    </div>
</div>
<div id="modalPin" class="modal ">
    <div class="modal-content">
        <h4 class="center"><i class="material-icons right">vpn_key</i>Esqueceu o seu PIN?</h4>
        <div class="input-field col s12 validate">
            <form action="php/esqPin.php" method="POST">
                <h5 class="center">Não se preocupe, estamos aqui para te ajudar! Digite o seu email para recupera-lo:
                </h5>
                <input placeholder="Digite o seu email" id="first_name" name="email" type="text" class="validate" />
                <input type="hidden" name="recuperarPin" value="Recuperar Pin" />
                <button class="btn waves-effect blue lighten-1" type="Enviar" name="action">Enviar
                    <i class="material-icons right">lock_open</i>
                </button>
            </form>
        </div>
    </div>
</div>


<div id="modalFilhosGrafico" class="modal">
    <div class="modal-content">
        <div class="input-field col s12 validate">
            <form action="selectDisciplinaRendimento.html.php" method="POST">
                <h4>Selecione o filho desejado</h4>
                <select name="filhos">
                    <option value="" disabled selected>Selecionar filho</option>
                    <?php

                    $query_select_filhos_responsavel = $conn->prepare("SELECT nome_aluno, RA, fk_id_turma_aluno FROM aluno WHERE fk_id_responsavel_aluno = $id_usuario");
                    $query_select_filhos_responsavel->execute();
                    print_r($query_select_filhos_responsavel);
                    while ($filhos = $query_select_filhos_responsavel->fetch(PDO::FETCH_ASSOC)) {

                        $nome_aluno = $filhos["nome_aluno"];
                        $ra = $filhos["RA"];

                    ?>
                        <option value="<?php echo $ra; ?>"><?php echo $nome_aluno; ?></option>
                    <?php
                    }
                    ?>
                </select>
        </div>
        <div class="center">
            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                <i class="material-icons left">search</i>Pesquisar
            </button>
        </div>
    </div>
</div>


<?php

$query_mensagem = $conn->prepare("SELECT *
  FROM responsavel AS R 
  JOIN contato AS C ON R.id_responsavel = C.fk_recebimento_responsavel_id_responsavel and R.id_responsavel = {$id_usuario}  ORDER BY data_mensagem DESC");
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
            <li><a href="#modalFilhosGrafico" class="modal-trigger btn-floating black tooltipped" data-position="left" data-tooltip="Rendimento Disciplinar"><i class="material-icons">trending_up</i></a></li>
            <li><a href="#modalFilhosGrade" class="modal-trigger btn-floating brown tooltipped" data-position="left" data-tooltip="Grade Curricular"><i class="material-icons">toc</i></a></li>
            <li><a href="paginaManutencao.php" class="btn-floating yellow darken-4 tooltipped" data-position="left" data-tooltip="Notificações"><i class="material-icons">notifications_active</i></a></li>
            <li><a href="mensagensResponsavel.html.php" class="btn-floating teal lighten-4 tooltipped" data-position="left" data-tooltip="Caixa de Mensagens"><i class="material-icons">email</i></a></li>
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


<div id="modalFilhos" class="modal">
    <div class="modal-content">
        <div class="input-field col s12 validate">
            <form action="boletimVisualizacao.html.php" method="POST">
                <h4>Selecione o filho desejado</h4>
                <select name="filhos">
                    <option value="" disabled selected>Selecionar filho</option>
                    <?php

                    $query_select_filhos_responsavel = $conn->prepare("SELECT nome_aluno, RA, fk_id_turma_aluno FROM aluno WHERE fk_id_responsavel_aluno = $id_usuario");
                    $query_select_filhos_responsavel->execute();
                    print_r($query_select_filhos_responsavel);

                    while ($filhos = $query_select_filhos_responsavel->fetch(PDO::FETCH_ASSOC)) {

                        $nome_aluno = $filhos["nome_aluno"];
                        $ra = $filhos["RA"];

                    ?>
                        <option value="<?php echo $ra; ?>"><?php echo $nome_aluno; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <div class="center">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">search</i>Pesquisar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modalFilhosGrade" class="modal">
    <div class="modal-content">
        <div class="input-field col s12 validate">
            <form action="gradeCurricularExibicao.html.php" method="POST">
                <h4>Selecione o filho desejado</h4>
                <select name="filhos">
                    <option value="" disabled selected>Selecionar filho</option>
                    <?php

                    $query_select_filhos_responsavel = $conn->prepare("SELECT nome_aluno, RA, fk_id_turma_aluno FROM aluno WHERE fk_id_responsavel_aluno = $id_usuario");
                    $query_select_filhos_responsavel->execute();
                    print_r($query_select_filhos_responsavel);

                    while ($filhos = $query_select_filhos_responsavel->fetch(PDO::FETCH_ASSOC)) {

                        $nome_aluno = $filhos["nome_aluno"];
                        $ra = $filhos["RA"];

                    ?>
                        <option value="<?php echo $ra; ?>"><?php echo $nome_aluno; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <div class="center">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">search</i>Pesquisar
                    </button>
                </div>                
            </form>            
        </div>
    </div>
</div>


<?php require_once 'reqFooter.php' ?>