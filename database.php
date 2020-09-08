<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "company");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create table query execution
$sql = "CREATE TABLE login(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    gender VARCHAR(30) NOT NULL,
    country VARCHAR(70) NOT NULL,
    username VARCHAR(70) NOT NULL,
    email VARCHAR(70) NOT NULL,
    password VARCHAR(70) NOT NULL
)";


  $query = "CREATE TABLE data(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    logged_userid VARCHAR(30) NOT NULL,
    receiver_id VARCHAR(30) NOT NULL,
    message VARCHAR(70) NOT NULL
    
)";

if(mysqli_query($link, $sql))
if(mysqli_query($link, $query)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>