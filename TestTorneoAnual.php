<?php
include 'Partido.php';
include 'Equipo.php';
include 'Categoria.php';
include 'Torneo.php';
include 'TorneoNacional.php';
include 'TorneoProvincial.php';
include 'MinisterioDeporte.php';

$catA = new Categoria(1, "Infantiles");
$catB = new Categoria(2, "Menores");
$catC = new Categoria(3, "Mayores");

$objE1 = new Equipo("Aries", "Fernando", 23, $catA);
$objE2 = new Equipo("Tauro", "Andres", 32, $catB);
$objE3 = new Equipo("Geminis", "Angel", 25, $catC);
$objE4 = new Equipo("Cancer", "Erick", 27, $catA);
$objE5 = new Equipo("Leo", "Daniel", 23, $catA);
$objE6 = new Equipo("Virgo", "Gonzalo", 32, $catB);
$objE7 = new Equipo("Libra", "Lucas", 25, $catC);
$objE8 = new Equipo("Escorpio", "Matias", 30, $catB);
$objE9 = new Equipo("Sagitario", "Esteban", 23, $catA);
$objE10 = new Equipo("Capricornio", "Ezequiel", 27, $catB);
$objE11 = new Equipo("Acuario", "Manolo", 23, $catC);
$objE12 = new Equipo("Picis", "Arriaga II", 30, $catC);

$objPart1 = new Partido(1,new DateTime('2000-02-01'), 80, 120, array ($objE7 ,$objE8));
$objPart2 = new Partido(2,new DateTime('2000-03-01'), 81, 110, array ($objE9 ,$objE10));
$objPart3 = new Partido(3,new DateTime('2000-04-01'), 115, 85, array ($objE11 ,$objE12));
$objPart4 = new Partido(4,new DateTime('2000-05-01'), 2, 3, array ($objE1 ,$objE2));
$objPart5 = new Partido(5,new DateTime('2000-06-01'), 0, 1, array ($objE3 ,$objE4));
$objPart6 = new Partido(6,new DateTime('2000-07-01'), 2, 3, array ($objE5 ,$objE6));

$col1 = array ($objPart1, $objPart1, $objPart1);
$col2 = array ($objPart4, $objPart5, $objPart6);

$ministerio = new MinisterioDeporte(2020, array ());

$ministerio->registrarTorneo($col1, "provincial", array ("id"=>1, "premio"=>10000, "nombreLocalidad"=>"Rio Frio", "nombreProvincia"=>"Neuquen"));
$ministerio->registrarTorneo($col2, "nacional", array ("id"=>2, "premio"=>50000, "nombreLocalidad"=>"Rio Calido"));

/*$lista = $tor->sumarGoles($objE1, array(array ("equipo"=>$objE1, "partido"=>0, "goles"=>10)), 10);
print_r($lista);*/
/*$lista = $tor->sumarPartidoGanado($objE1, array(array ("equipo"=>$objE1, "partido"=>5, "goles"=>10)));
print_r($lista);*/
/*$resultados = $tor->resultadoTorneo();
print_r($resultados);*/
/*$campeon = $tor->obtenerEquipoGanadorTorneo();
print_r($campeon);*/

$campeon = $ministerio->otorgarPremioTorneo(1);
echo "Campeon ".$campeon["equipo"]->getNombre().
"\nPremio ".$campeon["premio"];

$campeon = $ministerio->otorgarPremioTorneo(2);
echo "\nCampeon ".$campeon["equipo"]->getNombre().
"\nPremio ".$campeon["premio"];

echo $ministerio;