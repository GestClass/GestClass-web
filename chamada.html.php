<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />

    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/chamada.css" />


</head>

<body>

    <?php 
            include_once 'php/conexao.php';

            $id_usuario = $_SESSION["id_usuario"];
            $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
            $id_escola = $_SESSION["id_escola"];
        
            if ($id_tipo_usuario == 1) {
                require_once 'reqMenuAdm.php';
            } else if($id_tipo_usuario == 2){
                require_once 'reqDiretor.php';
            }else if($id_tipo_usuario == 3){
                require_once 'reqHeader.php';
            }elseif ($id_tipo_usuario == 4) {
                require_once 'reqProfessor.php';
            }elseif ($id_tipo_usuario  == 5) {
                require_once 'reqAluno.php';
            }else {
                require_once 'reqPais.php';
            }

            $query_alunos = $conn->prepare("SELECT t.id_turma,t.nome_turma FROM turma AS t JOIN turmas_professor AS P ON t.id_turma = P.fk_id_turma_professor_turmas_professor");
            $query_alunos->execute();

            

            

    ?>


    <div class="container col s12 m12 l12">
        <h4>Chamada</h4>
        <form action="php/chamada.php" method="post">
        <table class="highlight centered">
            <thead>
                <tr>
                    <th>RA</th>
                    <th>Nome</th>
                    <th>Data</th>
                    <th>Presença</th>
                    <th>Justificada</th>
                </tr>
            </thead>

            <tbody>
                <?php while($dados_alunos = $query_alunos->fetch(PDO::FETCH_ASSOC)){
                       
                ?>

                <tr>
                    <td>
                        <?php echo $dados_alunos['RA']?>
                    </td>
                    <td>
                        <?php echo $dados_alunos['nome_aluno']?>
                    </td> 
                    <td>
                        <?php echo date("d/m/y");?>
                    </td>
                    <td>
                        <label> 
                            <input type="radio" name="presenca" id="radio" value="SIM"/>
                            <span></span>
                        </label>
                    </td>
                    <td>
                        <label> 
                            <input type="radio" name="presenca" id="radio" value="JUSTIFICADA"/>
                            <span></span>
                        </label>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
 
        <div class="input-field right">
            <button class="btn waves-effect blue lighten-2" id="btnTableChamada" type="submit"
                class="btn-flat btnDefaultTableChamada">
                <i class="material-icons right">send</i>Enviar
            </button>
        </div>
        </form>
    </div>

    <script src="js/chamada.js"></script>

    <?php require_once 'reqFooter.php'?>