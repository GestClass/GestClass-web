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
    <link rel="stylesheet" type="text/css" href="css/cadastroContas.css" />


</head>

<body>

    <?php require_once 'reqHeader.php' ?>

    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3>Contas</h3>
                <ul id="tabs-swipe-demo" class="tabs blue lighten-5 ">
                    <li class="tab col s4"><a href="#aluno">Aluno/Responsável</a></li>
                    <!-- <li class="tab col s4"><a href="#responsavel">Responsável</a></li> -->
                    <li class="tab col s4"><a href="#professor">Professor</a></li>
                    <li class="tab col s4"><a href="#secretaria">Secretaria</a></li>
                </ul>
                <div class="row">
                    <div id="aluno" class="col s12">
                        <form action="php/cadastrarContas.php" method="post" enctype="multipart/form-data">
                            <h4>Aluno</h4>
                            <div class="col s12">
                                <h5>Dados pessoais</h5>
                            </div>
                            <div class="col s12 m6">
                                <div class="input-field">
                                    <img class="materialboxed imagePreview" width="100%" />
                                </div>
                                <div class="file-field ">
                                    <div class="btn-flat btn btnDark btnBlock">
                                        <span>Selecionar foto</span>
                                        <input type="file" onchange="imagePreview()" class="inputFoto" name="foto">
                                    </div>
                                    <div class="descFoto">
                                        <input class="file-path" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="RA" name="ra" type="text" data-mask="0000000-0">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Nome do aluno" name="nomea" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="RG" name="rg" type="text"
                                    data-mask="00.000.000-0">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="CPF" name="cpf" type="text"
                                    data-mask="000.000.000-00">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Data de nascimento" name="nasc" type="text"
                                    data-mask="00/00/0000">
                            </div>
                            <div class="col s12">
                                <h5>Contato</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Email" name="email" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Celular" name="cel" type="text"
                                    data-mask="(00) 00000-0000">
                            </div>
                            <div class="col s12">
                                <h5>Dados da turma</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <select name="ensino">
                                    <option value="" disabled selected>Nível do ensino</option>
                                    <?php
                                        include_once 'php/conexao.php';
                                
                                        $query = $conn->prepare("SELECT ID_tipo_turma AS id, nome_tipo_turma AS tipo FROM tipo_turma");
                                        $query->execute();
                                    ?>
                                    <?php while ($dados = $query->fetch(PDO::FETCH_ASSOC)) {?>
                                    <option value="<?php echo $dados["id"] ?>"><?php echo $dados["tipo"] ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="input-field col s12 m6">
                                <select name="turma">
                                    <option value="" disabled selected>Turma</option>
                                    <?php
                                        $query = $conn->prepare("SELECT ID_turma AS id, nome_turma AS turma FROM turma");
                                        $query->execute();
                                    ?>
                                    <?php while ($dados = $query->fetch(PDO::FETCH_ASSOC)) {?>
                                    <option value="<?php echo $dados["id"] ?>"><?php echo $dados["turma"] ?></option>
                                    <?php }?>
                                </select>
                            </div>




                            <h4>Responsável</h4>

                            <div class="input-field col s12">
                                <p>
                                    <label>
                                        <input name="respSit" type="radio" value="novo" onclick="trocaFormResp(true)"/>
                                        <span>Cadastrar responsável</span>
                                    </label>
                                    <label>
                                        <input name="respSit" type="radio" value="existe" onclick="trocaFormResp(false)"/>
                                        <span>Responsável já cadastrado</span>
                                    </label></p>
                            </div>

                            <div class="existeResp hide">
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Digite o CPF do responsável" name="cpfResp" type="text" data-mask="000.000.000-00">
                                </div>
                            </div>


                            <div class="novoResp hide">
                                <div class="col s12">
                                    <h5>Dados pessoais</h5>
                                </div>
                                
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Nome do responsável" name="nomeResp" type="text">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="RG" name="rgResp" type="text" data-mask="00.000.000-0">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="CPF" name="cpfResp" type="text" data-mask="000.000.000-00">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Data de nascimento" name="nascResp" type="text" data-mask="00/00/0000">
                                </div>
                                <div class="col s12">
                                    <h5>Contato</h5>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Celular" name="celResp" type="text" data-mask="(00) 00000-0000">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Telefone" name="telResp" type="text" data-mask="(00) 0000-0000">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Telefone comercial" name="telcomResp" type="text" data-mask="(00) 0000-0000">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Email" name="emailResp" type="text">
                                </div>
                                <div class="col s12">
                                    <h5>Endereço</h5>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark cepConsulta" placeholder="CEP" name="cepResp" type="text" data-mask="00000-000">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark rua" placeholder="Logradouro" type="text">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Número" name="numResp" type="text">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark bairro" placeholder="Bairro" type="text">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark cidade" placeholder="Cidade" type="text">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark estado" placeholder="Estado" type="text">
                                </div>
                                <div class="input-field col s12 m6">
                                    <input class="inputDark" placeholder="Complemento" name="compResp" type="text">
                                </div>
                            </div>




                            <div class="col s12 right-align">
                                <button type="submit" class="btn-flat btn-large btnDark" name="btnSubmit"
                                    value="aluno">Cadastrar aluno e responsável</button>
                            </div>
                        </form>
                    </div>

                    <!-- <div id="responsavel" class="col s12">
                        <form action="php/cadastrarContas.php" method="post" enctype="multipart/form-data">
                            <h4>Responsável</h4>
                            <div class="col s12">
                                <h5>Dados pessoais</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Nome do responsável" name="nome" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="RG" name="rg" type="text"
                                    data-mask="00.000.000-0">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="CPF" name="cpf" type="text"
                                    data-mask="000.000.000-00">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Data de nascimento" name="nasc" type="text"
                                    data-mask="00/00/0000">
                            </div>
                            <div class="col s12">
                                <h5>Contato</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Celular" name="cel" type="text"
                                    data-mask="(00) 00000-0000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Telefone" name="tel" type="text"
                                    data-mask="(00) 0000-0000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Telefone comercial" name="telcom" type="text"
                                    data-mask="(00) 0000-0000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Email" name="email" type="text">
                            </div>
                            <div class="col s12">
                                <h5>Endereço</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark cepConsulta" placeholder="CEP" name="cep" type="text"
                                    data-mask="00000-000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark rua" placeholder="Logradouro" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Número" name="num" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark bairro" placeholder="Bairro" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark cidade" placeholder="Cidade" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark estado" placeholder="Estado" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Complemento" name="comp" type="text">
                            </div>
                            <div class="col s12 right-align">
                                <button type="submit" class="btn-flat btn-large btnDark" name="btnSubmit"
                                    value="resp">Cadastrar responsável</button>
                            </div>
                        </form>
                    </div> -->

                    <div id="professor" class="col s12">
                        <form action="php/cadastrarContas.php" method="post" enctype="multipart/form-data">
                            <h4>Professor</h4>
                            <div class="col s12">
                                <h5>Dados pessoais</h5>
                            </div>
                            <div class="col s12 m6">
                                <div class="input-field">
                                    <img class="materialboxed imagePreview" width="100%" />
                                </div>
                                <div class="file-field ">
                                    <div class="btn-flat btn btnDark btnBlock">
                                        <span>Selecionar foto</span>
                                        <input type="file" onchange="imagePreview()" class="inputFoto" name="foto">
                                    </div>
                                    <div class="descFoto">
                                        <input class="file-path" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Nome do(a) professor(a)" name="nome" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="RG" name="rg" type="text"
                                    data-mask="00.000.000-0">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="CPF" name="cpf" type="text"
                                    data-mask="000.000.000-00">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Data de nascimento" name="nasc" type="text"
                                    data-mask="00/00/0000">
                            </div>
                            <div class="col s12">
                                <h5>Contato</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Celular" name="cel" type="text"
                                    data-mask="(00) 00000-0000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Telefone" name="tel" type="text"
                                    data-mask="(00) 0000-0000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Email" name="email" type="text">
                            </div>
                            <div class="col s12">
                                <h5>Endereço</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark cepConsulta" placeholder="CEP" name="cep" type="text"
                                    data-mask="00000-000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark rua" placeholder="Logradouro" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Número" name="num" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark bairro" placeholder="Bairro" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark cidade" placeholder="Cidade" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark estado" placeholder="Estado" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Complemento" name="comp" type="text">
                            </div>
                            <div class="col s12 right-align">
                                <button type="submit" class="btn-flat btn-large btnDark" name="btnSubmit"
                                    value="prof">Cadastrar
                                    professor(a)</button>
                            </div>
                        </form>
                    </div>

                    <div id="secretaria" class="col s12">
                        <form action="php/cadastrarContas.php" method="post" enctype="multipart/form-data">
                            <h4>Secretaria</h4>
                            <div class="col s12">
                                <h5>Dados pessoais</h5>
                            </div>
                            <div class="col s12 m6">
                                <div class="input-field">
                                    <img class="materialboxed imagePreview" width="100%" />
                                </div>
                                <div class="file-field ">
                                    <div class="btn-flat btn btnDark btnBlock">
                                        <span>Selecionar foto</span>
                                        <input type="file" onchange="imagePreview()" class="inputFoto" name="foto">
                                    </div>
                                    <div class="descFoto">
                                        <input class="file-path" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Nome do(a) secretário(a)" name="nome" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="RG" name="rg" type="text"
                                    data-mask="00.000.000-0">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="CPF" name="cpf" type="text"
                                    data-mask="000.000.000-00">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Data de nascimento" name="nasc" type="text"
                                    data-mask="00/00/0000">
                            </div>
                            <div class="col s12">
                                <h5>Contato</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Celular" name="cel" type="text"
                                    data-mask="(00) 00000-0000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Telefone" name="tel" type="text"
                                    data-mask="(00) 0000-0000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Email" name="email" type="text">
                            </div>
                            <div class="col s12">
                                <h5>Endereço</h5>
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark cepConsulta" placeholder="CEP" name="cep" type="text"
                                    data-mask="00000-000">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark rua" placeholder="Logradouro" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Número" name="num" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark bairro" placeholder="Bairro" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark cidade" placeholder="Cidade" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark estado" placeholder="Estado" type="text">
                            </div>
                            <div class="input-field col s12 m6">
                                <input class="inputDark" placeholder="Complemento" name="comp" type="text">
                            </div>
                            <div class="col s12 right-align">
                                <button type="submit" class="btn-flat btn-large btnDark" name="btnSubmit"
                                    value="sec">Cadastrar
                                    secretário(a)</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'reqFooter.php' ?>