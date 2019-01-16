<?php
	session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'BabyCorp');
	$user_id = $_POST['user_id'];
	$password = $_POST['password'];
	$_SESSION['user_id'] = $user_id;
	$user_check_query = "SELECT * FROM user WHERE user_id='".$user_id."' AND PASSWORD = '".$password."'";
	$result = mysqli_query($conn, $user_check_query);
	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)>0){
  		echo "<script type = 'text/javascript'>alert('Logged In Successfully');
  						window.location.href='welcome.php';</script>";}
  						
  						
  	/*					 
	if(empty($user_id) || empty($password)){
   echo "<script type = 'text/javascript'>alert('You did not fill out the required fields.');window.location.href='login.html';
   </script>";
   } */
  	
  	?>
  	
	
 

