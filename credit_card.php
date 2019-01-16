<?php

	$connection = mysqli_connect('localhost', 'root', '', 'BabyCorp');
	$credit_card_name = $_POST['credit_card_name'];
	$exp_month = $_POST['exp_month'];
	$exp_year=$_POST['exp_year'];
	$cvv=$_POST['cvv'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$zip=$_POST['zip'];
	$country=$_POST['country'];
	$identifier=$_POST['identifier'];
	/*if(strlen($_POST['credit_card_no'])>16)
		{
		echo "Please Enter A valid card number";	
		}*/
	//$_SESSION['user_id'] = $user_id;
	$sql = "INSERT INTO pricing (credit_card_no,exp_month,exp_year,cvv,address,city,state,zip,country,identifier) VALUES ('$credit_card_no','$exp_month','$exp_year','$cvv','$address','$city','$state','$zip','$country','$identifier')";
	
	if ($connection->query($sql) === TRUE) {
	echo "<script type = 'text/javascript'>alert('Subscribed Successfully');
  						window.location.href='welcome.php';</script>";
  	}
	else{
	  	echo "Error is" .mysqli_error($connection);
	 }
	

?>
