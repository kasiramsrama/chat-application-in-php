
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<link href="style1.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body id="getuser">
<?php
//session_start();
//include('rev.php');
include('session.php');
include('connect.php');
//include('login.php');

// SQL Query To Fetch Complete Information Of User
$ses_sql= "select * from login where id='$_SESSION[ID]' and password='$_SESSION[pas]'";
$run = mysqli_query($connection,$ses_sql);
$row = mysqli_fetch_assoc($run);
//$name=$_SESSION['name'];


//echo $ses_sql;
?>

<!--<div id="profile">
<b id="welcome">Welcome : <i><?//echo $row['name'];?></i>
<b id="logout"><a href="logout.php">Log Out</a></b>
</b>
</div>-->
<div class="chatbox">
			<div class="chatlogs">
		
					
					
				</div>
				
			

			<div class="chat-form" action="save.php" method="POST">
			<textarea  id="message" onkeypress="return event.keyCode != 13;" ></textarea>
			<button type="submit" id="submit"><i class="fa fa-paper-plane"></i>

</button>
			</div>
			</div>
			<script type="text/javascript">
	var height = 0;
$('.chatlogs').each(function(i, value){
    height += parseInt($(this).height());
});

height += '';

$('.chatlogs').animate({scrollTop: height},1000);

</script>

			<script type="text/javascript">
        
			/*if($('textarea').val().trim()==''){
   $("#submit").attr("disabled", true);  

}

$('textarea').keyup(function(){
    $("#submit").attr("disabled", true);
    val = $(this).val().trim();    
    if(val.length > 0){
        $("#submit").attr("disabled", false);
   }
});
*/

			
	</script>	
<!--<div id="save">
<form id="insert" action="save.php" method="post">
<input  type="text" id="message" placeholder="Type here" onkeypress="return event.keyCode != 13;"></input>
<button type="submit" id="submit">SAVE</button>   
</form>
</div>-->
<script>
        $('#insert').submit(function(){
	return false;
});            $("#submit").click(function(){
                var message=$("#message").val();
               
                $.ajax({
                    url:'save.php',
                    method:'POST',
                    data:{
                     message:message
                      
                    },
                   success:function(data){
                      $('input[type="text"],textarea').val('');
                      //alert(data);
                   }
                });
            });
        
    </script>
    <?
    $userid=$_GET['id'];
    //if (isset($_POST['submit'])){

	//$friends=mysqli_real_escape_string($connection, $_POST['friends']);
	//$sql="INSERT INTO `data` ('name') VALUES ('$friends')";
    $query = mysqli_query($connection,"select * from login where id='$userid'");
   // $querey = mysqli_query($connection,"insert into data(name) values('$friends')");
    
    
    
$rows = mysqli_num_rows($query);
if ($rows==0){
	echo"friends not found";
}
if ($rows == 1) {
	$show  = mysqli_fetch_array($query);

	//if($show['name']==$row['name']){
    if($show['id']==$row['id']){

			echo"user logged in";
		}
   else
   		$_SESSION['receiver_id']=$show['id'];
   	/*echo "<table border='1'>
   <tr>
   <td id='logged'>$show[name]</td>
   <td id='receiver_id'>You</td>
   </tr>
   </table>";*/
}


//echo $_SESSION['frend'];
?>
<script type="text/javascript">

      $(document).ready(function(){
      sendRequest();
      function sendRequest(){
          $.ajax({
            url: "fetch.php",
            success: 
              function(data){
               $('.chatlogs').html(data); //insert text of test.php into your div
               
            },
            complete: function() {
           // Schedule the next request when the current one's complete
           setInterval(sendRequest, 5000); // The interval set to 5 seconds
         }
        });
      };
    });
</script>


</body>
</html>
