<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Photo Gallery</title>






</head>
<body>
	<div class="container">
<h3>Photo Gallery</h3>

<h3><a href="index.php">Upload Image</a></h3>		

<div class="gallery">
	
<?php 

//reading the list of files in the folder



$file_list = scandir('img/');


foreach ($file_list as  $file) {
	if ( substr($file, strlen($file)-1) == 'JPG') {
		echo '<br>';
		echo '<img src="img/'. $file . '">';
	}
}


 ?>



</div>




	</div>



</body>
</html>