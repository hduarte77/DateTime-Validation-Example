<?php
require(__DIR__. "/../vendor/autoload.php");
require(__DIR__. "/ValiDate/ValiDate.php");

use Validate\ValiDate;

//valores datetime,offset,tz que se desean validar
$data = Array(
	Array("date" => "2023-11-05 01:00:00", "offset" => -7, "tz" => "America/Los_Angeles"),
	Array("date" => "2023-11-05 01:00:00", "offset" => -8, "tz" => "America/Los_Angeles"),
);

foreach($data as $d){
	$result = ValiDate::basicCheck($d["date"],$d["offset"],$d["tz"]) ? "VALID" : "NOT VALID";
	echo "DateTime: " . $d["date"] . 
		 " with offset: " . $d["offset"] . 
		 " is " . $result . 
		 " for TimeZone: " . $d["tz"] . "\n";
};
