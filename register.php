<?php

	$conn = mysqli_connect('localhost', 'root', '', 'BabyCorp');
	$user_id = $_POST['user_id'];
	$first_name = $_POST['first_name'];
	$last_name=$_POST['last_name'];
	$password=$_POST['password'];
	if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,8}$/', $password)) {
		echo "<script type='text/javascript'>alert('the password does not meet the requirements!');window.location.href='register.html';</script>";
	}
		if(is_numeric($_POST['user_id']))
		{
			echo "<script type = 'text/javascript'>alert('Enter a valid username');
  						window.location.href='register.html';</script>";	
		}
	//$_SESSION['user_id'] = $username;
	$sql = "INSERT INTO user (user_id,first_name,last_name,password,plan_id,plan_name,credit_card_no) VALUES ('$user_id','$first_name','$last_name','$password','','','$user_id')";
	if ($conn->query($sql) === TRUE) {
	echo "<script type = 'text/javascript'>alert('Registered Successfully');
  						window.location.href='login.html';</script>";
  	}
  	
	else{
	  	echo "Error is" .mysqli_error($conn);
	 }
	

?>
