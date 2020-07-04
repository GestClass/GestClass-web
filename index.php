<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>GestClass - Is Cool Manage</title>
    <link rel="icon" href="assets/icon/logo.png" />

    <!-- Bibliotecas CSS -->
    <link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css" />
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/izimodal/css/iziModal.min.css">
    <link rel="stylesheet" href="node_modules/aos/dist/aos.css">

    <!-- Arquivo CSS -->
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/index.css" />

</head>

<body class="scrollspy grey-text text-darken-4" id="home">

    <header>
        <div class="navbar-fixed">
            <nav class="light-blue lighten-1">
                <div class="container">
                    <div class="nav-wrapper">
                        <a class="brand-logo" href="#home">
                            <i class="fas fa-drafting-compass"></i>
                            <span class="hide-on-med-and-down">GestClass</span>
                        </a>
                        <a data-target="mobile-nav" class="sidenav-trigger">
                            <i class="material-icons">clear_all</i>
                        </a>
                        <ul class="right hide-on-med-and-down">
                            <li>
                                <a href="#planos" class="btnIndexMenu">Planos</a>
                            </li>
                            <li>
                                <a href="#app" class="btnIndexMenu">App</a>
                            </li>
                            <li>
                                <a href="#contato" class="btnIndexMenu">Contato</a>
                            </li>
                            <li>
                                <a href="login.html.php" class="btn-flat btnLight">Login</a>
                            </li>
                        </ul>
                        <ul class="right hide-on-large-only">
                            <li>
                                <a href="login.html.php" class="btnIndexMenu">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <ul class="sidenav" id="mobile-nav">
            <li>
                <a href="#planos" class="waves-effect waves-light">Planos</a>
            </li>
            <li>
                <a href="#app" class="waves-effect waves-light">App</a>
            </li>
            <li>
                <a href="#contato" class="waves-effect waves-light">Contato</a>
            </li>
        </ul>
    </header>

    <div class="section sectionHome">
        <div class="container">
            <div class="row lax" data-lax-translate-y="0 0, 400 -50">
                <div class="col l6 hide-on-med-and-down">
                    <h3>Vamos começar</h3>
                    <p>
                        GestClass é uma plataforma que ajuda o corpo docente escolar a gerenciar o ambiene
                        educacional com mais facilidade
                    </p>
                    <a href="contratacao.html.php" class="btn-flat btn-large btnDark btnHome">
                        Quero fazer parte
                    </a>
                </div>
                <div class="col s12 l6">
                    <img src="./assets/img/home2.svg" class="responsive-img">
                </div>
            </div>
        </div>
    </div>

    <div class="section light-blue lighten-4">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l4" data-aos="fade-right" data-aos-duration="300">
                    <div class="cardHover">
                        <i class="fas fa-cogs fa-4x"></i>
                        <h5>
                            Gestão Escolar
                        </h5>
                        <p>
                            Gerencie cadastros, turmas, faltas e notas. Imprima seus relatórios do seu jeito.
                        </p>
                    </div>
                </div>
                <div class="col s12 m12 l4" data-aos="fade-right" data-aos-duration="600">
                    <div class="cardHover">
                        <i class="far fa-paper-plane fa-4x"></i>
                        <h5>
                            Comunicação direta
                        </h5>
                        <p>
                            Entre em contato direto com o responsável do aluno através de mensagens.
                        </p>
                    </div>
                </div>
                <div class="col s12 m12 l4" data-aos="fade-right" data-aos-duration="900">
                    <div class="cardHover">
                        <i class="fas fa-chalkboard-teacher fa-4x"></i>
                        <h5>
                            Aprendizado Online
                        </h5>
                        <p>
                            Torne sua escola híbrida no aprendizado dos alunos, disponibilize atividades e/ou
                            conteúdos
                            online.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="scrollspy section" id="sobre">
        <div class="container">
            <div class="row">
                <h2>Sobre nós</h2>
                <p class="flow-text textoSobre">
                    A nossa proposta é disponibilizar a escola um sistema web junto com um aplicativo onde
                    venderíamos uma licença de um ano à instituição e se os mesmos quisessem mais funções,
                    essas funções seriam cobradas.
                    O sistema teria as funções básicas que a escola necessita e o diferencial seria a facilidade no
                    acompanhamento da vida escolar dos filhos, a facilidade na comunicação entre pais e escola, e
                    a facilidade do acompanhamento do rendimento dos filhos na escola.
                </p>
            </div>
        </div>
    </div>

    <div class="scrollspy light-blue lighten-4 center section">
        <div class="container">
            <div class="row" data-aos="fade-right" data-aos-duration="1000">
                <div class="col s12">
                    <h3>Siga a GestClass</h3>
                    <p>Siga - nos em nossas redes sociais para ficar por dentro de todas atualizações e notícias</p>
                    <a href="#"><i class="fab iconSocial fa-facebook fa-3x"></i></a>
                    <a href="#"><i class="fab iconSocial fa-linkedin fa-3x"></i></a>
                    <a href="#"><i class="fab iconSocial fa-instagram fa-3x"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="scrollspysection" id="planos">
        <div class="container">
            <div class="row">
                <h2>Planos</h2>
                <div class="col s12 m8 l4 offset-m2 light-blue lighten-5 z-depth-4">
                    <h4>Primário</h4>
                    <ul>
                        <li>
                        </li>
                        <li>R$ <span class="flow-text">1000</span> 00</li>
                        <li>
                            até 250 alunos
                        </li>
                        <li class="center">
                            <a href="contratacao.html.php?plano=primario" class="btn-flat btnDark btnBlock btnPlano">
                                Quero contratar
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col s12 m8 l4 offset-m2 light-blue lighten-4 z-depth-4">
                    <ul>
                        <li>
                            <h4>Fundamental</h4>
                        </li>
                        <li>R$ <span class="flow-text">1750</span> 00</li>
                        <li>
                            até 500 alunos
                        </li>
                        <li class="center">
                            <a href="contratacao.html.php?plano=fundamental" class="btn-flat btnDark btnBlock btnPlano">
                                Quero contratar
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="col s12 m8 l4 offset-m2 light-blue lighten-3 z-depth-4">
                    <ul>
                        <li>
                            <h4>Colegial</h4>
                        </li>
                        <li>R$ <span class="flow-text">3000</span> 00</li>
                        <li>
                            mais de 500 alunos
                        </li>
                        <li class="center">
                            <a href="contratacao.html.php?plano=colegial" class="btn-flat btnDark btnBlock btnPlano">
                                Quero contratar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="scrollspy light-blue lighten-4 section" id="app">
        <div class="container">
            <div class="row">
                <h2 class="">App</h2>
            </div>
        </div>
    </div>

    <div class="scrollspysection" id="contato">
        <div class="container">
            <div class="row">
                <div class="col s12 m6" data-aos="fade-right" data-aos-duration="300">
                    <div class="card-panel z-depth-3">
                        <i class="far fa-envelope fa-3x"></i>
                        <h5>Contate - nos</h5>
                        <p>Envie uma mensagem contendo sua dúvida ou sugestão e responderemos o mais rápido possível.
                        </p>
                    </div>
                    <ul class="collection with-header z-depth-3">
                        <li class="collection-header">
                            <h4>Localização</h4>
                        </li>
                        <li class="collection-item">GestClass Inc.</li>
                        <li class="collection-item">R. Cambará Orli, 866</li>
                        <li class="collection-item">Itaquaquecetuba - SP</li>
                        <li class="collection-item">+55 (11) 4642-2609</li>
                    </ul>
                </div>
                <div class="col s12 m6" data-aos="fade-right" data-aos-duration="600">
                    <div class="card-panel z-depth-3">
                        <form class="" action="php/enviarMensagem/solicitacao.php" method="post">
                            <h4>Por favor preencha este formulário</h4>
                            <div class="input-field">
                                <input type="text" name="nome" placeholder="Nome" class="inputDark" />
                            </div>
                            <div class="input-field">
                                <input type="text" name="assunto" placeholder="Assunto" class="inputDark" />
                            </div>
                            <div class="input-field">
                                <input type="text" name="email" placeholder="Email" class="inputDark" />
                            </div>
                            <div class="input-field">
                                <textarea class="materialize-textarea inputDark" id="mensagemContato"
                                    placeholder="Escreva sua mensagem" maxlength="120" name="mensagem"></textarea>
                            </div>
                            <div class="right-align">
                                <button class="btn btn-flat waves-effect waves-light btnDark" type="submit"
                                    name="action">
                                    Enviar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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
    <script src="node_modules/izimodal/js/iziModal.min.js"></script>
    <script src="node_modules/aos/dist/aos.js"></script>

    <!-- Arquivo JS -->
    <script src="js/index.js"></script>


</body>

</html>
