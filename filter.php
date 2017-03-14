<?php
	function odd($var) {
	    // returns whether the input integer is odd
	    return($var & 1);
	}

	function even($var) {
	    // returns whether the input integer is even
	    return(!($var & 1));
	}

	$array1 = array(1, 2, 3, 4, 5);
	$array2 = array(6, 7, 8, 9, 10, 11, 12);

	echo "Odd :\n";
	print_r(array_filter($array1, "odd"));
	echo "Even:\n";
	print_r(array_filter($array2, "even"));
