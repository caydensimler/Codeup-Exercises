<?php  

// Specify the file name or path
	$file - "restaurants.txt";

// Create a file pointer and opens a stream resource object
	$handle = fopen($file, "r");

	modes:
	reading - "r";
	writing - "w";
	add - "a";

"Streams are the way of generalizing file, network, data compression, and other operations which share a common set of functions and uses. It it's simplest definition, a stream is a resource object which exhibiits streamable behavior. That is, it can read from or be written to in a linear fashion..."

// Determine how many characters contained in the file
echo filesize($file) . PHP_EOL;

// Read contents of file stream at the specified handle and up to the indicated size (all of the file);
$contents = fread($handle, filesize($file));

// echo $contents;
echo $contents;

// ECHO OUT RESTAURANTS IN ALL CAPS AND IN ALPHABETICAL ORDER

function parseFileToOrderedCaps($string) {
	$contentsArr = explode("\n", $string);
	sort($contentsArr);
	foreach($contentsArr as $content) {
		echo strtoupper($content) . PHP_EOL;
	}

}

parseFileToOrderedCaps($contents);

// Close file pointer to avoid security breaches and free the file up to be used by another program execution
fclose($handle);

// File reading recap

$file = "restaurants.txt";
$handle = fopen($file, "r");
contents = fread($handle, filesize($file));
// Do something to contents of file
fclose($handle);




