<?php
//include('connect.php');
//$connection = mysqli_connect("localhost", "root", "class1mate","company");
// Selecting Database
//$db = mysql_select_db("company", $connection);
session_start();// Starting Session
// Storing Session

if(empty($_SESSION['ID'])){
// Closing Connection
header('location:home.php'); // Redirecting To Home Page
}
?>