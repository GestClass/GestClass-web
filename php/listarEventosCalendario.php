<?php
// A CODIGO A BAIXO ESTA EM PDO, SE VOCE NAO TIVER A VERSAO 7 DO PHP NÃO VAI FUNCIONAR

include 'conexao.php';

$query_events = "SELECT id, title, color, start, end FROM events";
$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$eventos = [];

while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['id'];
    $title = $row_events['title'];
    $color = $row_events['color'];
    $start = $row_events['start'];
    $end = $row_events['end'];
    
    $eventos[] = [
        'id' => $id, 
        'title' => $title, 
        'color' => $color, 
        'start' => $start, 
        'end' => $end, 
        ];
}

echo json_encode($eventos);



// include_once 'conexao.php';

// $queryEventos = "SELECT id, title, color, start, end FROM events";
// $resultadoEventos = mysqli_query($conexao, $queryEventos);

// $eventos = [];

// while ($linhaEventos = mysqli_fetch_array($resultadoEventos)) {
//     $id = $linhaEventos['id'];
//     $titulo = $linhaEventos['title'];
//     $cor = $linhaEventos['color'];
//     $dataInicio = $linhaEventos['start'];
//     $dataFim = $linhaEventos['end'];

//     $eventos[] = [
//         'id' => $id,
//         'title' => $titulo,
//         'color' => $cor,
//         'start' => $dataInicio,
//         'end' => $dataFim,
//     ];
// }

// echo json_encode($eventos);
