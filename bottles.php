<?php

// Write a for loop that sings "99 bottles of beer on the wall". Make sure the script never says "1 bottles of beer on the wall" and when we have no bottles of beer, the script will say "oh no, somebody go to a meetup!"

$counter = 99;

do {
	echo "$counter bottles of beer on the wall, $counter bottles of beer. Take one down, pass it around, " . ($counter - 1) . " bottles of beer on the wall." . PHP_EOL;
	$counter--;
} while ($counter > 2);

if ($counter == 2) {
	echo "$counter bottles of beer on the wall, $counter bottles of beer. Take one down, pass it around, oh no, somebody go to a meetup!" . PHP_EOL;
} 