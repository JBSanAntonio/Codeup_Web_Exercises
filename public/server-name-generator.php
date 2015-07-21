<?

 /*The pageController function handles all processing for this page.
 @return array An associative array of data to be used in rendering the html view.*/
function pageController(){
	$nouns = ['Cat', 'Kitten', 'Dog', 'Puppy', 'Panda', 'Giraffe', 'Cheetah', 'Meerkat', 'Whale', 'Gecko'];
	$adjectives = ['Furry', 'Cute', 'Cuddly', 'Peppy', 'Aggressive', 'Meek', 'Menacing', 'Mischievous', 'Frisky', 'Baby'];

	$data =[];
	$data['nounAdjectivePair'] = getRandom($adjectives) . " " . getRandom($nouns);
	return $data;
};

function getRandom($array){
	$randomVariable = mt_rand(0, count($array));
	return $array[$randomVariable];
};
/*Call the pageController funcion and extract all the returned array as local variables*/
extract(pageController());

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
	<h2><?php echo $nounAdjectivePair?></h2>
</body>
</html>