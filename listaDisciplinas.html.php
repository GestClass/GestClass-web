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

// Selecionar disciplinas
$sql_select_disciplinas = $conn->prepare("SELECT * FROM disciplina WHERE fk_id_escola_disciplina = $id_escola");
$sql_select_disciplinas->execute();

?>
<br><br>
<div class="container col s12 m12 l12" id="container_boletimCadastro">
    <h3 class="center">Lista de Disciplinas</h3>
    <br><br>
    <table class="striped centered">
        <thead>
            <tr>
                <th>Disciplina</th>
                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            <?php
            // Verificando resultado da consulta realizada la encima
            if ($sql_select_disciplinas->rowCount()) {
                while ($disciplinas_array = $sql_select_disciplinas->fetch(PDO::FETCH_ASSOC)) {
                    //dados da consulta
                    $id_disciplina = $disciplinas_array['ID_disciplina'];
                    $nome_disciplina = $disciplinas_array['nome_disciplina'];
                    $situacao = $disciplinas_array['situacao'];

                    // transformar situacao em texto
                    if ($situacao) {                        
                        $situacao_disciplina = "Ativa";
                    } else {
                        $situacao_disciplina = "Desativa";
                    }
            ?>
                    <tr>
                        <td><?php echo $nome_disciplina; ?></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $situacao_disciplina; ?></td>
                        <td>
                            <?php
                            // ou if ($situacao == true) {}
                            if ($situacao) { 
                                // Abaixo botão de desativar                               
                            ?>
                                <form action="php/confirmDesativarDisciplina.php" method="POST">
                                    <input type="hidden" name="idDisciplina" value="<?php echo $id_disciplina; ?>">
                                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightRed center" style="float: center;">
                                        <i class="material-icons left">delete</i>Desativar Disciplina
                                    </button>
                                </form>
                            <?php
                            } else {
                                // Abaixo botão de ativar
                            ?>
                                <form action="php/ativarDisciplina.php" method="POST">
                                    <input type="hidden" name="idDisciplina" value="<?php echo $id_disciplina; ?>">
                                    <button id="btnTableChamada" type="submit" class="btn-flat btnLightGreen center" style="float: center;">
                                        <i class="material-icons left">unarchive</i>Ativar Disciplina
                                    </button>
                                </form>
                            <?php
                            }
                            ?>
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                <?php
                }
            } else {
                // Caso não existam registros para deixar algo visivel na tabela
                ?>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php
require_once 'reqFooter.php';
?>