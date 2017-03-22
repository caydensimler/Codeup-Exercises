<?php

// $file = "contacts.txt";
// $handle = fopen($file, "r");

// $contacts = fread($handle, filesize($file));

// function parseContacts($filename) {
//     $contacts = [];
//     $contacts = explode("\n", $filename);


//     foreach ($contacts as $person => $information) {
//     	$emptyArray = [];
//     	$information = explode("|", $information);

//     	foreach ($information as $key => $value) {


//     		if ($key === 0) {
//     			$emptyArray["name"] = $value;
//     		} else {
//     			$emptyArray["number"] = (substr($value, 0, 3) . "-" . (substr($value));
//     		}
//     	}


//     	$contacts[$person] = $emptyArray;

//     } 

//     echo var_dump($contacts);
//     return $contacts;
// }


// parseContacts($contacts);


function parseContacts($filename) {

	$contacts = [];

	$handle = fopen($filename, "r");
	$contents = trim(fread($handle, filesize($filename)));
	fclose($handle);

	$listOfContacts = explode("\n", $contents);
	
	foreach ($listOfContacts as $key => $contact) {
		$tempArray = explode("|", $contact);
		$contacts[$key]["name"] = $tempArray[0];
		$phone = substr($tempArray[1], 0, 3) . "-" . substr($tempArray[1], 3, 3) . "-" . substr($tempArray[1], 6);
		$contacts[$key]["number"] = $phone;
	}

	return $contacts;
}

var_dump(parseContacts('contacts.txt'));





