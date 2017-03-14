<?php

for ($a = 1; $a <= 100; $a++) {

	if ($a % 3 == 0 && $a % 5 == 0) {
    	echo "FizzBuzz" . PHP_EOL;
	} else if ($a % 3 == 0) {
    	echo "Fizz" . PHP_EOL;
	} else if ($a % 5 == 0) {
    	echo "Buzz" . PHP_EOL;
	} else {
    	echo $a . PHP_EOL;
	}	

}