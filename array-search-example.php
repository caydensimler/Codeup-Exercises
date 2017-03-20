<?php 


$foods = [
	'fruit' => 'apple',
	'meat' => 'chicken',
	'veggie' => 'zucchini',
];

if (isset($_GET['search'])) {

	$foodToFind = strtolower($_GET['search']);

	$searchResult = array_search($foodToFind, $foods);

	if (is_string($searchResult)) {
		echo ucfirst($foodToFind) . " is a type of " . $searchResult . ".";
	} else {
		echo "Sorry, no foods were found by that name.";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
</head>
<body>

	<form method="_GET">
		<input type="text" name="search" id="search" placeholder="Search for Foods">
		<button type="submit">Search</button>
	</form>



</body>
</html>




