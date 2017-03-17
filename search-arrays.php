<?php

$names = ['Tina', 'Dana', 'Mike', 'Amy', 'Adam'];

$compare = ['Tina', 'Dean', 'Mel', 'Amy', 'Michael'];



function arraySearch($name) {

	$names = ['Tina', 'Dana', 'Mike', 'Amy', 'Adam'];

	if ((array_search($name, $names)) !== false) {
		echo "TRUE" . PHP_EOL;
	} else {
		echo "FALSE" . PHP_EOL;
	}
}

arraySearch('Dana');
