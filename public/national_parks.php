<?php
require_once '../parks_config.php';
require_once '../db_connect.php'; 
require_once '../Input.php';

$input = Input::get('page');

$errorMessage = '';


/*require post input for all fields*/
if(!empty($_POST)) {
	if (Input::has('name') && 
		Input::has('location') && 
		Input::has('date_established') &&
		Input::has('area_in_acres') && 
		Input::has('description')
	){
		$insertStmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description)
									VALUES (:name, :location, :date_established, :area_in_acres, :description)');

		$insertStmt->bindValue(':name', Input::get('name'), PDO::PARAM_STR);
		$insertStmt->bindValue(':location', Input::get('location'), PDO::PARAM_STR);
		$insertStmt->bindValue(':date_established', Input::get('date_established'), PDO::PARAM_STR);
		$insertStmt->bindValue(':area_in_acres', Input::get('area_in_acres'), PDO::PARAM_STR);
		$insertStmt->bindValue(':description', Input::get('description'), PDO::PARAM_STR);	
			$insertStmt->execute();
	} else {
		$errorMessage = "Missing Fields";
	}
}


/*You will need to determine the total number of parks in the database.
Modify your query to load only four parks at a time.*/

$limit = 4;
$offset = 0;
$stmt = $dbc->query('SELECT count (*) FROM national_parks');
// determine page_count
$page_count = ceil(($stmt->fetchColumn())/$limit);

if(!isset($input) || !is_numeric($input) || $input <1) {
	$input = 1;
	$page = 1;
} else {
	$offset = ($input - 1) * $limit;
	$page = $input;
}

if ($input > $page_count)
{
	header("Location: ?page=$page_count");
}

$stmt = $dbc->prepare('SELECT * FROM national_parks LIMIT :limit OFFSET :offset');
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$natl_parks = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<html>
<head>
	<title>National Parks List</title>
	 <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>

<div class="container">
	<h1>National Parks</h1>

<!-- On each page load, it should retrieve and display all records from the database -->	<table>
	<table class="table table-striped">
		<tr>
			<th>Park Name</strong></th>
			<th>Location</strong></th>
			<th>Date Established</strong></th>
			<th>Area in Acres</strong></th>
			<th>Description</strong></th>
		</tr>	
	<? foreach($natl_parks as $park): ?>
		
		<tr>
			<td><?= $park['name']; ?></td>
			<td><?= $park['location']; ?></td>
			<td><?= $park['date_established']; ?></td>
			<td><?= $park['area_in_acres']; ?></td>
			<td><?= $park['description']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
</div>

<div class="container nextPrevPage">
	<? if ($page >1 && $page <= $page_count): ?>
		<a href="?page=<?= $input -1; ?>">Previous page</a>
	<? endif; ?>
	<? if ($page < $page_count): ?>
		<a href="?page=<?= $input +1; ?>">Next page</a>
	<? endif; ?>
</div>

<div class="container">
	<h1>Insert a New Park</h1>
	<h3><?= $errorMessage ?></h3>
	<form  class="form-horizontal" method="POST" action="national_parks.php">
		<div class="form-group">
    		<label for="name" class="col-sm-2 control-label">Park Name</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="name" id="name" placeholder="Enter a park name">
    			</div>
    		<label for="location" class="col-sm-2 control-label">Park Location</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="location" id="location" placeholder="Enter a park location">
    			</div>
    		<label for="date_established" class="col-sm-2 control-label">Date established</label>
    			<div class="col-sm-10">
      				<input type="date" class="form-control" name="date_established" id="date_established" placeholder="Enter date park was established">
    			</div>
    		<label for="area_in_acres" class="col-sm-2 control-label">Park area in acres</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="area_in_acres" id="area_in_acres" placeholder="Enter area in acres without commas">
    			</div>
    		<label for="description" class="col-sm-2 control-label">Description of Park</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="description" id="description" placeholder="Enter description of park">
    			</div>
    	</div>
    	<button type="submit" class="btn btn-primary">Add New Park</button>
	</form>
</div>
</body>
</html>
</body>
</html>

