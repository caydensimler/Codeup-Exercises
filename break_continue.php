<?php

// Create a file named break_continue.php in your exercises directory. Commit and push to GitHub after each step.
// 	1. Create a for loop that shows all even numbers between 1 and 100 using continue.
// 	2. Create another for loop that counts from 1 to 100, but stops after 10 using break.

for ($i = 1; $i <= 100; $i++) {

	if ($i % 2 !== 0) {
		continue;
	}

	echo $i . PHP_EOL;
}

