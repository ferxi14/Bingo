<?php
function rellenarBombo(){

    for ($i=0; $i <60; $i++) { 
        $relleno[$i]=$i+1;
    }

    return $relleno;
} 

function rellenarCartones(&$array){
    foreach ($array as $jugadores => &$value) {
        for ($i=0; $i < 3 ; $i++) { 
            $value[$i] = crearCartones();
        }
    }
}

function crearCartones() {
    $carton = [];
    $usados = [];

    for ($j = 0; $j < 3; $j++) {
        for ($k = 0; $k < 5; $k++) {
            do {
                $num = rand(1, 60);
            } while (in_array($num, $usados));
            
            $carton[$j][$k] = $num;
            $usados[] = $num;
        }
    }
    return $carton;
}

function imprimirJug($bomb, $jugadores){

    $bomb=shuffle($bomb);


}




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}