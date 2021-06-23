<?php

session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	 <link rel="stylesheet" href="css/custom.css"><!--mystylesheet-->
	 <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"><!--google fonts -->
    <title>eCar</title>
  </head>
  <body>
   <style type="text/css">
   body { background: #F2F2F4} 
   </style>
    <nav class="navbar navbar-expand-lg navbar-dark" >
	</nav>
    <nav class="navbar navbar-expand-lg navbar-light" >
		<a class="navbar-brand" href="user_login.php"><img src="img/logo.png" width="70" height="30" alt=""></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav mr-auto">
			<li class="nav-item active">
			  <a class="nav-link" href="user_login.php">My Account
				<span class="sr-only">(current)</span>
			  </a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" align="middle" href="calendar.php">Calendar</a>
			</li>
		  </ul>
		  <form class="form-inline my-2 my-lg-0">
			<a href="logout.php"class="btn btn-outline-dark my-2 my-sm-0">Log out</a>
		  </form>
		</div>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-dark" >
	</nav><!-- end primary navigation -->