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


// // HOME SECRETARIA
// $(document).ready(function() {
//     $('.sidenav').sidenav();
// });

// $('.dropdown-trigger').dropdown();

// $(document).ready(function() {
//     $('.modal').modal();
// });

// $(document).ready(function() {
//     $('select').formSelect();
// });

// $(".formContas").hide();

// function habilitaForm() {
//     //alert($("#selectConta")[0].selectedIndex)

//     $(".formContas").hide();

// }




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

//modal mensagens Diretor

// $(document).ready(function() {
//     $('select').mensagemDiretor();
// });

// //alunos
// $(".formTodasTurmasDiretor").hide();
// $(".formUmaTurmaDiretor").hide();
// $(".formUmAlunoDiretor").hide();

// //professor
// $(".formTodosProfessoresDiretor").hide();
// $(".formUmProfessorDiretor").hide();

// //responsavel
// $(".formTodosResponsavelDiretor").hide();
// $(".formUmResponsavelDiretor").hide();

// //secretaria
// $(".formSecretariaDiretor").hide();

// //toda escola
// $(".formEscolaGeralDiretor").hide();


// function formDiretor() {
//     //alunos
//     $(".formTodasTurmasDiretor").hide();
//     $(".formUmaTurmaDiretor").hide();
//     $(".formUmAlunoDiretor").hide();

//     //professor
//     $(".formTodosProfessoresDiretor").hide();
//     $(".formUmProfessorDiretor").hide();

//     //responsavel
//     $(".formTodosResponsavelDiretor").hide();
//     $(".formUmResponsavelDiretor").hide();

//     //secretaria
//     $(".formSecretariaDiretor").hide();

//     //toda escola
//     $(".formEscolaGeralDiretor").hide();


//     if ($("#mensagemDiretor")[0].selectedIndex === 1) {
//         //vai chamar esse form
//         $('#formTodasTurmasDiretor').show(500);
//         //esconder esses forms
//         $(".formEscolaGeralDiretor").hide();
//         $(".formTodosProfessoresDiretor").hide();
//         $(".formResponsavelDiretor").hide();
//         $(".formSecretariaDiretor").hide();
//         $(".formUmaTurmaDiretor").hide();
//         $(".formUmAlunoDiretor").hide();
//         $(".formUmProfessorDiretor").hide();
//         $(".formTodosResponsavelDiretor").hide();
//         $(".formUmResponsavelDiretor").hide();

//     } else if ($("#mensagemDiretor")[0].selectedIndex === 2) {
//         //vai chamar esse form
//         $('#formUmaTurmaDiretor').show(500);
//         //esconder esses forms
//         $(".formTodasTurmasDiretor").hide();
//         $(".formTodosProfessoresDiretor").hide();
//         $(".formEscolaGeralDiretor").hide();
//         $(".formResponsavelDiretor").hide();
//         $(".formSecretariaDiretor").hide();
//         $(".formUmAlunoDiretor").hide();
//         $(".formUmProfessorDiretor").hide();
//         $(".formTodosResponsavelDiretor").hide();
//         $(".formUmResponsavelDiretor").hide();

//     } else if ($("#mensagemDiretor")[0].selectedIndex === 3) {
//         //vai chamar esse form
//         $('#formUmAlunoDiretor').show(500);
//         //esconder esses forms
//         $(".formTodasTurmasDiretor").hide();
//         $(".formEscolaGeralDiretor").hide();
//         $(".formTodosProfessoresDiretor").hide();
//         $(".formSecretariaDiretor").hide();
//         $(".formUmaTurmaDiretor").hide();
//         $(".formResponsavelDiretor").hide();
//         $(".formUmProfessorDiretor").hide();
//         $(".formTodosResponsavelDiretor").hide();
//         $(".formUmResponsavelDiretor").hide();

//     } else if ($("#mensagemDiretor")[0].selectedIndex === 4) {
//         //vai chamar esse form
//         $('#formTodosProfessoresDiretor').show(500);
//         //esconder esses forms
//         $(".formTodasTurmasDiretor").hide();
//         $(".formEscolaGeralDiretor").hide();
//         $(".formResponsavelDiretor").hide();
//         $(".formSecretariaDiretor").hide();
//         $(".formUmaTurmaDiretor").hide();
//         $(".formUmAlunoDiretor").hide();
//         $(".formUmProfessorDiretor").hide();
//         $(".formTodosResponsavelDiretor").hide();
//         $(".formUmResponsavelDiretor").hide();

