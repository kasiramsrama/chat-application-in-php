<?
session_start();
include('connect.php');
$mail=$_SESSION['email'];
//coecho $ide;
//if (!isset($_POST['submit'])){
$password=mysqli_real_escape_string($connection, $_POST['password']);	
///$password=$_POST['password'];

$ses_sql= "update login SET password='$password' where email='$mail'"; 
//$run = mysqli_query($connection,$ses_sql);
if(mysqli_query($connection, $ses_sql)){
    echo "Your password updated";
	echo "<a href='home.php'>Click to login</a>";
		}
		else{
			echo"error";
		}
	//}
?>