<?php

	var_dump($_GET);

	function pageController()
	{
	    // Initialize an empty data array and set counter to zero
	    $data = [];
	    $counter = 0;

	    /*if is a query string get request, update data counter so that counter adds one for up and subtracts one for down*/
	    if(isset($_GET['request'])){
	    	if ($_GET['request'] == 'up'){
	    		$_GET['count']++;
	    		$data['counter']=$_GET['count'];
	    	} elseif ($_GET['request'] == 'down'){
	    		$_GET['count']--;
	    		$data['counter']=$_GET['count'];
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
</head>
<body>
	<h2>The count is <?=$counter?></h2>
	<a href="?request=up&count=<?=$counter;?>">Up</a>
	<a href="?request=down&count=<?=$counter;?>">Down</a>
</body>
</html>