<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - Is Cool Manage</title>
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
                        <input type="number" placeholder="Quantidade de alunos" class="inputDark" />
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="text" placeholder="Nome do(a) diretor(a)" class="inputDark" />
                    </div>
                    <div class="input-field col s12">
                        <textarea class="materialize-textarea inputDark" id="mensagemContato" placeholder="Escreva sua mensagem" maxlength="120"></textarea>
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
    <br><br>
    <footer class="light-blue lighten-1 white-text center section" style="margin-top: 0.62%;">
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
    <script>
        // pegar o parametro que vem da URL
        window.onload = CapturaParametrosUrl()

        function CapturaParametrosUrl() {
            var url = window.location.href
            var res = url.split('?')
            if (res[1] !== undefined) {
                captura = res[1].split('=')
                let parametroEncontrado = captura[0]
                let valorParametro = captura[1]
                // let select = $('.selectPlanos')
                if (valorParametro === 'primario') {
                    $('.selectPlanos').val('1')
                } else if (valorParametro === 'fundamental') {
                    $('.selectPlanos').val('2')
                } else {
                    $('.selectPlanos').val('3')
                }
            }

        }
        // Sidenav
        const sideNav = document.querySelector('.sidenav')
        M.Sidenav.init(sideNav, {})

        // modal
        const modal = document.querySelector('.modal')
        M.Modal.init(modal, {})

        // select
        $(document).ready(function() {
            $('select').formSelect()
        })
    </script>


</body>

</html>