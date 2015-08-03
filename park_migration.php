<?php
require_once 'db_connect.php';

$dbc = new PDO('mysql:host=127.0.0.1;dbname=parks_db', 'parks_user', 'parks');

/*Use exec() to delete a table named national_parks using DROP TABLE IF EXISTS.*/

$dropTable = "DROP TABLE IF EXISTS national_parks";

$dbc->exec($dropTable);

/*Create the query and assign to var*/
$createTable = "CREATE TABLE national_parks (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100),
    location VARCHAR(100),
    date_established DATE,
    area_in_acres DOUBLE(25, 2),
    PRIMARY KEY (id)
)";

/*Tell PDO to throw exceptions on error*/

$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*Run query, if there are errors they will be thrown as PDOExceptions*/

$dbc->exec($createTable);
?>