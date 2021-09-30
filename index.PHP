<?php


$errors  = array( );


if (isset($_POST['submit'])){
//submit button is clicked

	$file_name = $_FILES['image']['name'];
	$file_type = $_FILES['image']['type'];
	$file_size = $_FILES['image']['size'];
	$temp_name = $_FILES['image']['tmp_name'];

	$upload_to = 'img/';
//checking the fyle tipe

	if ($file_type !='image/JPG') {

		$errors[] = 'Only JPG files are allowed.';
	}

//cheking the file size
	if ($file_size > 500000) {
		$errors[] = 'File size should be less than 500kb.';
	}

	$file_uploaded = move_uploaded_file($temp_name, $upload_to . $file_name);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Image Upload</title>
<link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body>

	<!--Submit form container-->
	<div class="container">
		
<h1>Image Upload</h1>
<h3> Choose an image and click upload </h3>

<?php 
if (!empty($errors)) {
	echo '<div class= "rederr">';
	echo '<b> Files not updated. Check following errors: </b>,<br>';
	foreach ($errors as $errors ) {
		echo '- ' . $errors;
	}
	echo '</div>';
}

 ?>

<form action="index.php" method="post" enctype="multipart/form-data">
	
<input type="file" name="image" id="">
<p>Note: JPG files less than 10mb only.</p>

<button type="submit" name="submit"> Upload </button>

</form>


<?php 

if ($file_uploaded){
	echo "<h3>File uploaded sucessfuly!</h3>";
	echo '<img src="'.$upload_to . $file_name . '" style= "height : 200px" >';
}


 ?>


 <h3><a href="gallery.php"> Photo Gallery</a></h3>

	</div>
</body>
</html>