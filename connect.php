<?php	
	$connection=mysqli_connect("localhost","root","","company");
	if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>