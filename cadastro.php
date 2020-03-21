<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - A gestão na palma da sua mão</title>
    <link rel="icon" href="assets/icon/logo.png" />

    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/cadastro.css" />


</head>

<body>

    <?php require_once 'reqMenu.php' ?>
   
    <div class="container">
    <form method="POST" action="./controller/cadastro.controller.php">
        <h3>Cadatro do Geral</h3><br>
        <h4>Responsável</h4>
        <div class="scroll">
            <div class="container">
                <div class="input-field col s6">
                    <input id="icon_prefix" type="text" class="validate inputDark">
                    <label for="icon_prefix">Nome</label>
                </div>
                <div class="input-field col s6">
                    <input id="icon_telephone" type="tel" class="validate inputDark">
                    <label for="icon_telephone">Telefone</label>
                </div>
                <div class="input-field col s6">
                    <input id="icon_telephone" type="tel" class="validate inputDark">
                    <label for="icon_telephone">Email</label>
                </div>
                <div class="input-field col s6">
                    <input id="icon_telephone" type="tel" class="validate inputDark">
                    <label for="icon_telephone">RG</label>
                </div>
                <div class="input-field col s6">
                    <input id="icon_telephone" type="tel" class="validate inputDark">
                    <label for="icon_telephone">CPF</label>
                </div>
                <div class="input-field col s6">
                    <input id="icon_telephone" type="tel" class="validate inputDark">
                    <label for="icon_telephone">CEP</label>
                </div>
                <div class="input-field col s6">
                    <input id="icon_telephone" type="tel" class="validate inputDark">
                    <label for="icon_telephone">Rua</label>
                </div>
                <div class="input-field col s6">
                    <input id="icon_telephone" type="tel" class="validate inputDark  ">
                    <label for="icon_telephone">Bairro</label>
                </div>
                <div class="input-field col s6">
                    <input id="icon_telephone" type="tel" class="validate inputDark  ">
                    <label for="icon_telephone">Numero</label>
                </div>
                <div class="input-field col s6">
                    <input id="icon_telephone" type="tel" class="validate inputDark">
                    <label for="icon_telephone">Complemento</label>
                </div>
                <div class="input-field right">
                    <button type="submit" class="btn-flat btnDefaultFormContas">Cadastrar</button>
                </div>
            </div>
            <h3>Aluno</h3>
            <div class="scroll">
                <div class="container">
                    <div class="input-field col s6">
                        <input id="icon_prefix" type="text" class="validate inputDark">
                        <label for="icon_prefix">Nome</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="icon_telephone" type="tel" class="validate inputDark">
                        <label for="icon_telephone">Telefone</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="icon_telephone" type="tel" class="validate inputDark">
                        <label for="icon_telephone">Email</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="icon_telephone" type="tel" class="validate inputDark">
                        <label for="icon_telephone">RG</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="icon_telephone" type="tel" class="validate inputDark">
                        <label for="icon_telephone">CPF</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="icon_telephone" type="tel" class="validate inputDark">
                        <label for="icon_telephone">CEP</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="icon_telephone" type="tel" class="validate inputDark">
                        <label for="icon_telephone">Rua</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="icon_telephone" type="tel" class="validate inputDark">
                        <label for="icon_telephone">Bairro</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="icon_telephone" type="tel" class="validate inputDark">
                        <label for="icon_telephone">Numero</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="icon_telephone" type="tel" class="validate inputDark">
                        <label for="icon_telephone">Complemento</label>
                    </div>
                    <div class="input-field right">
                        <button type="submit" class="btn-flat btnDefaultFormContas">Cadastrar</button>
                    </div>

    </form>


    </div>

    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="js/homeSecretaria.js"></script>
    <script src="js/cadastro.js"></script>

    <script src="js/default.js"></script>

</body>

</html>