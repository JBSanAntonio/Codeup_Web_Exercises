<?php
$dbc = new PDO('mysql:host=127.0.0.1;dbname=parks_db', 'parks_user', 'parks');

/*First, add a query to delete all the records from national_parks*/
$deleteRecords = 'national_parks ()';

$dbc->exec($deleteRecords);

$nationalParksList = [
    ['name' => 'Wrangell-St. Elias National Park'],
    ['name' => 'Gates Of The Arctic National Park'],
    ['name' => 'Denali National Park'],
    ['name' => 'Katmai National Park'],
    ['name' => 'Death Valley National Park'],
    ['name' => 'Glacier Bay National Park'],
    ['name' => 'Lake Clark National Park'],
    ['name' => 'Yellowstone National Park'],
    ['name' => 'Kobuk Valley National Park'],
    ['name' => 'Everglades National Park'],
];

foreach ($nationalParksList as $query) {
    $query = "INSERT INTO users (name) VALUES ('{$user['name']}')";

    $dbc->exec($query);

    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}

?>