<?php

fwrite(STDOUT, "" . PHP_EOL);
fwrite(STDOUT, "Give me a number range!" . PHP_EOL);

	fwrite(STDOUT, "" . PHP_EOL);

fwrite(STDOUT, "Minimum? ");
$min = trim(fgets(STDIN));

fwrite(STDOUT, "Maximum? ");
$max = trim(fgets(STDIN));

fwrite(STDOUT, "What do you want to count by? ");
$countBy = trim(fgets(STDIN));

	fwrite(STDOUT, "" . PHP_EOL);

fwrite(STDOUT, "Counting from $min to $max by increments of $countBy" . PHP_EOL);

if (is_numeric($min) && is_numeric($max) && is_numeric($countBy)) {
	for ($min; $min <= $max; $min += $countBy) {
		// if ($min % 2 === 0){
			echo $min . PHP_EOL;
		// }
	}
} else if (is_numeric($min) && is_numeric($max) && !is_numeric($countBy)) {
	for ($min; $min <= $max; $min += 1) {
		echo $min . PHP_EOL;
	}
} else {
	echo "Input not valid.";
}


