<?php
require_once 'parks_config.php';
require_once 'db_connect.php';

$dbc = new PDO('mysql:host=127.0.0.1;dbname=parks_db', 'parks_user', 'parks');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*First, add a query to delete all the records from national_parks*/
$deleteRecords = "TRUNCATE national_parks"; 

$dbc->exec($deleteRecords);

$nationalParksList = [
    ['name' => 'Wrangell-St. Elias National Park', 'location' => 'Alaska', 'date_established' => '1980-12-02', 'area_in_acres' => '8323147.59'],
    ['name' => 'Gates Of The Arctic National Park', 'location' => 'Alaska', 'date_established' => '1980-12-02', 'area_in_acres' => '7523897.74'],
    ['name' => 'Denali National Park', 'location' => 'Alaska', 'date_established' => '1917-02-26', 'area_in_acres' => '4740911.72'],
    ['name' => 'Katmai National Park', 'location' => 'Alaska', 'date_established' => '1980-12-02', 'area_in_acres' => '3674529.68'],
    ['name' => 'Death Valley National Park', 'location' => 'California', 'date_established' => '1994-10-31', 'area_in_acres' => '3372401.96'],
    ['name' => 'Glacier Bay National Park', 'location' => 'Alaska', 'date_established' => '1980-12-02', 'area_in_acres' => '3372401.96'],
    ['name' => 'Lake Clark National Park', 'location' => 'Alaska', 'date_established' => '1980-12-02', 'area_in_acres' => '3224840.31'],
    ['name' => 'Yellowstone National Park', 'location' => 'Wyoming', 'date_established' => '1872-03-01', 'area_in_acres' => '2619733.21'],
    ['name' => 'Kobuk Valley National Park', 'location' => 'Alaska', 'date_established' => '1980-12-02', 'area_in_acres' => '2219790.71'],
    ['name' => 'Everglades National Park', 'location' => 'Florida', 'date_established' => '1947-12-06', 'area_in_acres' => '1508537.90']
];

foreach ($nationalParksList as $list) {
    $query = "INSERT INTO national_parks (name, location, date_established, area_in_acres) VALUES ('{$list['name']}', '{$list['location']}', '{$list['date_established']}', '{$list['area_in_acres']}')";

    $dbc->exec($query);

    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}

?>