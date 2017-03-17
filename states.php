<?php

// 2. Using the following associative array, produce a script that does the following:
// 	- Outputs only the states with an "x" character in the state name
// 	- Outputs all the states without the letter "a" in their name
// 	- Outputs the states and abbreviations of all the states starting with vowels.

$states = [
    'AL' => 'Alabama',
    'AK' => 'Alaska',
    'AZ' => 'Arizona',
    'AR' => 'Arkansas',
    'CA' => 'California',
    'CO' => 'Colorado',
    'CT' => 'Connecticut',
    'DE' => 'Delaware',
    'DC' => 'District of Columbia',
    'FL' => 'Florida',
    'GA' => 'Georgia',
    'HI' => 'Hawaii',
    'ID' => 'Idaho',
    'IL' => 'Illinois',
    'IN' => 'Indiana',
    'IA' => 'Iowa',
    'KS' => 'Kansas',
    'KY' => 'Kentucky',
    'LA' => 'Louisiana',
    'ME' => 'Maine',
    'MD' => 'Maryland',
    'MA' => 'Massachusetts',
    'MI' => 'Michigan',
    'MN' => 'Minnesota',
    'MS' => 'Mississippi',
    'MO' => 'Missouri',
    'MT' => 'Montana',
    'NE' => 'Nebraska',
    'NV' => 'Nevada',
    'NH' => 'New Hampshire',
    'NJ' => 'New Jersey',
    'NM' => 'New Mexico',
    'NY' => 'New York',
    'NC' => 'North Carolina',
    'ND' => 'North Dakota',
    'OH' => 'Ohio',
    'OK' => 'Oklahoma',
    'OR' => 'Oregon',
    'PA' => 'Pennsylvania',
    'PR' => 'Puerto Rico',
    'RI' => 'Rhode Island',
    'SC' => 'South Carolina',
    'SD' => 'South Dakota',
    'TN' => 'Tennessee',
    'TX' => 'Texas',
    'VI' => 'US Virgin Islands',
    'UT' => 'Utah',
    'VT' => 'Vermont',
    'VA' => 'Virginia',
    'WA' => 'Washington',
    'WV' => 'West Virginia',
    'WI' => 'Wisconsin',
    'WY' => 'Wyoming'
];



$vowelCheck = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U"];

// foreach ($states as $abbreviation => $name) {
//     $length = strlen($name);
//     if ((in_array($name[0], $vowelCheck))){
//         echo "\033[01;31m $abbreviation - $name (starts with a vowel) \033[0m" . PHP_EOL;
//     }
// }

//////////////////////////////////////////
// States starting and ending with a vowel
//////////////////////////////////////////
$vowelStates = [];

foreach ($states as $abbreviation => $name) {
    $length = strlen($name);
    if ((in_array($name[0], $vowelCheck)) && (in_array($name[$length - 1], $vowelCheck))){
        array_push($vowelStates, $name);
    }
}

echo "These are the states starting and ending with vowels:" . PHP_EOL;

foreach ($vowelStates as $stateName) {
            echo $stateName . PHP_EOL;
        }

//////////////////////////////////////
// States that have more than one word
//////////////////////////////////////
$moreThanOneWord = [];

foreach ($states as $abbreviation => $name) {
    if (strpos($name, " ")) {
        array_push($moreThanOneWord, $name);
    }
}

echo PHP_EOL;

echo "These are the states that have more than one word:" . PHP_EOL;

foreach ($moreThanOneWord as $stateName) {
            echo $stateName . PHP_EOL;
        }

//////////////////////////////////////////////////////////
// States the contain the word North, East, South, or West
//////////////////////////////////////////////////////////
$arrayOfCardinalStates = [];

foreach ($states as $abbreviation => $name) {
    if (
        (strpos($name, "North")  !== false) ||
        (strpos($name, "East")  !== false) ||
        (strpos($name, "South")  !== false) ||
        (strpos($name, "West")  !== false)

        ){
        array_push($arrayOfCardinalStates, $name);
    }
}

echo PHP_EOL;

echo "These are the states that contain the word North, East, South, or West:" . PHP_EOL;

foreach ($arrayOfCardinalStates as $stateName) {
            echo $stateName . PHP_EOL;
        }






