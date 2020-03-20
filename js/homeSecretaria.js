$(document).ready(function(){
  $('.sidenav').sidenav();
});

$('.dropdown-trigger').dropdown();

$(document).ready(function(){
  $('.modal').modal();
});

$(document).ready(function(){
  $('select').formSelect();
});

$(".formContas").hide();

function habilitaForm(){
  //alert($("#selectConta")[0].selectedIndex)

  $(".formContas").hide();

  if($("#selectConta")[0].selectedIndex === 1){
    $('#aluno').show(500)
  } else if ($("#selectConta")[0].selectedIndex === 2) {
    $('#responsavel').show(500)
  } else if ($("#selectConta")[0].selectedIndex === 3) {
    $('#professor').show(500)
  } else{
    $('#secretria').show(500)
  }
}


