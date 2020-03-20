<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - A gestão na palma da sua mão</title>
    <link rel="icon" href="assets/icon/compass_white.png" />

    <!-- Bibliotecas CSS -->
    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Arquivo CSS -->
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/contratacao.css" />

</head>

<body class="scrollspy" id="home">

    <header>
        <div class="navbar-fixed ">
            <nav class="light-blue lighten-1">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="index.php" class="brand-logo center">
                            <i class="fas fa-drafting-compass"></i> 
                            <span class="hide-on-med-and-down">GestClass</span>
                        </a>
                        <a href="index.php">
                            <i class="material-icons">keyboard_return</i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="secao">
        <div class="container">
            <div class="row center">
                <form class="grey-text text-darken-4">
                    <h2 class="">Formulário de contratação</h2>
                    <div class="input-field col s12 m6">
                        <input type="text" placeholder="Nome da escola" class="inputDark" />
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="text" placeholder="Nome do(a) diretor(a)" class="inputDark" />
                    </div>
                    <div class="input-field col s12 m6">
                        <select class="selectPlanos">
                            <option value="" disabled selected>Selecione um plano</option>
                            <option value="1">Plano primário - R$ 1000 00</option>
                            <option value="2">Plano fundamental - R$ 1750 00</option>
                            <option value="3">Plano colegial - R$ 3000 00</option>
                        </select>
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="text" placeholder="Nome do(a) diretor(a)" class="inputDark" />
                    </div>
                    <div class="input-field col s12">
                        <textarea class="materialize-textarea inputDark" id="mensagemContato" placeholder="Escreva sua mensagem"
                            maxlength="120"></textarea>
                        <span class="helper-text red-text" id="spanMensagemContato"></span>
                    </div>
                    <div class="input-field right-align col s12">
                        <button type="submit" class="btn-flat btn-large btnDark">
                            Enviar mensagem <i class="far fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="light-blue lighten-1 white-text center section">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <p class="flow-text">
                        GestClass &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        | Todos os direitos reservados
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bibliotecas JS -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="node_modules/lax.js/lib/lax.min.js"></script>
    <script src="node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>

    <!-- Arquivo JS -->
    <script src="js/contratacao.js"></script>


</body>

</html>