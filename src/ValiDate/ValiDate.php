<?php
namespace ValiDate;
use Carbon\Carbon;
use \DateTimeImmutable;
use \DateTimeZone;

/**
 * Clase para validar fechas de cincominutales.
 * 
 * Se valida si una fecha (DateTime) junto con un Offset proporcionado, son
 * válidos para una zona horaria especifica.
 */
class ValiDate {


    /**
     * Timestamp/TimeZone Validation using Carbon library
     */
	public static function check($f, $o, $tz){
		
		//crearmos una fecha de prueba a partir de los datos proporcionados
		$ff = $f . " -0" . ($o*-1) . ":00";
		$fechaT = Carbon::createFromFormat("Y-m-d H:i:s P", $ff , $tz);

		$fT = $fechaT->format("Y-m-d H:i:s P");	//en formato string	

		//creamos una fecha VALIDA para referencia con los datos proporcionados 
		//excepto el offset, el cual se genera solo
		$fechaOK = Carbon::createFromFormat("Y-m-d H:i:s", $f, $tz);

		$fOk = $fechaOK->format("Y-m-d H:i:s P"); //en formato string

		//comparamos las fechas generadas
		return ( ($fT == $fOk) ? true : false);
		
	}


    /**
     * Timestamp/TimeZone Validation using native php DateTime classes
     */
	public static function basicCheck($f, $o, $tz){

		//crearmos una fecha de prueba a partir de los datos proporcionados
		$ff = $f . " -0" . ($o*-1) . ":00";
		$fechaT = new DateTimeImmutable($f, new DateTimeZone($tz));

		$fT = $fechaT->format("Y-m-d H:i:s");	//en formato string	

		//creamos una fecha VALIDA para referencia con los datos proporcionados 
		$fechaOK = new DateTimeImmutable($f, new DateTimeZone($tz));
		
		$fOk = $fechaOK->format("Y-m-d H:i:s"); //en formato string
		$fOk_offset = $fechaOK->getOffset()/60/60;


		//comparamos las fechas generadas
		return ( ($fT == $fOk && $o == $fOk_offset) ? true : false);

	}


}