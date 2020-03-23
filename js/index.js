// Scrollspy
const ss = document.querySelectorAll('.scrollspy')
M.ScrollSpy.init(ss, {})

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
$("#modalLogin").iziModal({
    transitionIn: 'comingIn',
    transitionOut: 'fadeOut'
})

// collapsible
$(document).ready(() => {
    $('.collapsible').collapsible();
})

// ver senha
function verSenha() {
    $('.btnVerSenha').toggleClass("fa-eye fa-eye-slash");
    ;
    if ($('.senhaLogin').attr("type") == "password") {
        $('.senhaLogin').attr("type", "text");
    } else {
        $('.senhaLogin').attr("type", "password");
    }
}
