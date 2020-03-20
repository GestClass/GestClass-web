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
        if(valorParametro === 'primario'){
            $('.selectPlanos').val('1')
        } else if (valorParametro === 'fundamental') {
            $('.selectPlanos').val('2')
        }else{
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
$(document).ready(function () {
    $('select').formSelect()
})