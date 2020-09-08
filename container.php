<!DOCTYPE html>
<html lang="en">
<head>
<title>Login V4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
#log {
	font-size: 30px;
text-decoration: none;
padding-left: 1000px;


}
#log a{
	text-decoration: none;
}
body {
  background-image: url("images/bg-01.jpg");

}
	#p1{
		text-align: center;
		font-size:40px;
		color: black;
		padding-top: 0;
		padding-right: 50px;
	}
	#p2{
		text-align: center;
		font-size:20px;
		color: black;
		padding-top: 0;
		padding-right: 50px;
	}
	#p3{
		text-align: center;
		font-size:15px;
		color: black;
		padding-top: 0;
		padding-right: 50px;
	}
	#p4{
		text-align: center;
		font-size:18px;
		color: black;
		padding-top: 0;
		padding-right: 50px;
	}
	#fr li {
		list-style-type: none;
		padding-left: 530px;
	}

	#fr li a{
		text-decoration: none;
		
	}
</style>
</head>
<body>
<?php
include('session.php');
include('connect.php');
$ses_sql= "select * from login where id='$_SESSION[ID]'"; //and password='$_SESSION[pas]'";
$run = mysqli_query($connection,$ses_sql);
$row = mysqli_fetch_assoc($run);
include('dash.php');
?>
		
	

		<!--<a href="group.php"><p id="p4">Create Group Chat</p></a>
		<p id="p3">Click to chat</p>-->
		</body>
		<?php
		$nam=$row['name'];
		//echo $nam;
		$query = mysqli_query($connection,"select `name`,`id` from login where `name`!='$nam'");
		$result=$query;

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

  	$id=$row['id'];
  	$name=$row['name'];
    echo "<ul id='fr'>
    <li><a href='chat.php?id= $id'>$name</a></li>
    </ul>";
  }
} else {
  echo "0 results";
}
?>
</html>