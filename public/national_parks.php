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

$natl_parks = $dbc->query('SELECT * FROM national_parks LIMIT ' . $limit . ' OFFSET ' . $offset)->fetchAll(PDO::FETCH_ASSOC);

?>

<html>
<head>
	<title>National Parks List</title>
	 <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
	<h1>National Parks</h1>

<!-- On each page load, it should retrieve and display all records from the database -->	<table>
	<table class="table table-striped">
	<? foreach($natl_parks as $park): ?>
		<tr>
			<td><?= $park['name']; ?>Park Name</td>
			<td><?= $park['location']; ?></td>
			<td><?= $park['date_established']; ?></td>
			<td><?= $park['area_in_acres']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
	<? if ($page >1 && $page <= $page_count): ?>
		<a href="?page=<?= $page -1; ?>">Previous page</a>
	<? endif; ?>
	<? if ($page < $page_count): ?>
		<a href="?page=<?= $page +1; ?>">Next page</a>
	<? endif; ?>
	
</body>
</html>

</body>
</html>

