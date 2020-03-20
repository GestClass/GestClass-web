//materialbox 
$(document).ready(function () {
  $('.materialboxed').materialbox();
});

// image preview
$(".inputFoto").change(function () {
  imagePreview(this);
});

function imagePreview(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('.imagePreview').attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

// ver senha
function verSenha() {
  $('.btnVerSenha').toggleClass("fa-eye fa-eye-slash");
  ;
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