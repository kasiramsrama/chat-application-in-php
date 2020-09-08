<?php
session_start();
//echo $_SESSION['frend'];
$conn = new mysqli('localhost', 'root', '', 'company');
if(empty($_POST['submit'])){
$message=$_POST['message'];
//$ses=$_SESSION['frend'];
//$logged_user=$_SESSION['name'];
$sql="INSERT INTO `data` (`logged_userid`,`receiver_id`,`message`) VALUES ('$_SESSION[ID]','$_SESSION[receiver_id]','$message')";
if ($conn->query($sql) === TRUE) {
    echo "data inserted";
}
else 
{
    echo "failed";
}
}
?>
