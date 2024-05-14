<?php
// Read the JSON file
$jsonData = file_get_contents('recommendation_output.json');

// Parse the JSON data into a PHP array
$recommendedAreas = json_decode($jsonData, true);

// Access the area names
foreach ($recommendedAreas as $area) {
    echo $area . "<br>";
}

// You can also access individual area names by index
echo "First area: " . $recommendedAreas[0] . "<br>";
echo "Second area: " . $recommendedAreas[1] . "<br>";
echo "Third area: " . $recommendedAreas[2] . "<br>";
