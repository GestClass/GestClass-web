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
    
    
    $query_alunos = $conn->prepare("SELECT * FROM aluno WHERE fk_id_escola_aluno = 1 AND fk_id_turma_aluno = 16 AND RA = 1");
    $query_alunos->execute();
    $dados_alunos = $query_alunos->fetch(PDO::FETCH_ASSOC)
    
    
    ?>

    <div class="container col s12 m12 l12 ">

        <h5>Dados Pessoais</h5>
        <?php 
            $tipo_usuario = "aluno";
            if($tipo_usuario == "aluno") { ?>
        <form id="aluno" method="POST" action="php/cadastrarAluno.php" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s12 m9 l9">
                    <i class="material-icons prefix blue-icon">account_circle</i>
                    <input name="nome" id="nome_aluno" type="text" value="<?php echo $dados_alunos['nome_aluno']?>" 
                    class="validate " readonly>
                    <label id="lbl" for="first_name">Nome Aluno</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m4 l3">
                    <i class="material-icons prefix blue-icon">cake</i>
                    <input name="data_nascimento" id="data_nascimento" value="<?php echo $dados_alunos['data_nascimento']?>" type="text" class="validate" 
                    data-mask="" readonly>
                    <label id="lbl">Data Nascimento</label>
                </div>
                <div class="input-field col s6 m4 l3">
                    <i class="material-icons prefix blue-icon">ballot</i>
                    <input name="ra" id="RA" placeholder="8956478-9" value=<?php echo $dados_alunos['RA']?> data-mask="0000000-0" type="text" class="validate"
                        readonly>
                    <label id="lbl" for="first_name">RA</label>
                </div>
                <div class="input-field col s6 m4 l3">
                    <i class="material-icons prefix blue-icon">ballot</i>
                    <input name="rg" id="RG" value="<?php echo $dados_alunos['RG']?>" type="tel" class="validate " data-mask="00.000.000-0 readonly>
                    <label id="lbl" for="first_name">RG</label>
                </div>
                <div class="input-field col s6 m6 l4">
                    <i class="material-icons prefix blue-icon">ballot</i>
                    <input name="cpf" id="CPF" value="Teste" type="text" class="validate " readonly>
                    <label id="lbl" for="first_name">CPF</label>
                </div>
                <div class="input-field col s12 m6 l4">
                    <i class="material-icons prefix blue-icon">ballot</i>
                    <input name="cpf_respon" id="CPF" value="Teste" type="text" class="validate " readonly>
                    <label id="lbl" for="first_name">CPF Responsável</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m4 l4">
                    <i class="material-icons prefix blue-icon">alternate_email</i>
                    <input name="email" id="email" value="Teste" type="tel" class="validate " readonly>
                    <label id="lbl" for="first_name">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">smartphone</i>
                    <input name="celular" id="celular" value="Teste" type="tel" data-mask="(00) 00000-0000"
                        class="validate " readonly>
                    <label id="lbl" for="first_name">Celular</label>
                </div>
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix blue-icon">call</i>
                    <input name="telefone" id="telefone" value="Teste" type="tel" data-mask="(00) 0000-0000"
                        class="validate" readonly>
                    <label id="lbl" for="first_name">Telefone</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12 validate">
                    <i class="material-icons prefix blue-icon">school</i>
                    <input name="telefone" id="telefone" type="text" class="validate" value="Teste" readonly>
                    <label id="lbl">Turma</label>
                </div>
            </div>
        </form>
        <?php }
                
                    elseif($tipo_usuario == "responsavel") { ?>
        <div class="container col s12 m12 l12 ">
            <form id="responsavel" method="POST" action="php/cadastrarResponsavel.php" enctype="multipart/form-data">
                <div class="col s12 m12 l12">
                    <div class="row">
                        <div class="input-field col s12 m9 l9">
                            <i class="material-icons prefix blue-icon">account_circle</i>
                            <input name="nome_respon" id="nome_responsavel" type="text" value="Teste" readonly
                                class="validate">
                            <label id="lbl" for="icon_telephone">Nome</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 m4 l4">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="rg_respon" id="rg" type="tel" data-mask="00.000.000-0" value="Teste" readonly
                                class="validate">
                            <label id="lbl" for="icon_telephone">RG</label>
                        </div>
                        <div class="input-field col s6 m4 l4">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="cpf_respon" id="cpf" type="tel" value="Teste" readonly
                                data-mask="000.000.000-00" class="validate">
                            <label id="lbl" for="icon_telephone">CPF</label>
                        </div>
                        <div class="input-field col s6 m4 l4">
                            <i class="material-icons prefix blue-icon">cake</i>
                            <input name="nascimento_respon" id="data_nascimento" value="Teste" readonly type="text"
                                class=" validate">
                            <label id="lbl">Data Nascimento</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m3 l3">
                            <i class="material-icons prefix blue-icon">location_on</i>
                            <input name="cep" id="cep" value="Teste" readonly type="text" class="validate">
                            <label id="lbl" for="first_name">CEP</label>
                        </div>
                        <div id="a" class="input-field col s10 m2 l3">
                            <input id="cidade" value="Teste" readonly type="text" class="validate">
                            <label id="lbl" for="first_name">Cidade</label>
                        </div>
                        <div id="a" class="input-field col s10 m2 l3">
                            <input id="bairro" value="Teste" readonly type="text" class="validate">
                            <label id="lbl" for="first_name">Bairro</label>
                        </div>
                        <div id="a" class="input-field col s10 m2 l4">
                            <input id="rua" value="Teste" readonly type="text" class="validate">
                            <label id="lbl" for="first_name">Rua</label>
                        </div>
                        <div id="a" class="input-field col s10 m1 l3">
                            <input name="numero" id="numero" value="Teste" readonly type="tel" class="validate ">
                            <label id="lbl" for="first_name">Nº</label>
                        </div>
                        <div id="a" class="input-field col s10 m2 l3">
                            <input name="complemento" id="complemento" value="Teste" readonly type="tel"
                                class="validate ">
                            <label id="lbl" for="first_name">Complemento</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m4 l5">
                            <i class="material-icons prefix blue-icon">alternate_email</i>
                            <input name="email_respon" id="email" type="tel" value="Teste" readonly class="validate">
                            <label id="lbl" for="icon_telephone">Email</label>
                        </div>
                        <div class="input-field col s12 m4 l5">
                            <i class="material-icons prefix blue-icon">smartphone</i>
                            <input name="celular_respon" id="celular" type="tel" value="Teste" readonly
                                data-mask="(00) 00000-0000" class="validate">
                            <label id="lbl" for="icon_telephone">Celular</label>
                        </div>
                        <div class="input-field col s12 m4 l5">
                            <i class="material-icons prefix blue-icon">call</i>
                            <input name="telefone_respon" id="telefone" type="tel" value="Teste" readonly
                                data-mask="(00) 0000-0000" class="validate">
                            <label id="lbl" for="icon_telephone">Telefone</label>
                        </div>
                        <div class="input-field col s12 m4 l5">
                            <i class="material-icons prefix blue-icon">call</i>
                            <input name="tel_comercial" id="telefone_comercial" type="tel" value="Teste" readonly
                                data-mask="(00) 0000-0000" class="validate">
                            <label id="lbl" for="icon_telephone">Telefone Comercial</label>
                        </div>
                    </div>
                </div>
            </form>
            <?php } 
            elseif($tipo_usuario == "professor"){?>
            <div class="container col s12 m12 l12 ">
                <form id="professor" method="POST" action="php/cadastrarProfessor.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s12 m9 l9">
                            <i class="material-icons prefix blue-icon">account_circle</i>
                            <input name="nome" id="nome_professor" type="text" value="Teste" readonly class="validate">
                            <label id="lbl" for="icon_prefix">Nome</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 m6 l6">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="rg" id="rg" value="Teste" readonly type="tel" class="validate">
                            <label id="lbl" for="icon_telephone">RG</label>
                        </div>
                        <div class="input-field col s6 m6 l6">
                            <i class="material-icons prefix blue-icon">ballot</i>
                            <input name="cpf" id="cpf" value="Teste" readonly type="tel" class="validate">
                            <label id="lbl" for="icon_telephone">CPF</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m3 l4">
                            <i class="material-icons prefix blue-icon">location_on</i>
                            <input name="cep" id="cep" value="Teste" readonly type="text" class="validate"
                                onblur="pesquisacep(this.value);">
                            <label id="lbl" for="first_name">CEP</label>
                        </div>
                        <div id="a" class="input-field col s10 m2 l4">
                            <input id="cidade" value="Teste" readonly type="text" class="validate">
                            <label id="lbl" for="first_name">Cidade</label>
                        </div>
                        <div id="a" class="input-field col s10 m2 l4">
                            <input id="bairro" value="Teste" readonly type="text" class="validate">
                            <label id="lbl" for="first_name">Bairro</label>
                        </div>
                        <div id="a" class="input-field col s10 m2 l4">
                            <input id="rua" value="Teste" readonly type="text" class="validate">
                            <label id="lbl" for="first_name">Rua</label>
                        </div>
                        <div id="a" class="input-field col s10 m1 l4">
                            <input name="numero" id="numero" value="Teste" readonly type="tel" class="validate ">
                            <label id="lbl" for="first_name">Nº</label>
                        </div>
                        <div id="a" class="input-field col s10 m2 l4">
                            <input name="complemento" id="complemento" value="Teste" readonly type="tel"
                                class="validate ">
                            <label id="lbl" for="first_name">Complemento</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix blue-icon">alternate_email</i>
                            <input name="email" id="email" value="Teste" readonly type="tel" class="validate">
                            <label id="lbl" for="icon_telephone">Email</label>
                        </div>
                        <div class="input-field col s12 m6 l4">
                            <i class="material-icons prefix blue-icon">smartphone</i>
                            <input name="celular" id="celular" value="Teste" readonly type="tel"
                                data-mask="(00) 00000-0000" class="validate">
                            <label id="lbl" for="icon_telephone">Celular</label>
                        </div>
                        <div class="input-field col s12 m6 l4">
                            <i class="material-icons prefix blue-icon">call</i>
                            <input name="telefone" id="telefone" value="Teste" readonly type="tel"
                                data-mask="(00) 0000-0000" class="validate">
                            <label id="lbl" for="icon_telephone">Telefone</label>
                        </div>
                    </div>
                </form>
                <?php } 
            elseif($tipo_usuario == "secretaria"){?>
                <div class="container col s12 m12 l12 ">
                    <form id="secretaria" method="POST" action="php/cadastrarSecretaria.php"
                        enctype="multipart/form-data">
                        <div class="row">

                            <div class="input-field col s12 m9 l9">
                                <i class="material-icons prefix blue-icon">account_circle</i>
                                <input name="nome" id="nome_secretario" type="text" value="Teste" readonly
                                    class="validate">
                                <label id="lbl" for="icon_prefix">Nome</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 m6 l4">
                                <i class="material-icons prefix blue-icon">ballot</i>
                                <input name="rg" id="rg" type="tel" value="Teste" readonly data-mask="00.000.000-0"
                                    class="validate">
                                <label id="lbl" for="icon_telephone">RG</label>
                            </div>
                            <div class="input-field col s6 m6 l4">
                                <i class="material-icons prefix blue-icon">ballot</i>
                                <input name="cpf" id="CPF" type="tel" value="Teste" readonly class="validate">
                                <label id="lbl" for="icon_telephone">CPF</label>
                            </div>
                            <div class="input-field col s12 m4 l4">
                                <i class="material-icons prefix blue-icon">alternate_email</i>
                                <input name="email" id="email" type="tel" value="Teste" readonly class="validate">
                                <label id="lbl" for="icon_telephone">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m3 l4">
                                <i class="material-icons prefix blue-icon">location_on</i>
                                <input name="cep" id="cep" value="Teste" readonly type="text" class="validate"
                                    onblur="pesquisacep(this.value);">
                                <label id="lbl" for="first_name">CEP</label>
                            </div>
                            <div id="a" class="input-field col s10 m2 l4">
                                <input id="cidade" value="Teste" readonly type="text" class="validate">
                                <label id="lbl" for="first_name">Cidade</label>
                            </div>
                            <div id="a" class="input-field col s10 m2 l4">
                                <input id="bairro" value="Teste" readonly type="text" class="validate">
                                <label id="lbl" for="first_name">Bairro</label>
                            </div>
                            <div id="a" class="input-field col s10 m2 l4">
                                <input id="rua" value="Teste" readonly type="text" class="validate">
                                <label id="lbl" for="first_name">Rua</label>
                            </div>
                            <div id="a" class="input-field col s10 m1 l4">
                                <input name="numero" id="numero" value="Teste" readonlytype="tel" class="validate ">
                                <label id="lbl" for="first_name">Nº</label>
                            </div>
                            <div id="a" class="input-field col s10 m2 l4">
                                <input name="complemento" id="complemento" value="Teste" readonly type="tel"
                                    class="validate ">
                                <label id="lbl" for="first_name">Complemento</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix blue-icon">smartphone</i>
                                <input name="celular" id="celular" type="tel" value="Teste" readonly
                                    data-mask="(00) 00000-0000" class="validate">
                                <label id="lbl" for="icon_telephone">Celular</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix blue-icon">call</i>
                                <input name="telefone" id="telefone" type="tel" value="Teste" readonly
                                    data-mask="(00) 0000-0000" class="validate">
                                <label id="lbl" for="icon_telephone">Telefone</label>
                            </div>
                        </div>
                    </form>
                    <?php } 
                        elseif($tipo_usuario == "diretor") { ?>

                    <div class="container ">
                        <form id="adicionarEscola" class="col s12" method="POST" action="php/cadastrarDiretor.php"
                            enctype="multipart/form-data">
                            <div class="col s12 m12 l12">
                                <div class="row">
                                </div>
                                <div class="input-field col s12 m9 l9">
                                    <i class="material-icons prefix blue-icon">account_circle</i>
                                    <input id="icon_titulo" type="text" name="nome_diretor" id="nome_diretor"
                                        value="Teste" readonly class="validate">
                                    <label for="icon_titulo">Nome Diretor</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6 m6 l4">
                                    <i class="material-icons prefix blue-icon">ballot</i>
                                    <input name="rg" id="rg" type="tel" value="Teste" readonly class="validate">
                                    <label id="lbl" for="icon_telephone">RG</label>
                                </div>
                                <div class="input-field col s6 m6 l4">
                                    <i class="material-icons prefix blue-icon">ballot</i>
                                    <input name="cpf" id="CPF" type="tel" value="Teste" readonly class="validate">
                                    <label id="lbl" for="icon_telephone">CPF</label>
                                </div>
                                <div class="input-field col s12 m4 l4">
                                    <i class="material-icons prefix blue-icon">alternate_email</i>
                                    <input name="email" id="email" type="tel" value="Teste" readonly class="validate">
                                    <label id="lbl" for="icon_telephone">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m4 l4">
                                    <i class="material-icons prefix blue-icon">location_on</i>
                                    <input name="cep" id="cep" value="Teste" readonly type="text" class="validate">
                                    <label id="lbl" for="first_name">CEP</label>
                                </div>
                                <div id="a" class="input-field col s10 m4 l4">
                                    <input id="cidade" value="Teste" readonly type="text" class="validate">
                                    <label id="lbl" for="first_name">Cidade</label>
                                </div>
                                <div id="a" class="input-field col s10 m4 l4">
                                    <input id="bairro" value="Teste" readonly type="text" class="validate">
                                    <label id="lbl" for="first_name">Bairro</label>
                                </div>
                                <div id="a" class="input-field col s10 m4 l4">
                                    <input id="rua" value="Teste" readonly type="text" class="validate">
                                    <label id="lbl" for="first_name">Rua</label>
                                </div>
                                <div id="a" class="input-field col s10 m2 l4">
                                    <input name="numero" id="numero" value="Teste" readonly type="tel"
                                        class="validate ">
                                    <label id="lbl" for="first_name">Nº</label>
                                </div>
                                <div id="a" class="input-field col s10 m6 l4">
                                    <input name="complemento" id="complemento" value="Teste" readonly type="tel"
                                        class="validate ">
                                    <label id="lbl" for="first_name">Complemento</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix blue-icon">smartphone</i>
                                    <input name="celular" id="celular" type="tel" value="Teste" readonly
                                        class="validate">
                                    <label id="lbl" for="icon_telephone">Celular</label>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix blue-icon">call</i>
                                    <input name="telefone" id="telefone" type="tel" value="Teste" readonly
                                        class="validate">
                                    <label id="lbl" for="icon_telephone">Telefone</label>
                                </div>
                            </div>

                    </div>
                    </form>
                </div>


            </div>
            <?php }?>


            <?php include_once 'reqFooter.php'?>