<?php
require('vendor/autoload.php');

use Carbon\Carbon;


//datos para validar
//verificar si este offset es correcto para la fecha en la zona horaria
$zona1 = "America/Mexico_City";
$fecha = "2021-04-14 05:00:00";
$offset = "-6";  

//crear string de fecha en formato 'YYYY-MM-DD HH:MM:SS -00:SS:00'
$ff = $fecha . "-0" . ($offset*-1) . ":00";
$fechaQ = Carbon::createFromFormat("Y-m-d H:i:s P", $ff , $zona1);

echo "Fecha de Entrada por validar:\t". $fechaQ->format("Y-m-d H:i:s P") . "\n";
$f1 = $fechaQ->format("Y-m-d H:i:s P");


//crear una fecha con offset validos para la zona horaria
$fechaOK = Carbon::createFromFormat("Y-m-d H:i:s", $fecha, $zona1);

echo "Fecha de Referencia Válida:\t" . $fechaOK->format("Y-m-d H:i:s P")  . "\n";
$f2 = $fechaOK->format("Y-m-d H:i:s P");


// verificar si coinciden
echo $f1 == $f2 ? "Fecha de entrada VALIDA" : "Fecha de entrada NO VALIDA";

