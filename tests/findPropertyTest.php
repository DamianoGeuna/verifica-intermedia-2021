<?php
$users = include(__DIR__."/mockdata_array.php");
require "../user/user.php";
require "../lib/UsersSearchFunctions.php";
// Test ricerca omonimi
// expectedResult è il risultato della funzione  count applicato al risultato della ricerca 
$testResultsDataset = array(
	array(
		"firstName" => "Achille",
		"lastName" => "BIANCHI",
		"expectedResult" => 2,
	),
	array(
		"firstName" => "Adamo",
		"lastName" => "ROSSI",
		"expectedResult" => 2,
	),
	array(
		"firstName" => "Adriano",
		"lastName" => "ROMANO",
		"expectedResult" => 2,
	),
	array(
		"firstName" => "Luigi",
		"lastName" => "RUSSO",
		"expectedResult" => 2,
	),
	array(
		"firstName" => "Mario",
		"lastName" => "FERRARI",
		"expectedResult" => 2,
	),
);

foreach ($testResultsDataset as $row) {
        extract($row);
		
		$actual=array_filter($users,searchUserName($firstName));
		$actual2= array_filter($actual,searchUserlastName($lastName));



		$tmp=count($actual2);
		if ($expectedResul == $tmp) {
			echo "Funziona\n";
		}
}