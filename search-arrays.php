<?php

$names = ['Tina', 'Dana', 'Mike', 'Amy', 'Adam'];
$compare = ['Tina', 'Dean', 'Mel', 'Amy', 'Michael'];


function arraySearch($a, $b) {

	if ((array_search($a, $b)) !== false) {
		echo "TRUE" . PHP_EOL;
	} else {
		echo "FALSE" . PHP_EOL;
	}
}


function compareArray($a, $b) {
	$overlap = array_intersect($a, $b);
	$i = 0;

	foreach ($overlap as $commonCount) {
		$i++;
	}

	echo "$i values in common" . PHP_EOL;
}


arraySearch('Tina', $names);
compareArray($names, $compare);




