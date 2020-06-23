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
    <link rel="stylesheet" type="text/css" href="css/dadosAlunos.css" />


</head>

<body>

    <?php

    include_once 'php/conexao.php';

    $id_usuario = $_SESSION["id_usuario"];
    $id_tipo_usuario = $_SESSION["id_tipo_usuario"];
    $id_escola = $_SESSION["id_escola"];

    if ($id_tipo_usuario == 2) {
        require_once 'reqDiretor.php';
    } elseif ($id_tipo_usuario == 3) {
        require_once 'reqHeader.php';
    } elseif ($id_tipo_usuario == 4) {
        require_once 'reqProfessor.php';
    }

    ?>
    <h4 class="center">Dados pessoais</h4>

    <?php




    $tipo_usuario = $_GET['tipo'];
    $id = $_GET['id'];

    if ($tipo_usuario == "5") {
        $query_alunos = $conn->prepare('SELECT * FROM aluno WHERE RA = ' . $id . '');
        $query_alunos->execute();
        $dados_alunos = $query_alunos->fetch(PDO::FETCH_ASSOC)


    ?>
        <div class="container col s12 m12 l12 ">

            <form id="aluno" method="POST" action="alteracaoDados.html.php" enctype="multipart/form-data">


                <div class="row">
                    <div class="input-field col s12 m9 l2">
                        <?php if (empty($dados_alunos['foto'])) { ?>

                            <img class="responsive-img" width="90px" height="100px" src="assets/imagensBanco/usuario.png">

                        <?php } else { ?>

                            <img class="responsive-img" width="90px" height="100px" src="assets/imagensBanco/<?php echo $dados_alunos['foto'] ?>">

                        <?php } ?>
                    </div>
                    <br><br>
                    <div class="input-field col s12 m9 l6">
                        <input name="nome" id="nome_aluno" type="text" value="<?php echo $dados_alunos['nome_aluno'] ?>" readonly>
                        <label id="lbl" for="first_name">Nome Aluno</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m4 l5">
                        <i class="material-icons prefix blue-icon">cake</i>
                        <input name="data_nascimento" id="data_nascimento" value="<?php echo $dados_alunos["data_nascimento"] ?>" type="date"  readonly>
                        <label id="lbl">Data Nascimento</label>
                    </div>
                    <div class="input-field col s6 m4 l5">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input name="ra" id="RA" placeholder="8956478-9" value=<?php echo $dados_alunos['RA'] ?> data-mask="0000000-0" type="text" class="" readonly>
                        <label id="lbl" for="first_name">RA</label>
                    </div>
                    <div class="input-field col s6 m4 l5">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input name="rg" id="RG" value="<?php echo $dados_alunos['RG'] ?>" type="tel" class=" " data-mask="00.000.000-0" readonly>
                        <label id="lbl" for="first_name">RG</label>
                    </div>
                    <div class="input-field col s6 m6 l5">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input name="cpf" id="CPF" value="<?php echo $dados_alunos['cpf'] ?>" type="text" class=" " readonly>
                        <label id="lbl" for="first_name">CPF</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">alternate_email</i>
                        <input name="email" id="email" value="<?php echo $dados_alunos['email'] ?>" type="tel" class=" " readonly>
                        <label id="lbl" for="first_name">Email</label>
                    </div>
                    <div class="input-field col s12 m6 l4">
                        <i class="material-icons prefix blue-icon">smartphone</i>
                        <input name="celular" id="celular" value="<?php echo $dados_alunos['celular'] ?>" type="tel" data-mask="(00) 00000-0000" class=" " readonly>
                        <label id="lbl" for="first_name">Celular</label>
                    </div>
                    <div class="input-field col s12 m6 l4">
                        <i class="material-icons prefix blue-icon">call</i>
                        <input name="telefone" id="telefone" value="<?php echo $dados_alunos['telefone'] ?>" type="tel" data-mask="(00) 0000-0000" class="" readonly>
                        <label id="lbl" for="first_name">Telefone</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l2 ">
                        <i class="material-icons prefix blue-icon">school</i>
                        <input name="telefone" id="telefone" type="text" class="" value="<?php echo $dados_alunos['fk_id_turma_aluno'] ?>" readonly>
                        <label id="lbl">Turma</label>
                    </div>
                    <div>
                        <input type="text" name="tipo_conta" value="<?php echo $_GET['tipo'] ?>" hidden>
                        <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
                    </div>
                </div>

                <div class="row">
                    <?php
                    if ($id_tipo_usuario == 2 || $id_tipo_usuario == 3) { ?>
                        <input type="submit" class="btn-flat btnLightBlue center" value="Alterar dados">
                    <?php } ?>

                    <a href="dadosResponsaveis.html.php?id=<?php echo $dados_alunos['fk_id_responsavel_aluno'] ?>" class="btn-flat btnLightBlue center"><i class="material-icons left">people_alt</i>Responsáveis</a>


                </div>
            </form>





        </div>
        </div><?php
            } elseif ($tipo_usuario == "6") {
                $query_resp = $conn->prepare("SELECT * FROM responsavel WHERE fk_ra_aluno_responsavel = " . $id . "");
                $query_resp->execute();
                $dados_resp = $query_resp->fetch(PDO::FETCH_ASSOC) ?>


        <div class="container col s12 m12 l12 ">
            <form id="responsavel" method="POST" action="alteracaoDados.html.php" enctype="multipart/form-data">
                <div class="col s12 m12 l12">
                    <div class="row">
                        <div class="input-field col s12 m9 l2">
                            <?php if (empty($dados_resp['foto'])) { ?>

                                <img class="responsive-img" width="90px" height="100px" src="assets/imagensBanco/usuario.png">

                            <?php } else { ?>

                                <img class="responsive-img" width="90px" height="100px" src="assets/imagensBanco/<?php echo $dados_resp['foto'] ?>">

                            <?php } ?>
                        </div>
                        <br><br>
                    </div>
                    <div class="input-field col s12 m9 l9">
                        <input name="nome_respon" id="nome_responsavel" type="text" value="<?php echo $dados_resp['nome_responsavel'] ?>" readonly class="">
                        <label id="lbl" for="icon_telephone">Nome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m4 l4">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input name="rg_respon" id="rg" type="tel" data-mask="00.000.000-0" value="<?php echo $dados_resp['RG'] ?>" readonly class="">
                        <label id="lbl" for="icon_telephone">RG</label>
                    </div>
                    <div class="input-field col s6 m4 l4">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input name="cpf_respon" id="cpf" type="tel" value="<?php echo $dados_resp['cpf'] ?>" readonly data-mask="000.000.000-00" class="">
                        <label id="lbl" for="icon_telephone">CPF</label>
                    </div>
                    <div class="input-field col s6 m4 l4">
                        <i class="material-icons prefix blue-icon">cake</i>
                        <input name="nascimento_respon" id="data_nascimento" value="<?php echo $dados_resp['data_nascimento'] ?>" readonly type="date" class=" ">
                        <label id="lbl">Data Nascimento</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m3 l3">
                        <i class="material-icons prefix blue-icon">location_on</i>
                        <input name="cep" id="cep" value="<?php echo $dados_resp['cep'] ?>" readonly type="text" class="">
                        <label id="lbl" for="first_name">CEP</label>
                    </div>
                    <div id="a" class="input-field col s10 m1 l1">
                        <input name="numero" id="numero" value="<?php echo $dados_resp['numero'] ?>" readonly type="tel" class=" ">
                        <label id="lbl" for="first_name">Nº</label>
                    </div>
                    <div id="a" class="input-field col s10 m2 l2">
                        <input name="complemento" id="complemento" value="<?php echo $dados_resp['complemento'] ?>" readonly type="tel" class=" ">
                        <label id="lbl" for="first_name">Complemento</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m4 l5">
                        <i class="material-icons prefix blue-icon">alternate_email</i>
                        <input name="email_respon" id="email" type="tel" value="<?php echo $dados_resp['email'] ?>" readonly class="">
                        <label id="lbl" for="icon_telephone">Email</label>
                    </div>
                    <div class="input-field col s12 m4 l5">
                        <i class="material-icons prefix blue-icon">smartphone</i>
                        <input name="celular_respon" id="celular" type="tel" value="<?php echo $dados_resp['celular'] ?>" readonly data-mask="(00) 00000-0000" class="">
                        <label id="lbl" for="icon_telephone">Celular</label>
                    </div>
                    <div class="input-field col s12 m4 l5">
                        <i class="material-icons prefix blue-icon">call</i>
                        <input name="telefone_respon" id="telefone" type="tel" value="<?php echo $dados_resp['telefone'] ?>" readonly data-mask="(00) 0000-0000" class="">
                        <label id="lbl" for="icon_telephone">Telefone</label>
                    </div>
                    <div class="input-field col s12 m4 l5">
                        <i class="material-icons prefix blue-icon">call</i>
                        <input name="tel_comercial" id="telefone_comercial" type="tel" value="<?php echo $dados_resp['telefone_comercial'] ?>" readonly data-mask=" (00) 0000-0000" class="">
                        <label id="lbl" for="icon_telephone">Telefone Comercial</label>
                    </div>
                </div>
                <div>
                    <input type="text" name="tipo_conta" value="responsavel" hidden>
                </div>
        </div>

        <div class="row">
            <?php
                if ($id_tipo_usuario == 2 || $id_tipo_usuario == 3) { ?>
                <input type="submit" class="btn-flat btnLightBlue center" value="Alterar dados">
            <?php } ?>
        </div>

        </form>
    <?php
            } elseif ($tipo_usuario == "4") {
                $query_prof = $conn->prepare('SELECT * FROM professor WHERE ID_professor = ' . $id . '');
                $query_prof->execute();
                $dados_prof = $query_prof->fetch(PDO::FETCH_ASSOC) ?>

        <div class="container col s12 m12 l12 ">
            <form id="professor" method="POST" action="alteracaoDados.html.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12 m9 l2">
                        <?php if (empty($dados_prof['foto'])) { ?>

                            <img class="responsive-img" width="90px" height="100px" src="assets/imagensBanco/usuario.png">

                        <?php } else { ?>

                            <img class="responsive-img" width="90px" height="100px" src="assets/imagensBanco/<?php echo $dados_prof['foto'] ?>">

                        <?php } ?>
                    </div>
                    <br><br>
                    <div class="input-field col s12 m9 l9">
                        <input name="nome" id="nome_professor" type="text" value="<?php echo $dados_prof['nome_professor'] ?>" readonly class=" ">
                        <label id="lbl" for="icon_prefix">Nome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m4 l4">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input name="rg" id="rg" value="<?php echo $dados_prof['rg'] ?>" readonly type="tel" class="">
                        <label id="lbl" for="icon_telephone">RG</label>
                    </div>
                    <div class="input-field col s6 m4 l4">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input name="cpf" id="cpf" value="<?php echo $dados_prof['cpf'] ?>" readonly type="tel" class="">
                        <label id="lbl" for="icon_telephone">CPF</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m3 l3">
                        <i class="material-icons prefix blue-icon">location_on</i>
                        <input name="cep" id="cep" value="<?php echo $dados_prof['cep'] ?>" readonly type="text" class="">
                        <label id="lbl" for="first_name">CEP</label>
                    </div>
                    <div id="a" class="input-field col s10 m1 l1">
                        <input name="numero" id="numero" value="<?php echo $dados_prof['numero'] ?>" readonly type="tel" class=" ">
                        <label id="lbl" for="first_name">Nº</label>
                    </div>
                    <div id="a" class="input-field col s10 m2 l3">
                        <input name="complemento" id="complemento" value="<?php echo $dados_prof['complemento'] ?>" readonly type="tel" class=" ">
                        <label id="lbl" for="first_name">Complemento</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">alternate_email</i>
                        <input name="email" id="email" value="<?php echo $dados_prof['email'] ?>" readonly type="tel" class="">
                        <label id="lbl" for="icon_telephone">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l4">
                        <i class="material-icons prefix blue-icon">smartphone</i>
                        <input name="celular" id="celular" value="<?php echo $dados_prof['celular'] ?>" readonly type="tel" data-mask="(00) 00000-0000" class="">
                        <label id="lbl" for="icon_telephone">Celular</label>
                    </div>
                    <div class="input-field col s12 m6 l4">
                        <i class="material-icons prefix blue-icon">call</i>
                        <input name="telefone" id="telefone" value="<?php echo $dados_prof['telefone'] ?>" readonly type="tel" data-mask="(00) 0000-0000" class="">
                        <label id="lbl" for="icon_telephone">Telefone</label>
                    </div>
                    <div>
                        <input type="text" name="tipo_conta" value="<?php echo $tipo_usuario ?>" hidden>
                        <input type="text" name="id" value="<?php echo $id ?>" hidden>
                    </div>
                </div>

                <?php
                if ($id_tipo_usuario == 2 || $id_tipo_usuario == 3) { ?>
                    <input type="submit" class="btn-flat btnLightBlue center" value="Alterar dados">
                <?php } ?>
        </div>
        </div>

        </form>
    <?php
            } elseif ($tipo_usuario == "3") {
                $query_sec = $conn->prepare('SELECT * FROM secretario WHERE ID_secretario = ' . $id . '');
                $query_sec->execute();
                $dados_sec = $query_sec->fetch(PDO::FETCH_ASSOC)  ?>

        <div class="container col s12 m12 l12 ">
            <form id="secretaria" method="POST" action="alteracaoDados.html.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12 m9 l2">
                        <?php if (empty($dados_sec['foto'])) { ?>

                            <img class="responsive-img" width="90px" height="100px" src="assets/imagensBanco/usuario.png">

                        <?php } else { ?>

                            <img class="responsive-img" width="90px" height="100px" src="assets/imagensBanco/<?php echo $dados_sec['foto'] ?>">

                        <?php } ?>
                    </div>
                    <br><br>
                    <div class="input-field col s12 m9 l9">

                        <input name="nome_secretario" id="nome_secretario" type="text" value="<?php echo $dados_sec['nome_secretario'] ?>" readonly class="">
                        <label id="lbl" for="icon_prefix">Nome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m4 l4">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input name="rg" id="rg" value="<?php echo $dados_sec['rg'] ?>" readonly type="tel" class="">
                        <label id="lbl" for="icon_telephone">RG</label>
                    </div>
                    <div class="input-field col s6 m4 l4">
                        <i class="material-icons prefix blue-icon">ballot</i>
                        <input name="cpf" id="cpf" value="<?php echo $dados_sec['cpf'] ?>" readonly type="tel" class="">
                        <label id="lbl" for="icon_telephone">CPF</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m3 l3">
                        <i class="material-icons prefix blue-icon">location_on</i>
                        <input name="cep" id="cep" value="<?php echo $dados_sec['cep'] ?>" readonly type="text" class="">
                        <label id="lbl" for="first_name">CEP</label>
                    </div>
                    <div id="a" class="input-field col s10 m1 l1">
                        <input name="numero" id="numero" value="<?php echo $dados_sec['numero'] ?>" readonly type="tel" class=" ">
                        <label id="lbl" for="first_name">Nº</label>
                    </div>
                    <div id="a" class="input-field col s10 m2 l3">
                        <input name="complemento" id="complemento" value="<?php echo $dados_sec['complemento'] ?>" readonly type="tel" class=" ">
                        <label id="lbl" for="first_name">Complemento</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m4 l4">
                        <i class="material-icons prefix blue-icon">alternate_email</i>
                        <input name="email" id="email" value="<?php echo $dados_sec['email'] ?>" readonly type="tel" class="">
                        <label id="lbl" for="icon_telephone">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l4">
                        <i class="material-icons prefix blue-icon">smartphone</i>
                        <input name="celular" id="celular" value="<?php echo $dados_sec['celular'] ?>" readonly type="tel" data-mask="(00) 00000-0000" class="">
                        <label id="lbl" for="icon_telephone">Celular</label>
                    </div>
                    <div class="input-field col s12 m6 l4">
                        <i class="material-icons prefix blue-icon">call</i>
                        <input name="telefone" id="telefone" value="<?php echo $dados_sec['telefone'] ?>" readonly type="tel" data-mask="(00) 0000-0000" class="">
                        <label id="lbl" for="icon_telephone">Telefone</label>
                    </div>
                    <div>
                        <input type="text" name="tipo_conta" value="3" hidden>
                    </div>
                </div>

                <div class="row">
                    <?php
                    if ($id_tipo_usuario == 2 || $id_tipo_usuario == 3) { ?>
                        <input type="submit" class="btn-flat btnLightBlue center" value="Alterar dados">
                    <?php } ?>
                </div>
        </div>

        </form>
    <?php
            } elseif ($tipo_usuario == "2") {
                $query_dir = $conn->prepare('SELECT * FROM diretor WHERE ID_diretor = ' . $id . '');
                $query_dir->execute();
                $dados_dir = $query_dir->fetch(PDO::FETCH_ASSOC) ?>

        <div class="container col s12 m12 l12 ">
            <div class="container ">
                <form id="adicionarEscola" class="col s12" method="POST" action="alteracaoDados.html.php" enctype="multipart/form-data">
                    <div class="col s12 m12 l12">
                        <div class="row">
                            <div class="input-field col s12 m9 l2">
                                <?php if (empty($dados_sec['foto'])) { ?>

                                    <img class="responsive-img" width="90px" height="100px" src="assets/imagensBanco/usuario.png">

                                <?php } else { ?>

                                    <img class="responsive-img" width="90px" height="100px" src="assets/imagensBanco/<?php echo $dados_sec['foto'] ?>">

                                <?php } ?>
                            </div>
                            <br><br>
                        </div>
                        <div class="input-field col s12 m9 l9">
                            <i class="material-icons prefix blue-icon">account_circle</i>
                            <input id="icon_titulo" type="text" name="nome_diretor" id="nome_diretor" value="<?php echo $dados_dir['nome_diretor'] ?>" readonly class="">
                            <label for="icon_titulo">Nome Diretor</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 m4 l4">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="rg" id="rg" value="<?php echo $dados_dir['rg'] ?>" readonly type="tel" class="">
                            <label id="lbl" for="icon_telephone">RG</label>
                        </div>
                        <div class="input-field col s6 m4 l4">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="cpf" id="cpf" value="<?php echo $dados_dir['cpf'] ?>" readonly type="tel" class="">
                            <label id="lbl" for="icon_telephone">CPF</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m3 l3">
                            <i class="material-icons prefix blue-icon">location_on</i>
                            <input name="cep" id="cep" value="<?php echo $dados_dir['cep'] ?>" readonly type="text" class="">
                            <label id="lbl" for="first_name">CEP</label>
                        </div>
                        <div id="a" class="input-field col s10 m1 l1">
                            <input name="numero" id="numero" value="<?php echo $dados_dir['numero'] ?>" readonly type="tel" class=" ">
                            <label id="lbl" for="first_name">Nº</label>
                        </div>
                        <div id="a" class="input-field col s10 m2 l3">
                            <input name="complemento" id="complemento" value="<?php echo $dados_dor['complemento'] ?>" readonly type="tel" class=" ">
                            <label id="lbl" for="first_name">Complemento</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix blue-icon">alternate_email</i>
                            <input name="email" id="email" value="<?php echo $dados_dir['email'] ?>" readonly type="tel" class="">
                            <label id="lbl" for="icon_telephone">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4">
                            <i class="material-icons prefix blue-icon">smartphone</i>
                            <input name="celular" id="celular" value="<?php echo $dados_dir['celular'] ?>" readonly type="tel" data-mask="(00) 00000-0000" class="">
                            <label id="lbl" for="icon_telephone">Celular</label>
                        </div>
                        <div class="input-field col s12 m6 l4">
                            <i class="material-icons prefix blue-icon">call</i>
                            <input name="telefone" id="telefone" value="<?php echo $dados_dir['telefone'] ?>" readonly type="tel" data-mask="(00) 0000-0000" class="">
                            <label id="lbl" for="icon_telephone">Telefone</label>
                        </div>
                        <div>
                            <input type="text" name="tipo_conta" value="2" hidden>
                        </div>
                    </div>

                    <?php
                    if ($id_tipo_usuario == 2 || $id_tipo_usuario == 3) { ?>
                        <input type="submit" class="btn-flat btnLightBlue center" value="Alterar dados">
                    <?php } ?>
            </div>

            </form>
        </div>


        </div>
    <?php
            }


            include_once 'reqFooter.php' ?>