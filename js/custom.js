// JS CADASTRO

$(document).ready(function() {
    $('.tabs').tabs({
        swipeable: false, //função para arrastar para o lado
        responsiveThreshold: 700
    });
});

// CALENDARIO MATERIALIZE
$('.datepicker').datepicker({
    i18n: {
        months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
        weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
        weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
        today: 'Hoje',
        clear: 'Limpar',
        cancel: 'Sair',
        done: 'Confirmar',
        labelMonthNext: 'Próximo mês',
        labelMonthPrev: 'Mês anterior',
        labelMonthSelect: 'Selecione um mês',
        labelYearSelect: 'Selecione um ano',
        selectMonths: true,
        selectYears: 15,
    },
    format: 'yyyy-mm-dd',
    container: 'body'
});


// HOME SECRETARIA
$(document).ready(function() {
    $('.sidenav').sidenav();
});

$('.dropdown-trigger').dropdown();

$(document).ready(function() {
    $('.modal').modal();
});

$(document).ready(function() {
    $('select').formSelect();
});

$(".formContas").hide();

function habilitaForm() {
    //alert($("#selectConta")[0].selectedIndex)

    $(".formContas").hide();

}




// INICIO PERFIL

// image preview
$(".inputFoto").change(function() {
    imagePreview(this);
});

function imagePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.imagePreview').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// ver senha
function verSenha() {
    $('.btnVerSenha').toggleClass("fa-eye fa-eye-slash");;
    if ($('.senhaPerfil').attr("type") == "password") {
        $('.senhaPerfil').attr("type", "text");
    } else {
        $('.senhaPerfil').attr("type", "password");
    }
}

// verifica a quantidade de caracteres no campo senha
function contagemCarac() {
    var x = $(".senhaPerfil").val();
    var n = x.length;
    if (n < 4) {
        document.getElementById('spanSenha').innerHTML = "A senha deve conter no mínimo 4 caracteres";
    } else {
        document.getElementById('spanSenha').innerHTML = "";
    }
}

// FIM PERFIL



//Modal de cadastro de contas
$(document).ready(function() {
    $('.sidenav').sidenav();
});

$('.dropdown-trigger').dropdown();

$(document).ready(function() {
    $('.modal').modal();
});

$(document).ready(function() {
    $('select').formSelect();
});

$(".formContas").hide();


function habilitaForm() {
    //alert($("#selectConta")[0].selectedIndex)

    if ($("#selectConta")[0].selectedIndex === 1) {
        $(".formContas").hide();
        window.location.href = ('cadastroResponsavel.html.php');
    } else if ($("#selectConta")[0].selectedIndex === 2) {
        $(".formContas").hide();
        window.location.href = ('cadastroAluno.html.php')
    } else if ($("#selectConta")[0].selectedIndex === 3) {
        window.location.href = ('cadastroProfessor.html.php')
    } else {
        $(".formContas").hide();
        window.location.href = ('cadastroSecretaria.html.php')
    }
}

//Fim

//modal boletim
$(document).ready(function() {
    $('.sidenav').sidenav();
});

$('.dropdown-trigger').dropdown();

$(document).ready(function() {
    $('.modal').modal();
});

$(document).ready(function() {
    $('select').formSelect();
});

$(".formTurmas").hide();

// function pegarId() {

//     $(".formTurmas").hide();

//     $("#selectTurma").on("change", function pegarId() {
//         var idTurma = $("#selectTurma").val();
//         //alert(idTurma);

//         if ($("#selectTurma")[0].selectedIndex === 0) {
//             //   $('#turminha').show(500)
//             $(".formTurmas").hide();
//         } else {
//             $('#turminha').show(500)
//         }
//     });

//     $.ajax({
//         url: 'homeProfessor.html.php',
//         type: 'POST',
//         data: { id_turmajs: idTurma },
//         beforeSend: function() {

//         },
//         success: function(data) {
//             $("disciplinas_professor").html("Carregando...");
//         },
//         error: function() {
//             $("disciplinas_professor").html("Houve um erro ao carregar...");
//         }

//     });


// }
//fim


//modal mensagens Professor
$(document).ready(function() {
    $('.modal').modal();
});

$(document).ready(function() {
    $('.sidenav').sidenav();
});

$('.dropdown-trigger').dropdown();

$(document).ready(function() {
    $('.modal').modal();
});

$(document).ready(function() {
    $('select').mensagemProf();
});

$(".formAlunoProfessor").hide();
$(".formSecretariaProfessor").hide();
$(".formProfessorEnviar").hide();
$(".formDiretorProfessor").hide();

function formProf() {

    $(".formAlunoProfessor").hide();
    $(".formSecretariaProfessor").hide();
    $(".formProfessorEnviar").hide();
    $(".formDiretorProfessor").hide();


    if ($("#mensagemProf")[0].selectedIndex === 1) {
        $('#formAlunoProfessor').show(500);
        $(".formSecretariaProfessor").hide();
        $(".formProfessorEnviar").hide();
        $(".formDiretorProfessor").hide();
    } else if ($("#mensagemProf")[0].selectedIndex === 2) {
        $('#formSecretariaProfessor').show(500);
        $(".formAlunoProfessor").hide();
        $(".formProfessorEnviar").hide();
        $(".formDiretorProfessor").hide();
    } else if ($("#mensagemProf")[0].selectedIndex === 3) {
        $('#formProfessorEnviar').show(500);
        $(".formAlunoProfessor").hide();
        $(".formSecretariaProfessor").hide();
        $(".formDiretorProfessor").hide();
    } else {
        $('#formDiretorProfessor').show(500);
        $(".formAlunoProfessor").hide();
        $(".formSecretariaProfessor").hide();
        $(".formProfessorEnviar").hide();
    }
}
//fim


