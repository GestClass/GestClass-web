<!DOCTYPE html>
<html lang="pt-br">

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
        <link rel="stylesheet" type="text/css" href="css/boletimCadastro.css" />

    </head>

    <body id="body_boletimCadastro">

        <?php
          session_start();
          require_once 'reqHeader.php';
          include_once 'php/conexao.php';

          $id_usuario = $_SESSION["id_usuario"];
          $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
          $id_escola = $_SESSION["id_escola"];
        ?>


      <form class="" action="boletimCadastro.html.php" method="post">
        <form class="" action="boletimCadastro.html.php" method="post">

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
              <?php $query_select_turma = $conn->prepare("SELECT ID_turma, nome_turma FROM turma");
                    $query_select_turma->execute();
              ?>

              <div id="cadastro" class="col s12 m12 l12">
                <h4 class="center">Cadastro de Notas</h4>
                <br>
                <div class="row">
                    <div class="input-field col s12 m6 l6 validate">
                        <i class="material-icons prefix blue-icon">content_copy</i>
                        <select id="nome_tipo_turma" name="turma">
                        <option value="" disabled selected>Selecione a Turma</option>
                        <?php while($dados_turma = $query_select_turma->fetch(PDO::FETCH_ASSOC)){ ?>
                        <option name="turma" value="<?php echo $dados_turma['ID_turma'] ?>"><?php echo $dados_turma['nome_turma'] ?></option>
                      <?php } ?>
                        </select>
                        <label id="lbl">Turma</label>
                    </div>

                  <?php $query_select_disciplina = $conn->prepare("SELECT ID_disciplina, nome_disciplina FROM disciplina");
                        $query_select_disciplina->execute();

                    ?>
                    <div class="input-field col s12 m6 l6 validate">
                        <i class="material-icons prefix blue-icon">library_books</i>
                        <select id="nome_tipo_turma" name="disciplina">
                        <option value="" disabled selected>Selecione a Disciplina</option>
                        <?php while($dados_disciplina = $query_select_disciplina->fetch(PDO::FETCH_ASSOC)){ ?>
                        <option value="<?php echo $dados_disciplina['ID_disciplina'] ?>"><?php echo $dados_disciplina['nome_disciplina']  ?></option>
                      <?php } ?>
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
              <?php

                $turma = $_POST['turma'];
                $disciplina = $_POST['disciplina'];


                $query = $conn->prepare("SELECT * FROM aluno where fk_id_turma_aluno =");
                $query->execute();
                ?>
                <script>
                  var valor = $("input [name = turma]").val()
                  alert(valor)
                </script>


                <table class="highlight centered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Nota</th>
                            <th>Observações</th>
                        </tr>
                    </thead>

                    <tbody>
                      <?php  while ($dados =  $query->fetch(PDO::FETCH_ASSOC)) {?>
                        <tr>
                            <td><?php echo $dados['nome_aluno'] ?></td>
                            <td>
                                <label>
                                    <input type="number" data-mask="00.00" placeholder="Ex: 09.50"/>
                                    <span></span>
                                </label>
                            </td>
                            <td>
                                <input type="text" placeholder="Observações . . ."/>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>


              <div class="input-field right">
                <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue">
                    <i class="material-icons left">send</i>Enviar
                </button>
              </div>
        </form>

          <form class="" action="php/boletimCadastro.php" method="post">

          <div id="alteracao" class="col s12 m12 l12">
            <h4 class="center">Alteraçao de Notas</h4>
            <br>
            <div class="row">
                <div class="input-field col s12 m6 l6 validate">
                    <i class="material-icons prefix blue-icon">content_copy</i>
                    <select id="nome_tipo_turma">
                    <option value="" disabled selected>Selecione a Turma</option>
                    <option value="4">8º ano A</option>
                    <option value="5">9º ano A</option>
                    <option value="1">1º ano A</option>
                    <option value="2">2º ano A</option>
                    <option value="3">3º ano A</option>
                    </select>
                    <label id="lbl">Turma</label>
                </div>

                <div class="input-field col s12 m6 l6 validate">
                    <i class="material-icons prefix blue-icon">library_books</i>
                    <select id="nome_tipo_turma">
                    <option value="" disabled selected>Selecione a Disciplina</option>
                    <option value="4">Portugê<s></s></option>
                    <option value="5">Inglês</option>
                    <option value="1">História</option>
                    </select>
                    <label id="lbl">Turma</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">border_color</i>
                    <input placeholder="Dê um nome a atividade" type="text" >
                    <label id="lbl">Nome atividade desempenhada</label>
                </div>

                <div class="file field input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">event</i>
                    <input  placeholder="Ano/Mes/Dia" type="text" class="datepicker validate">
                    <label id="lbl">Data da atividade realizada</label>
                </div>
            </div>
            <div class="center">
            <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue ">
                <i class="material-icons left">search</i>Enviar
            </button>
            </div>
            <br>
          </form>


            <table class="highlight centered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Nota</th>
                        <th>Observações</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Nome(Aluno)</td>
                        <td>
                            <label>
                                <input type="number" data-mask="00.00" placeholder="Ex: 09.50"/>
                                <span></span>
                            </label>
                        </td>
                        <td>
                            <input type="text" placeholder="Observações . . ."/>
                        </td>
                    </tr>

                    <tr>
                        <td>Nome(Aluno)</td>
                        <td>
                            <label>
                                <input type="number" data-mask="00.00" placeholder="Ex: 09.50"/>
                                <span></span>
                            </label>
                        </td>
                        <td>
                            <input type="text" placeholder="Observações . . ."/>
                        </td>
                    </tr>

                    <tr>
                        <td>Nome(Aluno)</td>
                        <td>
                            <label>
                                <input type="number" data-mask="00.00" placeholder="Ex: 09.50"/>
                                <span></span>
                            </label>
                        </td>
                        <td>
                            <input type="text" placeholder="Observações . . ."/>
                        </td>
                    </tr>

                <tr>
                    <td>Nome(Aluno)</td>
                    <td>
                            <label>
                                <input type="number" data-mask="00.00" placeholder="Ex: 09.50"/>
                                <span></span>
                            </label>
                        </td>
                        <td>
                            <input type="text" placeholder="Observações . . ."/>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="input-field right">
                <button id="btnTableChamada" type="submit" class="btn-flat btnLightBlue center">
                    <i class="material-icons left">send</i>Enviar
                </button>
            </div>
            <?php/* while $query_insert = $conn->prepare("INSERT INTO dados_aluno (nota , observacoes, fk_ra_aluno_dados_aluno, fk_id_disciplina_dados_aluno) VALUES())

             */?>
        </div>
      </div>
    <script src="js/default.js"></script>
<?php require_once 'reqFooter.php' ?>
