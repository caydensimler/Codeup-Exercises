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