//modal mensagens Secretaria

$(document).ready(function() {
    $('.modal').modal();
});

$(document).ready(function() {
    $('.sidenav').sidenav();
});

$('.dropdown-trigger').dropdown();

$(document).ready(function() {
    $('.modal').modal();
});

$(document).ready(function() {
    $('select').mensagemSecretaria();
});

$(".formAlunoSecretaria").hide();
$(".formResponsavelSecretaria").hide();
$(".escolaGeralSecretaria").hide();
$(".formProfessorSecretaria").hide();
$(".formDiretorSecretaria").hide();

function formSecretaria() {

    $(".formAlunoSecretaria").hide();
    $(".formResponsavelSecretaria").hide();
    $(".escolaGeralSecretaria").hide();
    $(".formProfessorSecretaria").hide();
    $(".formDiretorSecretaria").hide();


    if ($("#mensagemSecretaria")[0].selectedIndex === 1) {
        $('#formAlunoSecretaria').show(500);
        $(".escolaGeralSecretaria").hide();
        $(".formProfessorSecretaria").hide();
        $(".formDiretorSecretaria").hide();
        $(".formResponsavelSecretaria").hide();
    } else if ($("#mensagemSecretaria")[0].selectedIndex === 2) {
        $('#formResponsavelSecretaria').show(500);
        $(".formAlunoSecretaria").hide();
        $(".escolaGeralSecretaria").hide();
        $(".formDiretorSecretaria").hide();
        $(".formProfessorSecretaria").hide();
    } else if ($("#mensagemSecretaria")[0].selectedIndex === 3) {
        $('#formProfessorSecretaria').show(500);
        $(".formAlunoSecretaria").hide();
        $(".escolaGeralSecretaria").hide();
        $(".formDiretorSecretaria").hide();
        $(".formResponsavelSecretaria").hide();
    } else if ($("#mensagemSecretaria")[0].selectedIndex === 4) {
        $('#formDiretorSecretaria').show(500);
        $(".formAlunoSecretaria").hide();
        $(".escolaGeralSecretaria").hide();
        $(".formProfessorSecretaria").hide();
        $(".formResponsavelSecretaria").hide();
    } else {
        $('#escolaGeralSecretaria').show(500);
        $(".formAlunoSecretaria").hide();
        $(".formProfessorSecretaria").hide();
        $(".formDiretorSecretaria").hide();
        $(".formResponsavelSecretaria").hide();
    }
}
//fim

//modal mensagens Diretor


$(document).ready(function() {
    $('.modal').modal();
});

$(document).ready(function() {
    $('.sidenav').sidenav();
});

$('.dropdown-trigger').dropdown();

$(document).ready(function() {
    $('.modal').modal();
});

$(document).ready(function() {
    $('select').mensagemDiretor();
});

$(".formAlunoDiretor").hide();
$(".formProfessorDiretor").hide();
$(".formResponsavelDiretor").hide();
$(".formSecretariaDiretor").hide();
$(".escolaGeralDiretor").hide();

function formDiretor() {

    $(".formAlunoDiretor").hide();
    $(".formProfessorDiretor").hide();
    $(".formResponsavelDiretor").hide();
    $(".formSecretariaDiretor").hide();
    $(".escolaGeralDiretor").hide();


    if ($("#mensagemDiretor")[0].selectedIndex === 1) {
        $('#formAlunoDiretor').show(500);
        $(".escolaGeralDiretor").hide();
        $(".formProfessorDiretor").hide();
        $(".formResponsavelDiretor").hide();
        $(".formSecretariaDiretor").hide();
    } else if ($("#mensagemDiretor")[0].selectedIndex === 2) {
        $('#formProfessorDiretor').show(500);
        $(".formAlunoDiretor").hide();
        $(".escolaGeralDiretor").hide();
        $(".formResponsavelDiretor").hide();
        $(".formSecretariaDiretor").hide();
    } else if ($("#mensagemDiretor")[0].selectedIndex === 3) {
        $('#formResponsavelDiretor').show(500);
        $(".formAlunoDiretor").hide();
        $(".escolaGeralDiretor").hide();
        $(".formProfessorDiretor").hide();
        $(".formSecretariaDiretor").hide();
    } else if ($("#mensagemDiretor")[0].selectedIndex === 4) {
        $('#formSecretariaDiretor').show(500);
        $(".formAlunoDiretor").hide();
        $(".escolaGeralDiretor").hide();
        $(".formProfessorDiretor").hide();
        $(".formResponsavelDiretor").hide();
    } else {
        $('#escolaGeralDiretor').show(500);
        $(".formAlunoDiretorDiretor").hide();
        $(".formProfessorDiretor").hide();
        $(".formResponsavelDiretor").hide();
        $(".formSecretariaDiretor").hide();
    }
}

//fim