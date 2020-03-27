// JS CADASTRO

$(document).ready(function() {
    $('.tabs').tabs({
        swipeable: false,
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
    format: 'yyyy/mm/dd',
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




// CONSULTA DE CEP

$('.cepConsulta').blur(async () => {
    let cep = $('.cepConsulta').val()
    fetch(`https://viacep.com.br/ws/${cep}/json`).then(dados => {
        dados.json().then(endereco => {

            endereco.erro ?
                showToast('O CEP informado é inválido')
            :
            $('.rua').val(endereco.logradouro)
            $('.bairro').val(endereco.bairro)
            $('.cidade').val(endereco.localidade)
            $('.estado').val(endereco.uf)
        })
    })
    .catch(erro => {
        
    })
    
})

function showToast(message, ){
    iziToast.error({
        message,
        position: 'bottomRight',
        close
    })
}

// FIM CONSULTA CEP





// TROCA FORM RESPONSAVEL

function trocaFormResp(params) {
    console.log(params);
    
    if (params == true) {
        $('.novoResp').removeClass('hide')
        $('.existeResp').addClass('hide')
    } else{
        $('.existeResp').removeClass('hide')
        $('.novoResp').addClass('hide')
    }
}

// FIM TROCA FORM RESPONSAVEL