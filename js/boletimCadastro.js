// function pegarId() {

//     $("#selectTurma").on("change", function() {
//         var idTurma = $("#selectTurma").val();

//         alert(idTurma);
//     });

//     $.ajax({
//         url: 'home_professor.html.php',
//         type: 'POST',
//         data: { id_turmajs: idTurma },
//         beforeSend: function() {

//         },
//         success: function(data) {
//             $("disciplinas_professor").html("Carregando...");
//         },
//         error: function() {
//             $("disciplinas_professor").html("Houve um erro ao carregar...");
//         }

//     });


// }