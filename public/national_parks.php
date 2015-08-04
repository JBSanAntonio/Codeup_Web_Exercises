<?php
require_once '../parks_config.php';
require_once '../db_connect.php';

/*You will need to determine the total number of parks in the database.
Modify your query to load only four parks at a time.*/

$limit = 4;
$offset = 0;
$stmt = $dbc->query('SELECT count (*) FROM national_parks');
// determine page_count
$page_count = ceil(($stmt->fetchColumn())/$limit);

if(!isset($_GET['page']) || !is_numeric($_GET['page']) || $_GET['page'] <1) {
	$_GET['page'] = 1;
	$page = 1;
} else {
	$offset = ($_GET['page'] - 1) * $limit;
	$page = $_GET['page'];
}

if ($_GET['page'] > $page_count)
{
	header("Location: ?page=$page_count");
}

$query = 'SELECT * FROM national_parks LIMIT :limit OFFSET :offset';
$stmt = $dbc->prepare($query);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$natl_parks = $stmt->fetchAll(PDO::FETCH_ASSOC);

/*add if statement IF POST NAME is set and post location is set and date_established is set...*/
if (isset($_POST['name']) && isset($_POST['location']) && isset($_POST['date_established']) && isset($_POST['area_in_acres']) && isset($_POST['description'])) {
	$stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)');
	$stmt->bindValue(':name', $list['name'], PDO::PARAM_STR);
	$stmt->bindValue(':location', $list['location'], PDO::PARAM_STR);
	$stmt->bindValue(':date_established', $list['date_established'], PDO::PARAM_STR);
	$stmt->bindValue(':area_in_acres', $list['area_in_acres'], PDO::PARAM_STR);
	$stmt->bindValue(':description', $list['description'], PDO::PARAM_STR);
	$stmt->execute();	
}            

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
	<? foreach($natl_parks as $park): ?>
		<tr>
			<td><?= $park['name']; ?>Park Name</td>
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
		<a href="?page=<?= $page -1; ?>">Previous page</a>
	<? endif; ?>
	<? if ($page < $page_count): ?>
		<a href="?page=<?= $page +1; ?>">Next page</a>
	<? endif; ?>
</div>

<div class="container">
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
    		<label for="date_established" class="col-sm-2 control-label">Park Location</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="date_established" id="date_established" placeholder="Enter date park was established">
    			</div>
    		<label for="area_in_acres" class="col-sm-2 control-label">Park area in acres</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="area_in_acres" id="area_in_acres" placeholder="Enter date park established in YYYY-MM-DD format">
    			</div>
    		<label for="description" class="col-sm-2 control-label">Description of Park</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="description" id="description" placeholder="Enter date park was established">
    			</div>
    	</div>
    	<button type='submit'>Add new park</button>
	</form>
</div>

		

	
</body>
</html>

</body>
</html>

