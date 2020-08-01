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
    format: 'dd/mm/yyyy',
    container: 'body'
});

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

//modal envio material prof e diretor
$(document).ready(function() {
    $('select').opcProf();
});

$(".formAluno").hide();
$(".formTurma").hide();

function formMaterialApoio() {

    $(".formAluno").hide();
    $(".formTurma").hide();

    if ($("#opcProf")[0].selectedIndex === 1) {
        $('#formTurma').show(500);
        $(".formAluno").hide();
    } else {
        $('#formAluno').show(500);
        $(".formTurma").hide();
    }
}

$(document).ready(function() {
    $('select').opcDiretor();
});

$(".formAlunoDiretor").hide();
$(".formTurmaDiretor").hide();

function formMaterialApoioDiretor() {

    $(".formAlunoDiretor").hide();
    $(".formTurmaDiretor").hide();

    if ($("#opcDiretor")[0].selectedIndex === 1) {
        $('#formTurmaDiretor').show(500);
        $(".formAlunoDiretor").hide();
    } else {
        $('#formAlunoDiretor').show(500);
        $(".formTurmaDiretor").hide();
    }
}

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

//Ativa o auto-complete
// $(document).ready(function() {
//     $('input.autocomplete').autocomplete({
//         data: {
//             "Apple": null,
//             "Microsoft": null,
//             "Google": 'https://placehold.it/250x250'
//         },
//     });
// });