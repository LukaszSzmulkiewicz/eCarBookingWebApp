<?php 
$page_title = 'Change Password' ;
include('includes/header_logout.php');
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
 # Connect to the database.
 require ('includes/connect_db.php');
 
 # Initialize an error array.
 $errors = array();
 
# Check for a password and matching input passwords
 if ( !empty($_POST[ 'pass1' ] ) )
 {
 if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
 { $errors[] = 'Passwords do not match.' ; }
 else
 { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
 }
 else { $errors[] = 'Enter your password.' ; }
 
 # On success new password into 'users' table.
 if ( empty( $errors ) )
 {
 $q = "UPDATE users SET password= SHA2('$p',256) WHERE user_id='{$_SESSION[user_id]}'";
 $r = @mysqli_query ( $link, $q ) ;
 if ($r)
 {
 header("Location: user_login.php");
 } 
 else {
 echo "Error updating record: " . $link->error;
 }
 # Close database connection.
mysqli_close($link);
 exit();
 }

#Or report errors.
 else
 {
 echo ' <div class="container"><div class="alert alert-light alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
	<h1><strong>Error!</strong></h1><p>The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo 'Please try again.
	<a href="user_login.php" class="btn btn-outline-dark" style= "font-size: 30px">Back</a>
	</div></div>';
    # Close database connection.
    mysqli_close( $link ); } } 
 ?>