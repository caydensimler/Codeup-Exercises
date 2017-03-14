<?php

$things = ['Sgt. Pepper', "11", null, [1,2,3], 3.14, "12 + 7", false, (string) 11];

// foreach ($things as $dataType) {

//     if (is_int($dataType)) {
//         echo "integer\n";
//     } else if (is_float($dataType)) {
//         echo "float\n";
//     } else if (is_string($dataType)) {
//     	echo "string\n";
//     } else if (is_bool($dataType)) {
//     	echo "boolean\n";
//     } else if (is_array($dataType)) {
//     	echo "array\n";
//     } else if (is_null($dataType)) {
//     	echo "null\n";
//     }

// }

// foreach ($things as $dataType) {
// 	if(is_scalar($dataType)) {
// 		echo $dataType . PHP_EOL;
// 	}
// }

foreach ($things as $dataType) {
	if (is_array($dataType)) {
		
	} else {
		echo $dataType . PHP_EOL;
	}
}