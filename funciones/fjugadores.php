<?php
function rellenarBombo(){

    for ($i=0; $i <60; $i++) { 
        $relleno[$i]=$i+1;
    }

    return $relleno;
} 

function rellenarCartones(&$jugadores){
    foreach ($jugadores as $jugador => &$datosJugador) {
        for ($i=0; $i < 3 ; $i++) { 
            $jugadores[$jugador]["Carton" . ($i+1)] = array("numeros" => crearCartones(), "aciertos" => 0);
        }
         
    }
}

function crearCartones() {
    $carton = array();
    $usados = array();

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


//Funcion para contar los aciertos en cada carton verificando si hay algun ganador despues de  cada bola sorteadaa
function contarAciertos(&$jugadores, $bomb){

    //Variable para detener el sorteo si hay un ganador
    $ganadores=false;
    $i=0;
    //Primero recorremos el bombo ya sorteado, mientras no haya ganadores el bucle seguiraa ejecutandose
    while (!$ganadores && $i < count($bomb)) {
        $numero = $bomb[$i]; //toma cada bola del bombo el cual esta mezclado
        //Recorremos el array de los jugadores para ver si hay algun carton tiene numero sorteado
        foreach ($jugadores as $jugador => &$cartones) {
            foreach ($cartones as $carton => &$datosCarton) {
                foreach ($datosCarton['numeros'] as $fila) {
                    if (in_array($numero, $fila)) { // verifica si la bola actual esta dentro de cada fila de la cartilla
                        $datosCarton['aciertos']++; // si lo encuentra el acierto aumenta en la cartilla
                    }
                }
            }
        }
        // Verificar si hay ganadores despues de cada bola
        $ganadores = verificarGanadores($jugadores);
        $i++;
    }

   
}

function verificarGanadores($jugadores) {
    $ganadores = false;

    // Recorremos los jugadores y sus cartones para verificar los aciertos
    foreach ($jugadores as $jugador => &$cartones) {
        foreach ($cartones as $carton => &$num_carton) {
            // Si un carton tiene 15 aciertos, hay un ganador
            if ($num_carton['aciertos'] == 15) {
                $ganadores = true;
            }
        }
    }

    return $ganadores; // Retorna true si hay ganadores, false si no hay ganadores
}




function visualizarGanadores($jugadores) {
    foreach ($jugadores as $jugador => &$cartones) {
        foreach ($cartones as $carton => &$num_carton) {
            // Si un carton tiene 15 aciertos, se muestra que jugador ha ganado y el numero del cartonn
            if ($num_carton['aciertos'] == 15) {
                echo "$jugador ha ganado con el $carton<br>";
            }else{
                echo "No hay ganadores<br>";
            }
                
        }
    }
}




function imprimirJug(&$jugadores , $bomb){

    shuffle($bomb);

    echo "<pre>";
    print_r($bomb); // visualizo el bombo
    echo "</pre>";

    contarAciertos($jugadores, $bomb);//ejecuta el sorteo
    
    visualizarGanadores($jugadores); // muestra por pantalla los ganadores y el carton ganador

}




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
