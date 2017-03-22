<?php

function humanizedList($string, $alphaSorting = false) {
	$array = explode(', ', $string);

	if ($alphaSorting === true) {
		sort($array);
	}
	
	$newString = [];
	$i = 0;

	foreach ($array as $person) {
		$i++;
	}

	foreach ($array as $key => $person) {
		if ($key <= ($i - 3)) {
			array_push($newString, $person . ", ");
		} else if ($key === ($i - 2)) {
			array_push($newString, $person . ", and ");
		} else {
			array_push($newString, $person);
		}
	}

	$newString = implode("", $newString);
	return $newString;
	
}

$physicistsString = 'Gordon Freeman, Samantha Carter, Sheldon Cooper, Quinn Mallory, Bruce Banner, Tony Stark, Cayden Simler, Josh Sifuentes';

$famousFakePhysicists = humanizedList($physicistsString, true);

echo "Some of the most famous fictional theoretical physicists are {$famousFakePhysicists}." . PHP_EOL;
echo "" . PHP_EOL;


function humanizedListSolution($array) {
	$output = "";
	$lastValue = array_pop($array);
	$output = implode(', ', $array);
	$output .= ", and $lastValue";

	return $output;
}

function humanizedListSort($array, $sortNames = false){
	if ($sortNames === true) {
		sort($array);
	}

	$output = "";
	$lastValue = array_pop($array);
	$output = implode(', ', $array);
	$output .= ", and $lastValue";

	return $output;
}

function humanizedFirstNameList($array, $sortNames = false){
	$output = "";

	$names = implode(" ", $array);
	$namesArray = explode(" ", $names);
	$firstNamesArray = [];

	for ($i = 0; $i < count($namesArray); $i += 2){
		array_push($firstNamesArray, $namesArray[$i]);
	}

	if ($sortNames == true) {
		sort($firstNamesArray);
	}

	$lastValue = array_pop($firstNamesArray);
	$output = implode(', ', $firstNamesArray);
	$output .= ", and $lastValue";

	return $output;
}

$physicistsString = 'Gordon Freeman, Samantha Carter, Sheldon Cooper, Quinn Mallory, Bruce Banner, Tony Stark, Cayden Simler, Josh Sifuentes';

$physicistsArray = explode (', ', $physicistsString);


$famousFakePhysicists = humanizedListSolution($physicistsArray);
echo "Some of the most famous fictional theoretical physicists are {$famousFakePhysicists}." . PHP_EOL;
echo "" . PHP_EOL;
$famousFakePhysicists = humanizedListSort($physicistsArray, true);
echo "Some of the most famous fictional theoretical physicists are {$famousFakePhysicists}." . PHP_EOL;
echo "" . PHP_EOL;
$famousFakePhysicists = humanizedFirstNameList($physicistsArray, true);
echo "Some of the most famous fictional theoretical physicists are {$famousFakePhysicists}." . PHP_EOL;
echo "" . PHP_EOL;






