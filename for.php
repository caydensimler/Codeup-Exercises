<?php

fwrite(STDOUT, "" . PHP_EOL);
fwrite(STDOUT, "Give me a number range!" . PHP_EOL);

	fwrite(STDOUT, "" . PHP_EOL);

fwrite(STDOUT, "Minimum? ");
$min = trim(fgets(STDIN));
fwrite(STDOUT, "Minimum number set to $min" . PHP_EOL);

	fwrite(STDOUT, "" . PHP_EOL);

fwrite(STDOUT, "Maximum? ");
$max = trim(fgets(STDIN));
fwrite(STDOUT, "Maximum number set to $max" . PHP_EOL);

	fwrite(STDOUT, "" . PHP_EOL);

fwrite(STDOUT, "What do you want to count by? ");
$countBy = trim(fgets(STDIN));
fwrite(STDOUT, "Counting by $countBy" . PHP_EOL);

	fwrite(STDOUT, "" . PHP_EOL);

if (is_numeric($min) == 1 && is_numeric($max) == 1 && is_numeric($countBy) == 1) {
	if (isset($countBy) == true) {
		for ($min; $min <= $max; $min += $countBy) {
			echo $min . PHP_EOL;
		}
	}
} else if (is_numeric($min) == 1 && is_numeric($max) == 1 && is_numeric($countBy) != 1) {
	for ($min; $min <= $max; $min += 1) {
		echo $min . PHP_EOL;
	}
} else {
	echo "Input not valid.";
}



