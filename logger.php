<?php

function logInfo($logLevel, $message) {
    logMessage($logLevel, $message);
}

function logError($logLevel, $message) {
    logMessage($logLevel, $message);
}

function logMessage($logLevel, $message)
{
// The good code, courtesy of Justin.
    $filename = "log-" . date("Y-m-d") . ".log";
    $handle = fopen($filename, 'a');

    $log = date("Y-m-d h:m:s") . " [$logLevel]" . " " . $message;

    fwrite($handle, $log . PHP_EOL);


// My code, first attempt, it worked but was dirty. Didn't know you can combine the date functions into one clean list.
 //    $array = [];
 //    $year = date('Y');
 //    $month = date('m');
 //    $day = date('d');
 //    $hour = date('h');
 //    $minute = date('i');
 //    $second = date('s');
 //    array_push($array, $year, $month, $day, $hour, $minute, $second, $logLevel, $message, PHP_EOL);

 //    foreach ($array as $key => $item) {
 //    	if ($key < 2) {
	// 		fwrite($handle, $item . "-");
 //    	} else if ($key === 2) {
 //    		fwrite($handle, $item . " ");
 //    	} else if ($key < 5) {
 //    		fwrite($handle, $item . ":");
 //    	} else if ($key === 5) {
 //    		fwrite($handle, $item);
 //    	} else if ($key === 6) {
 //    		fwrite($handle, " [" . $item . "]");
 //    	} else {
 //            fwrite($handle, " " . $item);
 //        }

	// }

	fclose($handle);
}

logInfo("INFO", "This is an info message.");
logError("ERROR", "This is an info message.");