//     } else if ($("#mensagemDiretor")[0].selectedIndex === 5) {
//         //vai chamar esse form
//         $('#formUmProfessorDiretor').show(500);
//         //esconder esses forms
//         $(".formTodasTurmasDiretor").hide();
//         $(".formEscolaGeralDiretor").hide();
//         $(".formTodosProfessoresDiretor").hide();
//         $(".formSecretariaDiretor").hide();
//         $(".formResponsavelDiretor").hide();
//         $(".formUmaTurmaDiretor").hide();
//         $(".formUmAlunoDiretor").hide();
//         $(".formTodosResponsavelDiretor").hide();
//         $(".formUmResponsavelDiretor").hide();

//     } else if ($("#mensagemDiretor")[0].selectedIndex === 6) {
//         //vai chamar esse form
//         $('#formTodosResponsavelDiretor').show(500);
//         //esconder esses forms
//         $(".formTodasTurmasDiretor").hide();
//         $(".formEscolaGeralDiretor").hide();
//         $(".formTodosProfessoresDiretor").hide();
//         $(".formSecretariaDiretor").hide();
//         $(".formUmProfessorDiretor").hide();
//         $(".formUmaTurmaDiretor").hide();
//         $(".formUmAlunoDiretor").hide();
//         $(".formUmResponsavelDiretor").hide();

//     } else if ($("#mensagemDiretor")[0].selectedIndex === 7) {
//         //vai chamar esse form
//         $('#formUmResponsavelDiretor').show(500);
//         //esconder esses forms
//         $(".formTodasTurmasDiretor").hide();
//         $(".formEscolaGeralDiretor").hide();
//         $(".formTodosProfessoresDiretor").hide();
//         $(".formSecretariaDiretor").hide();
//         $(".formUmProfessorDiretor").hide();
//         $(".formUmaTurmaDiretor").hide();
//         $(".formUmAlunoDiretor").hide();
//         $(".formTodosResponsavelDiretor").hide();

//     } else if ($("#mensagemDiretor")[0].selectedIndex === 8) {
//         //vai chamar esse form
//         $('#formSecretariaDiretor').show(500);
//         //esconder esses forms
//         $(".formTodasTurmasDiretor").hide();
//         $(".formEscolaGeralDiretor").hide();
//         $(".formTodosProfessoresDiretor").hide();
//         $(".formUmResponsavelDiretor").hide();
//         $(".formUmProfessorDiretor").hide();
//         $(".formUmaTurmaDiretor").hide();
//         $(".formUmAlunoDiretor").hide();
//         $(".formTodosResponsavelDiretor").hide();

//     } else {
//         //vai chamar esse form
//         $('#formEscolaGeralDiretor').show(500);
//         //esconder esses forms
//         $(".formTodasTurmasDiretorDiretor").hide();
//         $(".formTodosProfessoresDiretor").hide();
//         $(".formResponsavelDiretor").hide();
//         $(".formSecretariaDiretor").hide();
//         $(".formUmaTurmaDiretor").hide();
//         $(".formUmAlunoDiretor").hide();
//         $(".formUmProfessorDiretor").hide();
//         $(".formTodosResponsavelDiretor").hide();
//     }
// }

// //fim

// //modal mensagens Professor

// $(document).ready(function() {
//     $('select').mensagemProf();
// });

// //aluno
// $(".formTodasTurmasProfessor").hide();
// $(".formUmaTurmaProfessor").hide();
// $(".formUmAlunoProfessor").hide();
// //professor
// $(".formTodosProfessores").hide();
// $(".formUmProfessor").hide();
// //secretaria
// $(".formSecretariaProfessor").hide();
// //diretor
// $(".formDiretorProfessor").hide();

// function formProf() {
//     //aluno
//     $(".formTodasTurmasProfessor").hide();
//     $(".formUmaTurmaProfessor").hide();
//     $(".formUmAlunoProfessor").hide();
//     //professor
//     $(".formTodosProfessores").hide();
//     $(".formUmProfessor").hide();
//     //secretaria
//     $(".formSecretariaProfessor").hide();
//     //diretor
//     $(".formDiretorProfessor").hide();


//     if ($("#mensagemProf")[0].selectedIndex === 1) {

//         $('#formTodasTurmasProfessor').show(500);
//         $(".formSecretariaProfessor").hide();
//         $(".formDiretorProfessor").hide();
//         $(".formUmaTurmaProfessor").hide();
//         $(".formUmAlunoProfessor").hide();
//         $(".formTodosProfessores").hide();
//         $(".formUmProfessor").hide();

//     } else if ($("#mensagemProf")[0].selectedIndex === 2) {

//         $('#formUmaTurmaProfessor').show(500);
//         $(".formTodasTurmasProfessor").hide();
//         $(".formTodosProfessores").hide();
//         $(".formDiretorProfessor").hide();
//         $(".formSecretariaProfessor").hide();
//         $(".formUmAlunoProfessor").hide();
//         $(".formUmProfessor").hide();

//     } else if ($("#mensagemProf")[0].selectedIndex === 3) {

