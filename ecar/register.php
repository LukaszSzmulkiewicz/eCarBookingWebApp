<html lang="en">
<head>

<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	
	<link rel="stylesheet" href="css/custom.css"></link>


</head>


<?php
	
	include('includes/header_login.html');
	
?>



<body class="bg-black">

<div class="col-sm d-flex justify-content-center">
<div class="card" style="">
				
<head><!-- Title -->
<title>WebFlix Registration</title>
</head>

<h1 ALIGN="CENTER" style="">Registration Form</h1>


<!-- Form starts here -->
<form action="register.php" method="post">
<table  class="table" border="0" align="center" style="">
<tbody>


<tr><!-- Name -->
<td><label for="name" class="reg-font">Name: </label></td>
<td><input name="name" maxlength="24" type="text" 
value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" required ></td>
</tr>

<tr><!-- Campus -->
<td><label for="campus" class="reg-font">Campus: </label></td>
<td><input name="campus" maxlength="24"  type="text"
value="<?php if (isset($_POST['campus'])) echo $_POST['campus']; ?>" required ></td>
</tr>
<tr><!-- Department -->
<td><label for="department" class="reg-font">Department: </label></td>
<td><input name="department" maxlength="24" type="text" 
value="<?php if (isset($_POST['department'])) echo $_POST['department']; ?>" required ></td>
</tr>
<tr><!-- Email Address -->
<td><label for="email" class="reg-font">Email: </label></td>
<td><input name="email" maxlength="24" type="text" 
value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required ></td>
</tr>
<tr><!-- Password -->
<td><label for="pass1" class="reg-font">Password: </label></td>
<td><input name="pass1" maxlength="24"  type="password" 
value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" required ></td>
</tr>
<tr><!-- Confirm Password -->
<td><label for="pass2" class="reg-font">Confirm Password: </label></td>
<td><input name="pass2" maxlength="24" type="password"
value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" required ></td>
</tr>
<tr><!-- Phone Number -->
<td><label for="phone_number" class="reg-font">Phone Number: </label></td>
<td><input name="phone_number" maxlength="18"  type="text"
value="<?php if (isset($_POST['phone_number'])) echo $_POST['phone_number']; ?>" required /></td>
</tr>
</tbody>
</table>
<!-- End of form, and submit button -->
<div style="text-align:center;">
	<input type="submit" class="btn" style="background-color: green;" value="Register" style="">
	<p style="text-align:center; "><br>Already registered?  <a href="login.php">Login Here</a></p>
</div>
</form>
</div>
</div>	

<? 
	if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
	{
		
	$name=$_POST['name'];
	$campus=$_POST['campus'];
	$email=$_POST['email'];
	$pass1=$_POST['pass1'];
	$pass2=$_POST['pass2'];
	$department=$_POST['department'];
	$phone_number=$_POST['phone_number'];
	
	  # Connect to the database.
	  require ('includes/connect_db.php'); 
	  
	  # The array() function is used to create an array: in this case and error array();
	  $errors = array();
	  
  # Check for a password and matching input passwords.
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = '<p class="errFont">Passwords do not match.</p>' ; }
    else
    { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = '<p class="errFont">Enter your password.</p>' ; }
  
  
  
  
# Check if email address already registered .
  if ( empty( $errors ) )
  {
    $q = "SELECT user_id FROM users WHERE email='$email'" ;
    $r = mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) {
		$errors[] = '<p class="errFont">Email address already registered.</p> <a href="login.php">Login Here</a>'; 
	}
  }
	
	if ( empty( $errors ) ){
		//try to enter the data into the database
		$q = "INSERT INTO users (name, campus, email, department, phone_number, password) 
					VALUES ('$name', '$campus', '$email', '$department', '$phone_number', SHA2('$pass1',256) );";    
		$r = mysqli_query ( $link, $q ) ;
			if ($r)
			{ echo '
				<div style="text-align:center;">
				<h1 style="text-align:center;">Registered!</h1><p>You are now registered.</p><p><a href="login.php">Login</a></p>
				</div>'; 
			}
			else{
				echo 'Something went wrong when registering';
			}
		  
			mysqli_close($link); 

		}
		  # Or report errors.
		else {
			echo '
				<div style="text-align:center;">
				<p><u>Error! The following error(s) occurred:</u></p>
				
			' ;
			foreach ( $errors as $msg ) { 
			echo $msg; 
			}
			echo '</div>';
			mysqli_close( $link );
		  } 
		  
			
	}

?>
</body>
</html>




