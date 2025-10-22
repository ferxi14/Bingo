<?php 
include("../funciones/fjugadores.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$n1=test_input($_POST["jugador1"]);
$n2=test_input($_POST["jugador2"]);
$n3=test_input($_POST["jugador3"]);
$n4=test_input($_POST["jugador4"]);

$jugadores=array($n1=>array(),$n2=>array(),$n3=>array(),$n4=>array());

rellenarCartones($jugadores);

$bombo=rellenarBombo();

imprimirJug($jugadores, $bombo);
}
?>