//         $('#formUmAlunoProfessor').show(500);
//         $(".formAlunoProfessor").hide();
//         $(".formSecretariaProfessor").hide();
//         $(".formDiretorProfessor").hide();
//         $(".formUmaTurmaProfessor").hide();
//         $(".formTodosProfessores").hide();
//         $(".formUmProfessor").hide();

//     } else if ($("#mensagemProf")[0].selectedIndex === 4) {

//         $('#formTodosProfessores').show(500);
//         $(".formAlunoProfessor").hide();
//         $(".formSecretariaProfessor").hide();
//         $(".formDiretorProfessor").hide();
//         $(".formUmaTurmaProfessor").hide();
//         $(".formUmAlunoProfessor").hide();
//         $(".formUmProfessor").hide();

//     } else if ($("#mensagemProf")[0].selectedIndex === 5) {

//         $('#formUmProfessor').show(500);
//         $(".formAlunoProfessor").hide();
//         $(".formSecretariaProfessor").hide();
//         $(".formDiretorProfessor").hide();
//         $(".formUmaTurmaProfessor").hide();
//         $(".formUmAlunoProfessor").hide();
//         $(".formTodosProfessores").hide();

//     } else if ($("#mensagemProf")[0].selectedIndex === 6) {

//         $('#formSecretariaProfessor').show(500);
//         $(".formAlunoProfessor").hide();
//         $(".formUmProfessor").hide();
//         $(".formDiretorProfessor").hide();
//         $(".formUmaTurmaProfessor").hide();
//         $(".formUmAlunoProfessor").hide();
//         $(".formTodosProfessores").hide();

//     } else {

//         $('#formDiretorProfessor').show(500);
//         $(".formTodasTurmasProfessor").hide();
//         $(".formSecretariaProfessor").hide();
//         $(".formTodosProfessores").hide();
//         $(".formUmaTurmaProfessor").hide();
//         $(".formUmAlunoProfessor").hide();
//         $(".formUmProfessor").hide();

//     }
// }
// //fim


// //modal mensagens Secretaria

// $(document).ready(function() {
//     $('select').mensagemSecretaria();
// });

// //aluno
// $(".formTodasTurmasSecretaria").hide();
// $(".formUmaTurmaSecretaria").hide();
// $(".formUmAlunoSecretaria").hide();
// //responsavel
// $(".formTodosResponsaveisSecretaria").hide();
// $(".formUmResponsavelSecretaria").hide();
// //professor
// $(".formTodosProfessoresSecretaria").hide();
// $(".formUmProfessorSecretaria").hide();
// //diretor
// $(".formDiretorSecretaria").hide();
// //escola geral
// $(".formEscolaGeralSecretaria").hide();

// function formSecretaria() {

//     //aluno
//     $(".formTodasTurmasSecretaria").hide();
//     $(".formUmaTurmaSecretaria").hide();
//     $(".formUmAlunoSecretaria").hide();
//     //responsavel
//     $(".formTodosResponsaveisSecretaria").hide();
//     $(".formUmResponsavelSecretaria").hide();
//     //professor
//     $(".formTodosProfessoresSecretaria").hide();
//     $(".formUmProfessorSecretaria").hide();
//     //diretor
//     $(".formDiretorSecretaria").hide();
//     //escola geral
//     $(".formEscolaGeralSecretaria").hide();


//     if ($("#mensagemSecretaria")[0].selectedIndex === 1) {

//         $('#formTodasTurmasSecretaria').show(500);
//         $(".formUmaTurmaSecretaria").hide();
//         $(".formUmAlunoSecretaria").hide();
//         $(".formTodosResponsaveisSecretaria").hide();
//         $(".formUmResponsavelSecretaria").hide();
//         $(".formTodosProfessoresSecretaria").hide();
//         $(".formUmProfessorSecretaria").hide();
//         $(".formDiretorSecretaria").hide();
//         $(".formEscolaGeralSecretaria").hide();

//     } else if ($("#mensagemSecretaria")[0].selectedIndex === 2) {

//         $('#formUmaTurmaSecretaria').show(500);
//         $(".formTodasTurmasSecretaria").hide();
//         $(".formUmAlunoSecretaria").hide();
//         $(".formTodosResponsaveisSecretaria").hide();
//         $(".formUmResponsavelSecretaria").hide();
//         $(".formTodosProfessoresSecretaria").hide();
//         $(".formUmProfessorSecretaria").hide();
//         $(".formDiretorSecretaria").hide();
//         $(".formEscolaGeralSecretaria").hide();

//     } else if ($("#mensagemSecretaria")[0].selectedIndex === 3) {

