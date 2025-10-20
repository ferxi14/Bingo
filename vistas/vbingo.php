<?php 
include("../funciones/fjugadores.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numJuga = intval(test_input($_POST["numJugadores"]));
    $numCart = intval(test_input($_POST["numCartas"]));

    $jugadores = array();

    for ($i=0; $i < $numJuga ; $i++) { 
        $jugadores["jugador" . ($i+1)] = array(); 
    }



    rellenarCartones($jugadores , $numCart);

    $bombo=rellenarBombo();


    imprimirJug($jugadores , $bombo);


    //Visualizar el array de jugadores
    echo "<pre>";
    print_r($jugadores);
    echo "</pre>";
    



}
?>