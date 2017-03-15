<?php


function add($a, $b) {
    if (is_numeric($a) && is_numeric($b)) {
        return "$a + $b = " . $a + $b;
    } else {
        errorMessage();
        echo "\tCannot evaluate for $a and $b.";
    }
}

function subtract($a, $b) {
    if (is_numeric($a) && is_numeric($b)) {
        return "$a - $b = " . $a - $b;
    } else {
        errorMessage();
        echo "\tCannot evaluate for $a and $b.";
    }
}

function multiply($a, $b) {
    if (is_numeric($a) && is_numeric($b)) {
        return "$a * $b = " . $a * $b;
    } else {
        errorMessage();
        echo "\tCannot evaluate for $a and $b.";
    }
}

function divide($a, $b) {
    if (is_numeric($a) && is_numeric($b)) {
    	if ($b === 0) {
    		return "Can not divide by zero.";
    	} else {
    		return "$a / $b = " . $a / $b;
    	}
    } else {
        errorMessage();
        echo "\tCannot evaluate for $a and $b.";
    }
}

function modulus($a, $b) {

    if (is_numeric($a) && is_numeric($b)) {
    	return "$a % $b = " . $a % $b;
    } else {
        errorMessage();
        echo "\tCannot evaluate for $a and $b.";
    }
}

// Add code to test your functions here


echo add("two", "one") . PHP_EOL;

echo subtract(10, 2) . PHP_EOL;

echo multiply(4, 4) . PHP_EOL;

echo divide(6, 0) . PHP_EOL;

echo modulus(4, 2)  . PHP_EOL;


function errorMessage(){
	echo "Invalid input for arguments. Both must be numbers." . PHP_EOL;
}



