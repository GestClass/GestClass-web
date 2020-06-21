<?php
    include_once '../php/conexao.php';

    function select_notificacoes($conn){
        if (isset($_GET['usuario'])) {
            $sql = $conn->prepare("SELECT * FROM notificacoes WHERE id_para = ? ORDER BY id_notificacoes DESC");
            $sql->bind_param("s", $_GET["usuario"]);
            $sql->execute();
            $get =  $sql->get_result();
            $total = $get->num_rows;

            if ($total > 0) {
                while ($dados = $get->fetch_array()) {
                    switch ($dados['status']) {
                        case 0:
                                $dados['status'] = "Não Lido";
                            break;
                        case 1:
                                $dados['status'] = "Não Lido";
                            break;  

                        default:
                            
                            break;
                    }
                    echo "<li>{$dados['notificacao']} | {$dados['status']}</li>";
                }
            }
        }
    }
?>