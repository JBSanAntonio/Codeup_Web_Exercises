<?php
	 
$nouns = ['Cat', 'Kitten', 'Dog', 'Puppy', 'Panda', 'Giraffe', 'Cheetah', 'Meerkat', 'Whale', 'Gecko'];
$adjectives = ['Furry', 'Cute', 'Cuddly', 'Peppy', 'Aggressive', 'Meek', 'Menacing', 'Mischievous', 'Frisky', 'Baby'];

function getRandom($array){
	$randomVariable = mt_rand(0, count($array));
	return $array[$randomVariable];
};
$nounAdjectivePair = getRandom($adjectives) . " " . getRandom($nouns);

?>

<!DOCTYPE html>
<html>
<head>
 	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/server-name-generator.css">

	<title></title>
</head>
<body>
	<h1>Server Name:</h1>
	<h2><?php echo $nounAdjectivePair ?></h2>
</body>
</html>