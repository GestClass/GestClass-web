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