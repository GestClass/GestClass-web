<?php
include_once  'conexao.php';

$id_escola = $_POST['id'];


?>
<script>
    var conf = confirm('Deseja desativar esta escola?');
    if(conf){
        window.location ='desativarEscola.php?id_escola=<?php echo $id_escola; ?>';
    }else{
        history.back();
    }


</script>