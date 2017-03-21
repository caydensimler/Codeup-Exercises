<?php

$names = ['Tina', 'Dana', 'Mike', 'Amy', 'Adam'];
$compare = ['Tina', 'Dean', 'Mel', 'Amy', 'Michael'];


// -------------------> search an array for a specific element <------------------
function arraySearch($element, $array) {
	if ((array_search($element, $array)) !== false) {
		echo "$element is present in the array" . PHP_EOL;
	} else {
		echo "$element is not present in the array" . PHP_EOL;
	}
}

arraySearch("Bob", $names);
arraySearch("Tina", $names);

echo "" . PHP_EOL;

// -------------------> solution given in class <------------------- 
// function compareArrays($array1, $array2) {
// 	$c = 0;
// 	foreach ($array1 as $element) {
// 		if(arraySearch($element, $array2)) {
// 			$c++;
// 		}
// 	}

// 	return $c;
// }

// compareArrays($names, $compare);

// -------------------> compare two arrays and output the amount of differences <------------------
function compareArray($array1, $array2) {
	$common = array_intersect($array1, $array2);
	$i = 0;

	foreach ($common as $commonCount) {
		$i++;
	}

	echo "The arrays have $i values in common" . PHP_EOL;
}

// -------------------> combine two arrays and output the new array results; omit repitition <------------------
function combineArrays($array1, $array2) {
	$merge = [];
	foreach ($array1 as $element) {
		array_push($merge, $element);
	}

	foreach ($array2 as $element) {
		array_push($merge, $element);
	}
	
	$merge = array_unique($merge);
	
	foreach ($merge as $value) {
		echo $value . PHP_EOL;
	}
}

combineArrays($names, $compare);

echo "" . PHP_EOL;

compareArray($names, $compare);