<?php 
include('connect.php');
if (!isset($_POST['submit'])){
	$name=mysqli_real_escape_string($connection, $_POST['name']);	
	$gender=mysqli_real_escape_string($connection, $_POST['gender']);	
	$country=mysqli_real_escape_string($connection, $_POST['country']);	
	$username=mysqli_real_escape_string($connection, $_POST['username']);
	$email=mysqli_real_escape_string($connection, $_POST['email']);
	$password=mysqli_real_escape_string($connection, $_POST['password']);
	

   //setcookie("name",md5($name));
//}
		
		$a="INSERT INTO login(name, gender, country, username,email,password) values ('$name', '$gender', '$country','$username','$email','$password')";
		if(mysqli_query($connection, $a)){
    echo "Your ac created";
	echo "<a href='home.php'>Click to login</a>";
		}
		else{
			echo"error";
		}
 
}


	?>