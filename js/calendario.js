document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

        locale: 'pt-br',
        plugins: ['interaction', 'dayGrid', 'list', 'googleCalendar'],
        editable: true,
        eventLimit: true,
        events: 'php/listarEventosCalendario.php',
        extraParams: function() {
            return {
                cachebuster: new Date().valueOf()
            };
        },

        eventClick: function(info) {
            info.jsEvent.preventDefault();

            $('.modal #title').text(info.event.title);
            $('.modal #title').val(info.event.title);
            $('.modal #start').text(info.event.start.toLocaleString());
            $('.modal #start').val(info.event.start.toLocaleString());
            $('.modal #end').text(info.event.end.toLocaleString());
            $('.modal #end').val(info.event.end.toLocaleString());
            $('.model #color').val(info.event.backgroundColor);
            
            $(document).ready(function() {
                var modal = M.Modal.init($('#modalInfo')[0]);
                modal.open();
            });

            info.el.style.borderColor = '#000';
        },

        selectable: true,

        select: function(info) {
            // alert('Inicio do evento ' + info.start.toLocaleString())
            $('#modalCadastro #start').val(info.start.toLocaleString());
            $('#modalCadastro #end').val(info.end.toLocaleString());

            $(document).ready(function() {
                var modal = M.Modal.init($('#modalCadastro')[0]);
                modal.open();
            });

            $(document).ready(function() {
                $('select').formSelect();
            });
        },

        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,listYear'
        },

        displayEventTime: false
    });

    calendar.render();
});


// mascara para o campo data e hora
function DataHora(evento, objeto) {
    var keypress = (window.event) ? event.keyCode : evento.wich;
    campo = eval(objeto);

    if (campo.value == '00/00/0000 00:00:00') {
        campo.value = "";
    }

    caracteres = '0123456789';
    separacao1 = '/';
    separacao2 = ' ';
    separacao3 = ':';
    separacao4 = ':';
    conjunto1 = 2;
    conjunto2 = 5;
    conjunto3 = 10;
    conjunto4 = 13;
    conjunto5 = 16;

    if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
        if (campo.value.length == conjunto1)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
        else if (campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
        else if (campo.value.length == conjunto5)
            campo.value = campo.value + separacao4;
    } else {
        event.returnValue = false;
    }

}

$(document).ready(function () {
    $("#adicionarEvento").on("submit", function (event) {
        event.preventDefault();
       $.ajax({
            method: "POST",
            url: "php/cadastrarEvento.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (retorna) {
                if (retorna['sit']) {
                    // $("#msg-cad").html(retorna['msg']);
                    location.reload();
                } else {
                    $("#msg-cad").html(retorna['msg']);
                }
            }
        })
    });

    $('.btn-canc-vis').on("click", function(){
        $('.visevent').slideToggle();
        $('.formedit').slideToggle();
    })

    $('.btn-canc-edit').on("click", function(){
        $('.formedit').slideToggle();
        $('.visevent').slideToggle(); 
    })
});