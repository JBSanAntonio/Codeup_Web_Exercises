<?php

	function pageController()
	{
	    // Initialize an empty data array and set counter to zero
	    $data = [];
	    $counter = 0;

	    /*if is a query string get request, update data counter so that counter adds one for up and subtracts one for down*/
	    if(isset($_GET['request'])){
	    	if ($_GET['request'] == 'hit'){
	    		$_GET['count']++;
	    		$data['counter']=$_GET['count'];
	    	} elseif ($_GET['request'] == 'miss'){
	    		// $_GET['count'] = 0;
	    		$data['counter'] = 0;
	    		echo 'Game Over';
	    	}
  		}
	    return $data; 
	}

	if(!empty($_GET)) {
		extract(pageController());
 	} else {
 		$counter = 0;
 	}
 	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Counter PHP</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel = "stylesheet" href = "/css/pingPong.css"> 
</head>
<body class = "pingBody">
	<h3 class = "pingH3">The count is <?=$counter?></h3>
	
	<div class = "pingRow">
		<a class = "col-md-4" href="http://codeup.dev/pong.php?request=hit&count=<?=$counter;?>">Pong Hit</a>
		<a  class = "col-md-4" href="http://codeup.dev/pong.php?request=miss&count=<?=$counter;?>">Pong Miss</a>
	</div>
</body>
</html>