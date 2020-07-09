<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="css/cadastroContas.css" />
</head>

<body>

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
    ?>

    <div id="turmas_disci" class="container col s12 m12 l12 ">
        <form id="disciplina_turmas" method="POST" action="php/atribuicaoDisciplinas.php"">
            <h3 class=" center">Atribuiçao de turmas e disciplinas</h5><br><br>

            <div class=" row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">account_circle</i>
                    <select name="professor">
                        <option value="" disabled selected>Selecionar Professor</option>
                        <?php

                        $query_select_professor = $conn->prepare("SELECT ID_professor, nome_professor FROM professor WHERE fk_id_escola_professor = $id_escola ORDER BY nome_professor ASC");
                        $query_select_professor->execute();

                        while ($dados_professor = $query_select_professor->fetch(PDO::FETCH_ASSOC)) {
                            $id_professor = $dados_professor['ID_professor'];
                            $nome_professor = $dados_professor['nome_professor'];

                            //session_start();
                            //$_SESSION['ID_professor'] = $id_professor; // Perguntar para o caio pq de armazenar na sessãos
                        ?>
                            <option value="<?php echo $id_professor ?>"><?php echo $nome_professor; ?></option>
                        <?php

                        }
                        ?>
                    </select>
                    <label id="lbl">Selecione o Professor</label>
                </div>

                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">school</i>
                    <select name="turma">
                        <option value="" disabled selected>Selecionar Turma</option>
                        <?php

                        $query_select_turma = $conn->prepare("SELECT turma.ID_turma AS id_turma, turma.nome_turma AS nome_turma, turno.nome_turno AS nome_turno FROM turma INNER JOIN turno ON (fk_id_turno_turma = ID_turno) WHERE fk_id_escola_turma = $id_escola ORDER BY id_turma ASC");
                        $query_select_turma->execute();

                        while ($dados_turma = $query_select_turma->fetch(PDO::FETCH_ASSOC)) {
                            $id_turma = $dados_turma['id_turma'];
                            $nome_turma = $dados_turma['nome_turma'];
                            $nome_turno = $dados_turma['nome_turno'];

                        ?>
                            <option value="<?php echo $id_turma ?>"><?php echo $nome_turma . ' - ' . $nome_turno; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label id="lbl" for="first_name">Turmas</label>
                </div>

                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">school</i>
                        <select name="disciplinas">
                            <option value="" disabled selected>Selecionar Disciplina</option>
                            <?php

                            $query_select_disciplina = $conn->prepare("SELECT ID_disciplina, nome_disciplina FROM disciplina WHERE fk_id_escola_disciplina = $id_escola ORDER BY nome_disciplina ASC ");
                            $query_select_disciplina->execute();

                            while ($dados_disciplina = $query_select_disciplina->fetch(PDO::FETCH_ASSOC)) {
                                $id_disciplina = $dados_disciplina['ID_disciplina'];
                                $nome = $dados_disciplina['nome_disciplina'];

                            ?>
                                <option value="<?php echo $id_disciplina ?>"><?php echo $nome; ?></option>
                            <?php
                            }
                            ?>

                        </select>
                        <label id="lbl" for="first_name">Disciplinas</label>
                    </div>
                    <div class="input-field left">
                        <button id="btncadastrar" data-target="modalDisciplina" type="submit" class="btn-flat btnLightBlue modal-trigger">
                            <i class="material-icons left">import_contacts</i>Nova Disciplina
                        </button>
                    </div>
                </div>
                <div class="input-field right">
                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                        <i class="material-icons left">send</i>Cadastrar
                    </button>
                </div>
        </form>
    </div>

    <div id="modalDisciplina" class="modal">
        <div class="modal-content">
            <h4 class="center">Nova Disciplina</h4><br>
            <div id="novaMensagem">
                <form action="php/disciplinas.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="disciplina" id="disciplina" placeholder="Digite o nome da disciplina" type="text" class="validate ">
                            <label id="lbl" for="first_name">Nome Disciplina</label>
                        </div>
                    </div>
                    
                    <div class="input-field right">
                        <button id="formMensagem" type="submit" class="btn-flat btnLightBlue">
                            <i class="material-icons left">send</i>Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/query-3.3.1.min.js"></script>
    <script src="js/default.js"></script>

    <?php require_once 'reqFooter.php' ?>