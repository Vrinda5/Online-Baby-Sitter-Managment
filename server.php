<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'BabyCorp');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE user_id='".$username."' AND PASSWORD = '".$password_1."'";
  if($result = mysqli_query($db, $user_check_query)){
  	echo "<script type = 'text/javascript'>alert('Logged In Successfully');
  						window.location.href='index.html';</script>";
  }
  else{
  	echo "Error in 36";
  }
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
      echo "Username exists";
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
      echo "Email exists";
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO user (user_name, email, password) 
  			  VALUES('$username', '$email', '$password_1')";
  	if(mysqli_query($db, $query)){
		echo "User Registered";
	}
	else{
		die("Error registering user :".mysqli_error($db));
	}
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}



//log user in from login page
if(isset($_POST['login_user'])) {
//if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);

 
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
 if(count($errors)==0) {
//$password=md5($password);//encrypt password before comparing with that from database
$query="SELECT * FROM users WHERE user_name='$username' AND password ='$password' ";
if($result=mysqli_query($db,$query)){
	echo "Successful execution";
}
else{
	die(mysqli_error($db));
}
if(mysqli_num_rows($result)>0) {
	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	echo "Successfully logged in";
  	header('Location: index.php');
}
else
{ array_push($errors,"The username or password is incorrect");
echo "Incorrect credenials ".mysqli_error($db);
header('location:login.php');
}
}
//}
}
//logout
if(isset($_GET['logout'])) {
session_destroy();
unset($_SESSION['username']);
header('location:login.php');

}
?>

