<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="faq.css">
<head>
	<title>Service Page</title>
	<style>
		td {
			padding: 5px;
			text-align: center;
		}
	</style>
</head>
<body>
  <div class="header">
    <img src="baby_corp.png">
    <h1>Baby Corp</h1>
    <div class="contact">
      <img src="call_logo.jpg">
      <div class="number">
        Call or Text us<br>+91 9487653201
      </div>
    </div>
   <! <button class="login"> 
   <!   Login 
    <! </button>   
    <div class="nav-bar">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="service.html">Services</a></li>
        <li><a href="pricing.html">Pricing</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="faq.html">FAQ's</a></li>
      </ul>
    </div>
    </div>  
  <hr>

   <div class="box">
   	<div class="help">
   		<h2>Find a Baby Corp!</h2>
   	</div>
   <table align = 'center' border = "1px" style = "width: 90%; line-height:30px;">
	  	<tr>
	  		<th colspan = 9><h2>Baby Sitter Details</h2> </th>
	  	</tr>
	  	<tr>
	  		<th> Photo </th>
	  		<th> Full Name </th>
	  		<th style = 'padding: 15px;'> Age </th>
	  		<th style = 'padding: 15px;'> Sex </th>
	  		<th> Address </th>
	  		<th> Email </th>
	  		<th> Age Group </th>
	  		<th> Zip </th>
	  		<th> Phone </th>
	  	</tr>
		<?php
			session_start();
			$user_id = $_SESSION['user_id'];
		   	$conn = mysqli_connect('localhost', 'root', '', 'BabyCorp');
		   	
		   	//Fetching Details from User Table
		   	$sql_fetch_user_details = "SELECT * FROM user where user_id = '".$user_id."'";
		   	$result = mysqli_query($conn, $sql_fetch_user_details);
		   	$row = mysqli_fetch_assoc($result);
		   	$credit_card = $row['credit_card_no'];
		   	
		   	//Fetching the identifier from the Pricing Table
		   	$sql_fetch_cc_details ="SELECT * FROM pricing where credit_card_no = '".$credit_card."'";
		   	$result = mysqli_query($conn, $sql_fetch_cc_details);
		   	$row = mysqli_fetch_assoc($result);
		   	$identifier = $row['identifier'];
		 	echo "<script type = 'text/javascript'>alert('".$identifier."');</script>";
		 	//Fetching the identifier from the Pricing Table
		   	$sql_fetch_id_details ="SELECT * FROM service";
		   	$result = mysqli_query($conn, $sql_fetch_id_details);
		   	while($row = mysqli_fetch_assoc($result)){
		?>
		   		<tr>
		   			<td><img src = '<?php echo $row['path'];?>' style='width: 150px; height: 150px;'></td>
		   			<td><?php echo $row['full_name']; ?></td>
		   			<td style = 'padding: 15px;'><?php echo $row['age']; ?></td>
		   			<td style = 'padding: 15px;'><?php echo $row['sex']; ?></td>
		   			<td><?php echo $row['address']; ?></td>
		   			<td><?php echo $row['email']; ?></td>
		   			<td><?php echo $row['age_group']; ?></td>
		   			<td><?php echo $row['zip']; ?></td>
		   			<td><?php echo $row['phone']; ?></td>
		   		</tr>
		<?php
		   	}
		?>
	</table>
	</div>  
</body>
</html>
