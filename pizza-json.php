<?php
// Se non viene passato in GET nessun prezzo,stampo tutte le pizze. 
// Se viene passato il prezzo stampo le pizze con quel prezzo.
//Se non viene trovato il prezzo giusto stampo "Nessun risultato trovato".

  $result=[];
  $success = true;
  $error_msg = '';
  $price = $_GET['prezzo'];
  $pizza_db =[

    [
      'nome' => 'Margherita',
      'ingredienti' =>['pomodoro','mozzarella','basilico'],
      'prezzo' => 4
    ],
    [
      'nome' => 'Marinara',
      'ingredienti' =>['pomodoro','origano','aglio'],
      'prezzo' => 4
    ],
    [
      'nome' => 'Diavola',
      'ingredienti' =>['pomodoro','mozzarella','basilico', 'salame piccante'],
      'prezzo' => 6
    ],


  ];
  if(empty($price)){
    $result = $pizza_db;
  }else{
    // cercare il prezzo
    foreach($pizza_db as $pizza ){
      if($pizza['prezzo'] == $price){
        $result[] = $pizza;
      }
    }
    //var_dump($result);
    //die;
    // se lo trovo ossia sel'array è pieno lo salo in result
    // se è vuoto salvo i messaggi di errore
    if(count($result) == 0){
      $success = false;
      $error_msg = "Nessuna pizza trovata";
    }
  }
  header('Content-Type: application/json');

  echo json_encode( [
    'success' =>  $success,
    'error_msg' => $error_msg,
    'pizze' => $result

  ]);




?>