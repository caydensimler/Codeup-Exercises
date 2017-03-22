<?php

// 
function retrieveContacts($filename) {
	clearstatcache();

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

	foreach ($contacts as $key => $contact) {
		echo $contact['name'] . " | " . $contact['number'] . PHP_EOL;
	}

	echo "" . PHP_EOL;

	return $contacts;
}


// Create a new contact with a name and phone number. Allows the user to verify information before submitting.
function createContact($filename){

	// First name input
	fwrite(STDOUT, "First name: " . PHP_EOL);
		$firstName = trim(fgets(STDIN));

	// Last name input
	fwrite(STDOUT, "Last name: " . PHP_EOL);
		$lastName = trim(fgets(STDIN));

	// Phone number input
	fwrite(STDOUT, "Phone Number: " . PHP_EOL);
		$phoneNumber = trim(fgets(STDIN));

	// Assigns the contact information to a new contact each time the function runs
	$newContact = PHP_EOL . $firstName . " " . $lastName . "|" . $phoneNumber;
	fwrite(STDOUT, "Is the information correct (yes/no)?  " . $newContact . PHP_EOL);
	$informationCheck = trim(fgets(STDIN));

	// Displays the new contact information and prompts the user for a yes/no answer. If yes, then create the contact and add it to the contact file. If no, then have the user type in the information again.
	if ($informationCheck == "yes") {
		fwrite(STDOUT, "Contact created!" . PHP_EOL);
		$handle = fopen($filename, 'a');
		fwrite($handle, $newContact);
		fclose($handle);
	} else {
		fwrite(STDOUT, "Re-write information." . PHP_EOL);
		createContact($filename);
	}
}


function searchContacts($contacts){
	fwrite(STDOUT, "Search the contact by first name:" . PHP_EOL);
	$nameSearch = trim(fgets(STDIN));

	
		// var_dump($nameSearch);
	// var_dump($nameSearch);
	foreach ($contacts as $key => $contact) {
		// var_dump($contact);
		// foreach ($contact as $array => $information) {
			if ((in_array($nameSearch, $contact)) !== false) {
				echo "SUCCESS";
			// } else if ($contact['name'] !== $nameSearch) {
			} else if ((in_array($nameSearch, $contact)) === false) {
				echo "FAILURE";
			}
		// }
	}
}


function deleteContact(){

}


function userOptions($filename){
	$optionsArray = ["PLEASE ENTER AN OPTION", " ", "1: VIEW ALL CONTACTS", "2: ADD A NEW CONTACT", "3: SEARCH FOR A CONTACT BY NAME", "4: DELETE AN EXISTING CONTACT", "5: EXIT"];

	foreach ($optionsArray as $option){
		fwrite(STDOUT, $option . PHP_EOL);
	}

	$optionSelection = trim(fgets(STDIN));

	switch ($optionSelection) {
		// Displays all the contacts
		case 1:
			fwrite(STDOUT, " " . PHP_EOL);
			retrieveContacts($filename);
			fwrite(STDOUT, " " . PHP_EOL);
			fwrite(STDOUT, "____________________" . PHP_EOL);
			userOptions($filename);
			break;
		// Adds a new contact
		case 2: 
			createContact($filename);
			fwrite(STDOUT, " " . PHP_EOL);
			fwrite(STDOUT, "____________________" . PHP_EOL);
			userOptions($filename);
			break;
		// Searches for a contact
		case 3:
			searchContacts(retrieveContacts($filename));
			fwrite(STDOUT, " " . PHP_EOL);
			fwrite(STDOUT, "____________________" . PHP_EOL);
			userOptions($filename);
			break;
		// Deletes an existing contact
		case 4: 
			echo "Test 4" . PHP_EOL;
			fwrite(STDOUT, " " . PHP_EOL);
			fwrite(STDOUT, "____________________" . PHP_EOL);
			userOptions($filename);
			break;
		// Exits the interface
		case 5:
			fwrite(STDOUT, " " . PHP_EOL);
			fwrite(STDOUT, "Goodbye!" . PHP_EOL);
			break;
	}
}



userOptions('contacts.txt');



