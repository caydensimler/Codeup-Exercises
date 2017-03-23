<?php

// 
function retrieveContacts($filename) {
	clearstatcache();

	$contacts = [];

	$handle = fopen($filename, "r");
	$contents = trim(fread($handle, filesize($filename)));
	fclose($handle);

	$listOfContacts = explode("\n", $contents);

	sort($listOfContacts);
	
	foreach ($listOfContacts as $key => $contact) {
		$tempArray = explode("|", $contact);
		$contacts[$key]["name"] = $tempArray[0];
		if (strlen($tempArray[1]) === 10) {
			$phone = substr($tempArray[1], 0, 3) . "-" . substr($tempArray[1], 3, 3) . "-" . substr($tempArray[1], 6);
		} else if (strlen($tempArray[1]) === 7) {
			$phone = substr($tempArray[1], 0, 3) . "-" . substr($tempArray[1], 3, 4);
		}
		$contacts[$key]["number"] = $phone;
	}

	echo "/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\\" . PHP_EOL;
	echo "\033[0;35m\tNAME\t |\t NUMBER\033[0m" . PHP_EOL;
	echo "\\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/" . PHP_EOL;
	foreach ($contacts as $key => $contact) {

		$contactName = "\033[0;35m" . $contact['name'] . "\033[0m";
		$contactNumber = "\033[0;35m" . $contact['number'] . "\033[0m";
		// echo "\033[0;35m{str_pad($contact['name'], 15)} | {$contact['number']}\033[0m" . PHP_EOL;
		echo str_pad($contactName, 28) . "|" . "    " . $contactNumber . PHP_EOL;
		// var_dump($contactName) . PHP_EOL;
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
	$newContact = $firstName . " " . $lastName . "|" . $phoneNumber;
	return $newContact;


}

function addContactVerification($newContact, $filename) {
	fwrite(STDOUT, "Is the information correct (yes/no)?\033[01;33m $newContact\033[0m" . PHP_EOL);
	$informationCheck = trim(fgets(STDIN));

	// Displays the new contact information and prompts the user for a yes/no answer. If yes, then create the contact and add it to the contact file. If no, then have the user type in the information again.
	if ($informationCheck == "yes") {
		fwrite(STDOUT, "Contact created!\033[0;32m $newContact \033[0m");
		// fwrite(STDOUT,  . PHP_EOL);
		$handle = fopen($filename, 'a');
		fwrite($handle, PHP_EOL . $newContact);
		fclose($handle);
	} else if ($informationCheck == "no") {
		fwrite(STDOUT, "Re-write information." . PHP_EOL);
		addContactVerification(createContact($filename), $filename);
	} else {
		echo " " . PHP_EOL;
		echo "Cancelled." . PHP_EOL;
		userOptions($filename);
	}
}


function searchContacts($contacts){
	fwrite(STDOUT, "Search the contact by name: ");
	$nameSearch = trim(fgets(STDIN));

    foreach ($contacts as $key => $contact) {
        if (preg_match('('.$nameSearch.')', $contact['name'])) {
            echo "\033[0;34m" . $contact['name'] . " | " . $contact['number'] . "\033[0m" . PHP_EOL;
        }
    }
}

// echo "\033[01;34m" . $contact['name'] . " | " . $contact['number'] . "\033[0m" . PHP_EOL;

function deleteContact($filename){

    $handle = fopen($filename, 'r');
    $contacts = fread($handle, filesize($filename));
    $contacts = trim($contacts);
    fclose($handle);
    $tempArray = explode("\n", $contacts);

    fwrite(STDOUT, "Please enter contact name to delete:" . PHP_EOL);
    $nameDelete = trim(fgets(STDIN));

    foreach ($tempArray as $key => $value) {
        if (preg_match('('.$nameDelete.')', $value)) {

        	fwrite(STDOUT, "Are you sure you want to delete \033[0;31m $value \033[0m? (yes/no)" . PHP_EOL);
        	$confirmDeletion = trim(fgets(STDIN));
        	if ($confirmDeletion == "yes") {
	            array_splice($tempArray, $key, 1);
	            echo "Contact Deleted! \033[0;31m $value \033[0m" . PHP_EOL;
	        } else if ($confirmDeletion == "no") {
	        	userOptions($filename);
	        }
        }
    }


    $string = implode("\n", $tempArray);
    $handle = fopen($filename, 'w');
    fwrite($handle, "$string");
    fclose($handle);
    clearstatcache();
}


function userOptions($filename){
	$optionsArray = ["PLEASE ENTER AN OPTION", " ", "\033[0;35m1: VIEW ALL CONTACTS\033[0m", "\033[0;32m2: ADD A NEW CONTACT\033[0m", "\033[0;34m3: SEARCH FOR A CONTACT BY NAME\033[0m", "\033[0;31m4: DELETE AN EXISTING CONTACT\033[0m", "5: EXIT"];

	foreach ($optionsArray as $option){
		fwrite(STDOUT, $option . PHP_EOL);
	}

	$optionSelection = "";

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
			addContactVerification(createContact($filename), $filename);
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
			deleteContact($filename);
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

