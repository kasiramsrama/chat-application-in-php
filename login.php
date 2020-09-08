<?php
session_start(); // Starting Session //include"session.php";
include('connect.php');

//$connection = mysqli_connect("localhost", "root", "class1mate","company");// Establishing Connection with Server by passing server_name, user_id and password as a parameter
//$error=''; // Variable To Store Error Message
if (empty($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
echo "Username or Password is invalid";
}
else
{
$username=$_POST['username']; // Define $username and $password
$password=$_POST['password'];

$username = stripslashes($username);// To protect MySQL injection for Security purpose
$password = stripslashes($password);
$query = mysqli_query($connection,"select * from login where username='$username'AND password='$password'");
//while($rows=mysqli_fetch_array($query)){
	
	///$_SESSION['login_user']=$username; 
	///$name=$rows['name'];
	//include"profile.php";
  // header("Location: profile.php");
	
//}

$rows = mysqli_num_rows($query);
if ($rows == 1) {
	$show  = mysqli_fetch_array($query);
	
$_SESSION['ID']=$show['id'];
$_SESSION['name']=$show['name']; 
$_SESSION['pas']=$show['password'];

//$name=$rows['name'];
//echo $name;
// Initializing Session
header('location:container.php'); // Redirecting To Other Page
} else {
echo "Username or Password is wrong";
}
mysqli_close($connection); // Closing Connection
}
}
?>