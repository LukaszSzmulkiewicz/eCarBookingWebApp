
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
	
	<? include('includes/header_login.html'); 

	if ( isset( $errors ) && !empty( $errors ) )
	{
		echo '<p id="err_msg">Oops! There was a problem:<br>' ;
		foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
		echo 'Error. Please try again or <a href="register.php">Register</a></p>' ;
	}

?>
</head>


<html>

<body>
	<h1 style="text-align:center;">Login</h1>
	<form action="login_action.php" method="post">
	<table border="0" align="center">
	<tbody>

	<tr><!--Email -->
	<td><label for="email">Email: </label></td>
	<td><input name="email" maxlength="50"  type="text" placeholder="email" </td>
	</tr>
	
	<tr><!--Password -->
	<td><label for="password">Password: </label></td>
	<td><input name="password" maxlength="50"  type="password" placeholder="password" /></td>
	</tr>
	
	<tr><!--Login button -->
	<td></td>
	<td><input type="submit" value="Login" > </td>
	</tr>
	
	
	<tr>
	<td></td>
	<td>No Account? Register <a href="register.php">Here</a></td>
	</tr>
	


</body>
