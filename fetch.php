<?php
session_start();
//if (isset($_POST['submit'])){
//$name=$_SESSION['frend'];

$conn = new mysqli('localhost', 'root', '', 'company');

$query = mysqli_query($conn,"select `message`,`logged_userid`,`receiver_id` FROM `data` where 
	(`logged_userid`='$_SESSION[ID]' and `receiver_id`='$_SESSION[receiver_id]') 
	OR 
	(`logged_userid`='$_SESSION[receiver_id]' and `receiver_id`='$_SESSION[ID]')");
	
/*$query = mysqli_prepare($conn, 'select message ,logged_userid FROM data where 
            (logged_userid = ? and receiver_id = ?) 
            OR 
            (logged_userid = ? and receiver_id = ?)');
mysqli_stmt_bind_param($query,'ssss', $_SESSION['ID'], $_SESSION['receiver_id'], $_SESSION['receiver_id'], $_SESSION['ID']);
mysqli_stmt_execute($query);*/

//$userChat = $query;
//$this->getData($sqlQuery);	
//		$conversation = '<ul>';
////		foreach($userChat as $chat){
	//		$user_name = '';
	//		if($chat["sender_userid"] == $from_user_id) {
$user=$_SESSION['ID'];
$rows=mysqli_num_rows($query);
if ($rows>0) {
	foreach($query as $messagee){
//while($messagee=mysqli_fetch_assoc($query)){
   if($messagee['logged_userid']==$_SESSION['ID']){
   	
     echo 
     "<p class ='right'>
                    <span style='background-color:grey'>$messagee[message]</span>
                    </p>";
                   /* "<div class='chat-friend'>
                    <div class='user-photo'></div>
                    <p class='chat-message'>$messagee[message]</p>
                    </div>";*/
            }
           else{    
            echo "<p class ='left'>
            <span style='background-color:blue'>$messagee[message]</span>
            </p>";
           /* "<div class='chat-self'>
                    <div class='user-photo'></div>
                    <p class='chat-message'>$messagee[message]</p>
                    </div>";*/

            }
		
   }
}
//}
//}

















//$userChat = $this->getData($sqlQuery);	
//		$conversation = '<ul>';
//		foreach($userChat as $chat){
//			$user_name = '';
/*		if($chat["sender_userid"] == $from_user_id) {
			while($display=mysqli_fetch_assoc($query)){
		//if($show['id']==$row['id'])
				//foreach($show as $chat){

		if($display["logged_user"]==$user){ 
			//$conservation='<ul>';
			echo "<p id ='right'>

					$display[message]
					</p>";
		}
		//elseif($show['name']= $name){ 
	//if($show['logged_user']=$_SESSION['ID']){
	else{	
		echo "<p id ='left'>
		$display[message]
		</p>";
	}
}
}
*/
//}
//}
?>
