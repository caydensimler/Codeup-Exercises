<?php

$things = ['Sgt. Pepper', "11", null, [1,2,3], 3.14, "12 + 7", false, (string) 11];

// foreach ($things as $datum) {
//     if (is_int($datum)) {
//         echo "{$datum} is an integer\n";
//     } else if (is_float($datum)) {
//         echo "{$datum} is a float\n";
//     } else if (is_string($datum)) {
//     	echo "{$datum} is a string\n";
//     } else if (is_bool($datum)) {
//     	echo "{$datum} is a boolean\n";
//     } else if (is_array($datum)) {
//     	echo "{$datum} is an array\n";
//     } else if (is_null($datum)) {
//     	echo "{$datum} is null\n";
//     }
// }

foreach ($things as $datum) {
	if(is_scalar($datum)) {
		echo $datum . PHP_EOL;
	}
}