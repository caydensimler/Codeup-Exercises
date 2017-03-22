<?php

$filename = "fruits.txt";
$fruits = ['apple', 'strawberry', 'mango', 'kiwi', 'grape'];

function write($filename, $array) {

	$handle = fopen($filename, 'w');

	foreach ($array as $item) {
		fwrite($handle, $item . PHP_EOL);
	}

	fclose($handle);
}

write($filename, $fruits);