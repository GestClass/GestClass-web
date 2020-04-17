<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <link rel="stylesheet" type="text/css" href="css/boletimCadastro.css" />

    </head>

    <body class="body_estilizado">

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
        ?>


          <div class="container col s12 m12 l12" id="container_boletimCadastro">

            <div class="row">
                <div class="col s12 m12 l12">
                    <ul id="tabs-swipe-demo" class="tabs blue lighten-3">
                        <li class="tab col s3 m6 l6 "><a href="#cadastro">Cadastro de notas</a></li>
                        <li class="tab col s3 m6 l6 "><a href="#alteracao">Alteração de notas</a></li>
                    </ul>
                </div>

              <br>
              <br>

              <div id="cadastro" class="col s12 m12 l12">
                <h4 class="center">Cadastro de Notas</h4>
                <br>
                <div class="row">
                <form class="form" action="boletimCadastro.php" method="post">
                    <form class="form" action="boletimCadastro.php" method="post">
                        <div class="input-field col s12 m6 l6 validate">
                            <i class="material-icons prefix blue-icon">content_copy</i>
                            <select id="nome_tipo_turma" name="turma">
                            <option value="" disabled selected>Selecione a Turma</option>
                            <?php

                                $query_select_turmas_professor = $conn->prepare("SELECT fk_id_turma_professor_turmas_professor FROM turmas_professor WHERE fk_id_professor_turmas_professor = $id_usuario");
                                $query_select_turmas_professor->execute();

                                while($dados_turmas_professor = $query_select_turmas_professor->fetch(PDO::FETCH_ASSOC)){

                                    $id_turma = $dados_turmas_professor["fk_id_turma_professor_turmas_professor"];

                                    $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
                                    $query_select_turma->execute();

                                    while($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)){


                            ?>
                            <option name="turma" class="turmaselect" value="<?php echo $$id_turma ?>"><?php echo $dados_turma_nome['nome_turma'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                            </select>
                            <label id="lbl">Turma</label>
                        </div>
                    </form>
                    <div class="input-field col s12 m6 l6 validate">
                        <i class="material-icons prefix blue-icon">library_books</i>
                        <select id="nome_tipo_turma" name="disciplina">
                        <option value="" disabled selected>Selecione a Disciplina</option>
                        <option value="">aaaa</option>
                        </select>
                        <label id="lbl">Disciplina</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">border_color</i>
                        <input placeholder="Dê um nome a atividade" type="text" name="atividade">
                        <label id="lbl">Nome atividade</label>
                    </div>

                    <div class="file field input-field col s12 m6 l6">
                        <i class="material-icons prefix blue-icon">event</i>
                        <input  placeholder="Ano/Mes/Dia" type="text" class="datepicker validate">
                        <label id="lbl">Data da atividade</label>
                    </div>


                </div>
                <div class="center">
                  <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                      <i class="material-icons left">search</i>Enviar
                  </button>
                </div>
                <br>

                <div class="values">
                    
                </div>
              </form>
            </div>

          <div id="alteracao" class="col s12 m12 l12">
            <h4 class="center">Alteraçao de Notas</h4>
            <br>
            <div class="row">
                <form action="boletimCadastro.php" method="post">
                    <div class="input-field col s12 m6 l6 validate">
                        <i class="material-icons prefix blue-icon">content_copy</i>
                        <select id="nome_tipo_turma" name="turma">
                        <option value="" disabled selected>Selecione a Turma</option>
                        <?php

                            $query_select_turmas_professor = $conn->prepare("SELECT fk_id_turma_professor_turmas_professor FROM turmas_professor WHERE fk_id_professor_turmas_professor = $id_usuario");
                            $query_select_turmas_professor->execute();

                            while($dados_turmas_professor = $query_select_turmas_professor->fetch(PDO::FETCH_ASSOC)){

                                $id_turma = $dados_turmas_professor["fk_id_turma_professor_turmas_professor"];

                                $query_select_turma = $conn->prepare("SELECT nome_turma FROM turma WHERE ID_turma = $id_turma");
                                $query_select_turma->execute();

                                while($dados_turma_nome = $query_select_turma->fetch(PDO::FETCH_ASSOC)){


                        ?>
                        <option name="turma" value="<?php echo $$id_turma ?>"><?php echo $dados_turma_nome['nome_turma'] ?></option>
                        <?php
                                }
                            }
                        ?>
                        </select>
                        <label id="lbl">Turma</label>
                    </div>
                </form>
                <div class="input-field col s12 m6 l6 validate">
                    <i class="material-icons prefix blue-icon">library_books</i>
                    <select id="nome_tipo_turma" name="disciplina">
                    <option value="" disabled selected>Selecione a Disciplina</option>
                    <?php

                        $query_select_disciplinas_professor = $conn->prepare("SELECT fk_id_disciplina_professor_disciplinas_professor FROM disciplinas_professor WHERE fk_id_professor_disciplinas_professor = $id_usuario");
                        $query_select_disciplinas_professor->execute();

                        while($dados_disciplinas_professor = $query_select_disciplinas_professor->fetch(PDO::FETCH_ASSOC)){
                            $id_disciplina = $dados_disciplinas_professor["fk_id_disciplina_professor_aulas_professor"];

                            $query_select_disciplina_nome = $conn->prepare("SELECT nome_disciplina FROM disciplina WHERE ID_disciplina = $id_disciplina");
                            $query_select_disciplina_nome->execute();

                            while($dados_disciplina_nome = $query_select_disciplina_nome->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <option value="<?php echo $id_disciplina ?>"><?php echo $dados_disciplina_nome['nome_disciplina']  ?></option>
                    <?php
                            }
                        }
                    ?>
                    </select>
                    <label id="lbl">Disciplina</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">border_color</i>
                    <input placeholder="Dê um nome a atividade" type="text" name="atividade">
                    <label id="lbl">Nome atividade</label>
                </div>

                <div class="file field input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">event</i>
                    <input  placeholder="Ano/Mes/Dia" type="text" class="datepicker validate">
                    <label id="lbl">Data da atividade</label>
                </div>


            </div>
            <div class="center">
              <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                  <i class="material-icons left">search</i>Enviar
              </button>
            </div>
            <br>
          </form>
    </div>
    
    <script src="js/default.js"></script>
<?php require_once 'reqFooter.php' ?>
