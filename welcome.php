<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="faq.css">
<head>
	<title>Welcome PAGE</title>
	<style>
		td {
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
      <h2>Welcome!</h2>
  </div>
  <hr></hr>
	<table align = 'center' border = "1px" style = "width: 900px; line-height:30px;">
	  	<tr>
	  		<th colspan = 5><h2>USER Details</h2> </th>
	  	</tr>
	  	<tr>
	  		<th> User ID </th>
	  		<th> First Name </th>
	  		<th> Last Name </th>
	  		<th> Plan ID </th>
	  		<th> Plan Name </th>
	  	</tr>
		<?php
			session_start();
			$user_id = $_SESSION['user_id'];
		   	$conn = mysqli_connect('localhost', 'root', '', 'BabyCorp');
		   	$sql_fetch_user_details = "SELECT * FROM user where user_id = '".$user_id."'";
		   	$result = mysqli_query($conn, $sql_fetch_user_details);
		   	//echo "<script type = 'text/javascript'>alert('.$user_id.');</script>";
		   	echo mysqli_error($conn);
		   	while($row = mysqli_fetch_assoc($result)){
		?>
		   		<tr>
		   			<td><?php echo $row['user_id']; ?></td>
		   			<td><?php echo $row['first_name']; ?></td>
		   			<td><?php echo $row['last_name']; ?></td>
		   			<td><?php echo $row['plan_id']; ?></td>
		   			<td><?php echo $row['plan_name']; ?></td>
		   		</tr>
		<?php
		   	}
		?>
	</table>
	<div class="help"><a href="baby_sitter_details.php">Click here to see your Baby Sitter's Details</a>
	</div>
  </div>
 </body>
</html>
  
  
  
  
  
  
  
