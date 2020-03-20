// Sidenav
const sideNav = document.querySelector('.sidenav')
M.Sidenav.init(sideNav, {})

// Slider
const slider = document.querySelector('.slider')
M.Slider.init(slider, {
    indicators: false,
    transition: 500,
    interval: 4000,
    height: 500
})

// Scrollspy
const ss = document.querySelectorAll('.scrollspy')
M.ScrollSpy.init(ss, {})

// lax init
window.onload = function () {
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
$(document).ready(function () {
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
