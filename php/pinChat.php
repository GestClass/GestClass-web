<?php
    include_once 'conexao.php';
    $pin = $_POST['pin'];
    $dados["id"]=$_SESSION["id_usuario"];
    
     $query = $conn->prepare("select ID_responsavel,pin from responsavel where ID_responsavel=:ID_responsavel");
        $query->bindValue(":ID_responsavel",$dados["id"]);
        $query->execute();
        $dados = $query->fetch(PDO::FETCH_ASSOC);
    
        if($pin == ""){
            echo "<script>alert('Digite seu PIN de segurança, por favor:)');
            window.location='../homePais.html.php'</script>";
        }else if($pin==$dados['pin']){
            echo "<script>alert('Validação efetuada com sucesso;)');
            window.location='../mensagensResponsavel.html.php'
            </script>";

        }else{
            echo "<script>alert('Pin inválido, tente novamente :)') 
            window.location='../homePais.html.php'
            </script>";
        }
 
?>