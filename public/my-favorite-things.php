<?php
$favoriteThing = ['Italy', 'Travel', 'Wine', 'Cuisine', 'Hiking'];

?>
<!DOCTYPE html>
<html>

<head>
 	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/my-favorite-things.css">

	<title>5 of My Favorites</title>
<body>
	<h1>Some of My Favorite Things</h1>
	<table class = "table-striped">
		<?php foreach ($favoriteThing as $favoriteThings) { ?>
			<tr><td><?php echo $favoriteThings; ?></td></tr>
		<?php } ?>
	</table>
</body>
</html>

