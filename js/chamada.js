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



function chamada() {
    //alert($("#selectConta")[0].selectedIndex)

    if ($("#selecTurma")[0].selectedIndex === 1) {
        window.location.href = ('chamada.html.php');
    } else if ($("#selecTurma")[0].selectedIndex === 2) {
        window.location.href = ('chamada.html.php')
    } else if ($("#selecTurma")[0].selectedIndex === 3) {
        window.location.href = ('chamada.html.php');
    } else if ($("#selecTurma")[0].selectedIndex === 4) {
        window.location.href = ('chamada.html.php')
    } else {
        window.location.href = ('chamada.html.php')
    }
}

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
    format: 'yyyy/mm/dd',
    container: 'body',
    maxDate: null
});