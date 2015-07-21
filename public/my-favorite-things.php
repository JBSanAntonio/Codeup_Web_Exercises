<?

/*The pageController function handles all processing for this page.
 @return array An associative array of data to be used in rendering the html view.*/
function pageController() {	
	$data = [];
	$data['favoriteThings'] = ['Italy', 'Travel', 'Wine', 'Cuisine', 'Hiking'];

	return $data;
}

/*Call the pageController funcion and extract all the returned array as local variables*/
extract(pageController());

?>
<!DOCTYPE html>
<html>

<head>
 	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/my-favorite-things.css">

	<title>5 of My Favorites</title>
<body>
	<h1>Some of My Favorite Things</h1>
	<table class = "table table-striped">

		<? foreach ($favoriteThings as $key => $thing) : ?>
			<tr class = "tableRow"><td  class = "tableData"><? echo $thing; ?></td></tr>
		<? endforeach; ?>
	</table>
</body>
</html>

