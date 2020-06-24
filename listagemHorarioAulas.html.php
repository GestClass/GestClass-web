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

$id_usuario = $_SESSION["id_usuario"];
$id_tipo_usuario = $_SESSION["id_tipo_usuario"];
$id_escola = $_SESSION["id_escola"];

$id_padrao = $_POST['padroes'];
if ($id_padrao == null) {
?>
    <script>
        alert('Por favor, selecione os dados solicitados!!');
        history.back();
    </script>
<?php
}

$sql_selct_nome_padrao = $conn->prepare("SELECT nome_padrao FROM aula_escola WHERE ID_aula_escola = $id_padrao");
$sql_selct_nome_padrao->execute();
$array_nome_padrao = $sql_selct_nome_padrao->fetch(PDO::FETCH_ASSOC);
$nome_padrao = $array_nome_padrao['nome_padrao'];

?>

<div class="container col s12 m12 l12" id="containe">
    <h4 class="center">Alteração do Horário <?php echo $nome_padrao; ?></h4>
    <br />
    <br />
    <form action="php/alterarHorarioAula.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="input-field col s12 m11 l11">
                    <input name="nome_padrao[]" id="nome_padrao[]" value="<?php echo $nome_padrao ?>" type="text" class="validate ">
                    <label id="lbl" for="first_name">Nome do Hor-rio</label>
                </div>
            </div>
        </div>
        <?php

        $sql_select_padrao = $conn->prepare("SELECT ID_aula_escola, nome_aula, aula_start, aula_end FROM aula_escola WHERE fk_id_escola_aula_escola = $id_escola AND nome_padrao = '$nome_padrao' ORDER BY aula_start ASC");
        $sql_select_padrao->execute();

        while ($array_aula_escola = $sql_select_padrao->fetch(PDO::FETCH_ASSOC)) {
            $nome_aula = $array_aula_escola['nome_aula'];
            $aula_start = $array_aula_escola['aula_start'];
            $aula_end = $array_aula_escola['aula_end'];
            $id_aula = $array_aula_escola['ID_aula_escola'];
        ?>
            <div class="container">
                <div class="row">
                    <div class="input-field col s12 m4 l4">
                        <input name="teste[]" id="nome_padrao[]" value="<?php echo $nome_padrao ?>" hidden>
                        <input name="aula[]" id="aula[]" value="<?php echo $nome_aula ?>" type="text" class="validate ">
                        <label id="lbl" for="first_name">Aula</label>
                    </div>
                    <div class="input-field col s6 m4 l4">
                        <input name="inicio[]" id="inicio[]" value="<?php echo $aula_start ?>" type="tel" class="validate">
                        <label id="lbl" for="first_name">Início</label>
                    </div>
                    <div class="input-field col s6 m3 l3">
                        <input name="termino[]" id="termino[]" value="<?php echo $aula_end ?>" type="tel" class="validate">
                        <label id="lbl" for="first_name">Término</label>
                    </div>
                    <a href="php/deletarAula.php?id_aula=<?php echo $id_aula ?>"><i class="material-icons center tooltipped" data-tooltip="Excluir" style="color:red;">delete</i></a>
                </div>
            </div>

            <input name="id_aula[]" id="id_aula[]" value="<?php echo $id_aula; ?>" hidden>
            <input name="id_padrao" id="id_padrao[]" value="<?php echo $id_padrao; ?>" hidden>
        <?php
        }
        ?>
        <button id="btnTableHorario" type="submit" class="btn-flat btnLightBlue center">
            <i class="material-icons left">edit</i> Alterar
        </button>
    </form>
</div>


<?php include_once 'reqFooter.php'; ?>