// Sidenav
const sideNav = document.querySelector('.sidenav')
M.Sidenav.init(sideNav, {})

// Scrollspy
const ss = document.querySelectorAll('.scrollspy')
M.ScrollSpy.init(ss, {})

// AOS init
AOS.init()

// lax init
window.onload = () => {
    lax.setup()
    const updateLax = () => {
        lax.update(window.scrollY)
        window.requestAnimationFrame(updateLax)
    }
    window.requestAnimationFrame(updateLax)
}

// izimodal
// $("#modalLogin").iziModal({
//     transitionIn: 'comingIn',
//     transitionOut: 'fadeOut'
// })

// collapsible
$(document).ready(() => {
    $('.collapsible').collapsible();
})

// ver senha
function verSenha() {
    $('.btnVerSenha').toggleClass("fa-eye fa-eye-slash");;
    if ($('.senhaLogin').attr("type") == "password") {
        $('.senhaLogin').attr("type", "text");
    } else {
        $('.senhaLogin').attr("type", "password");
    }
}



/* ==== JS PAGINA DE LOGIN E RECUPERAR SENHA ===== */
function toggleLoginRecupera() {
    $('.formRecuperarSenha').toggleClass('hide')
    $('.formLogin').toggleClass('hide')
}