//         $('#formUmAlunoSecretaria').show(500);
//         $(".formTodasTurmasSecretaria").hide();
//         $(".formUmaTurmaSecretaria").hide();
//         $(".formTodosResponsaveisSecretaria").hide();
//         $(".formUmResponsavelSecretaria").hide();
//         $(".formTodosProfessoresSecretaria").hide();
//         $(".formUmProfessorSecretaria").hide();
//         $(".formDiretorSecretaria").hide();
//         $(".formEscolaGeralSecretaria").hide();

//     } else if ($("#mensagemSecretaria")[0].selectedIndex === 4) {

//         $('#formTodosResponsaveisSecretaria').show(500);
//         $(".formTodasTurmasSecretaria").hide();
//         $(".formUmaTurmaSecretaria").hide();
//         $(".formUmAlunoSecretaria").hide();
//         $(".formUmResponsavelSecretaria").hide();
//         $(".formTodosProfessoresSecretaria").hide();
//         $(".formUmProfessorSecretaria").hide();
//         $(".formDiretorSecretaria").hide();
//         $(".formEscolaGeralSecretaria").hide();

//     } else if ($("#mensagemSecretaria")[0].selectedIndex === 5) {

//         $('#formUmResponsavelSecretaria').show(500);
//         $(".formTodasTurmasSecretaria").hide();
//         $(".formUmaTurmaSecretaria").hide();
//         $(".formUmAlunoSecretaria").hide();
//         $(".formTodosResponsaveisSecretaria").hide();
//         $(".formTodosProfessoresSecretaria").hide();
//         $(".formUmProfessorSecretaria").hide();
//         $(".formDiretorSecretaria").hide();
//         $(".formEscolaGeralSecretaria").hide();

//     } else if ($("#mensagemSecretaria")[0].selectedIndex === 6) {

//         $('#formTodosProfessoresSecretaria').show(500);
//         $(".formTodasTurmasSecretaria").hide();
//         $(".formUmaTurmaSecretaria").hide();
//         $(".formUmAlunoSecretaria").hide();
//         $(".formTodosResponsaveisSecretaria").hide();
//         $(".formUmResponsavelSecretaria").hide();
//         $(".formUmProfessorSecretaria").hide();
//         $(".formDiretorSecretaria").hide();
//         $(".formEscolaGeralSecretaria").hide();

//     } else if ($("#mensagemSecretaria")[0].selectedIndex === 7) {

//         $('#formUmProfessorSecretaria').show(500);
//         $(".formTodasTurmasSecretaria").hide();
//         $(".formUmaTurmaSecretaria").hide();
//         $(".formUmAlunoSecretaria").hide();
//         $(".formTodosResponsaveisSecretaria").hide();
//         $(".formUmResponsavelSecretaria").hide();
//         $(".formTodosProfessoresSecretaria").hide();
//         $(".formDiretorSecretaria").hide();
//         $(".formEscolaGeralSecretaria").hide();

//     } else if ($("#mensagemSecretaria")[0].selectedIndex === 8) {

//         $('#formDiretorSecretaria').show(500);
//         $(".formTodasTurmasSecretaria").hide();
//         $(".formUmaTurmaSecretaria").hide();
//         $(".formUmAlunoSecretaria").hide();
//         $(".formTodosResponsaveisSecretaria").hide();
//         $(".formUmResponsavelSecretaria").hide();
//         $(".formTodosProfessoresSecretaria").hide();
//         $(".formUmProfessorSecretaria").hide();
//         $(".formEscolaGeralSecretaria").hide();

//     } else {

//         $('#formEscolaGeralSecretaria').show(500);
//         $(".formTodasTurmasSecretaria").hide();
//         $(".formUmaTurmaSecretaria").hide();
//         $(".formUmAlunoSecretaria").hide();
//         $(".formTodosResponsaveisSecretaria").hide();
//         $(".formUmResponsavelSecretaria").hide();
//         $(".formTodosProfessoresSecretaria").hide();
//         $(".formUmProfessorSecretaria").hide();
//         $(".formDiretorSecretaria").hide();
//     }
// }
//fim
//mensagens Responsavel

$(document).ready(function() {
    $('select').mensagemRespon();
});

$(".formSecretariaRespon").hide();
$(".formDiretorRespon").hide();

function formRespon() {

    $(".formSecretariaRespon").hide();
    $(".formDiretorRespon").hide();

    if ($("#mensagemRespon")[0].selectedIndex === 1) {
        $('#formSecretariaRespon').show(500);
        $(".formDiretorRespon").hide();
    } else {
        $('#formDiretorRespon').show(500);
        $(".formSecretariaRespon").hide();
    }

}

//fim

//Ativa o auto-complete
$(document).ready(function() {
    $('input.autocomplete').autocomplete({
        data: {
            "Apple": null,
            "Microsoft": null,
            "Google": 'https://placehold.it/250x250'
        },
    });
});