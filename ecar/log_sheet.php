<?php # LOG SHEET

# Access session.
session_start() ;

$page_title = 'Log Sheet' ;
include ( 'includes/header_logout.php' ) ;



# Open database connection.
require ( 'includes/connect_db.php' ) ;

# Initialize an error array.
$errors = array();

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {

	
	if ( empty( $_POST[ 'check' ] ) || ( $_POST[ 'check' ] ) !="1")
		{ $errors[] = 'In order to proceed please complete the vehicle pre-check.' ; }
	else
		{ $ck = mysqli_real_escape_string( $link, trim( $_POST[ 'check' ] ) ) ;}
			
	if ( empty( $_POST[ 'purpose' ] ) )
		{ $errors[] = 'Enter the purpose' ; }
	else
		{ $pur = mysqli_real_escape_string( $link, trim( $_POST[ 'purpose' ] ) ) ;}
	
	if ( empty( $_POST[ 'number_passengers' ] ) )
		{ $errors[] = 'Enter the number of passengers' ; }
	else
		{ $pas = mysqli_real_escape_string( $link, trim( $_POST[ 'number_passengers' ] ) ) ;}
			
	if ( empty( $_POST[ 'start_mileage' ] ) )
		{ $errors[] = 'Enter the starting mileage' ; }
	else
		{ $sm = mysqli_real_escape_string( $link, trim( $_POST[ 'start_mileage' ] ) ) ;}
	
	if ( empty( $_POST[ 'end_mileage' ] ) )
		{ $errors[] = 'Enter the finish mileage' ; }
	else
		{ $em = mysqli_real_escape_string( $link, trim( $_POST[ 'end_mileage' ] ) ) ;}
	
	# On success update 'users' database table.
	if ( empty( $errors ) ) {
		$bd = $_POST['booking_details'];
		#Calculate the trip mileage
		$mil = $em - $sm ;
		#SQL query
		$q = "INSERT INTO log_sheet 
		VALUES (NULL, '$bd', '$ck', '$pur', '$pas', '$sm', '$em', '$mil')";
		$r = @mysqli_query ( $link, $q ) ;
		if ($r) { echo '
		<div class="container">
			<div class="alert alert-light alert-dismissible fade show" role="alert">
			<h1>Submitted</h1>
			<p>The log sheet is recorded.</p>
			<a href="user_login.php" class="btn btn-outline-dark">BACK</a>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
		</div>'; 
		}
		# Close database connection.
		mysqli_close($link); 
		exit();
	}
	# Or report errors.
	else {
		echo '<div class="container">
		<div class="alert alert-light alert-dismissible fade show" role="alert">
		<h1>Error!</h1>
		<p id="err_msg">The following error(s) occurred:<br>' ;
		foreach ( $errors as $msg )
		{ echo " - $msg<br>" ; }
		echo '<hr>
			<p class="mb-0">Try again OR <a href="user_login.php" class="btn btn-outline-dark">BACK</a></p>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
	   </div>
	  </div>';
	}
}

?>
<style>
.card{
	width: 46rem;
	height: 38rem;
	background-color: #FCFCFE!important;
}

.form-control:focus{
	border: 2px solid black;
	border-color: #1B3641;
	box-shadow: none;
}
</style>
<div class="container">
	<h1 class="text-center">Vehicle Log Sheet</h1>
	<div class="col-sm d-flex justify-content-center">
	</div>
	
<!-- Display body section with sticky form. -->
<form action="log_sheet.php" method="post">
  <div class="form-row">
    <div class="form-group col-sm d-flex justify-content-center">
	  <div class="card shadow p-3 mb-5 rounded">
	  <label for="charge_in">Select your trip from the drop down:</label>
		  <select id="booking_details" name="booking_details" style="margin-bottom: 20px;">
		  		  <?php 
		  # Retrieve data from 'bookings' database table. 
			$q = "SELECT * FROM bookings WHERE user_id='{$_SESSION['user_id']}'
			ORDER BY `bookings`.`date` , `bookings`.`time` ASC" ;
			$r = mysqli_query( $link, $q ) ;
			if ( mysqli_num_rows( $r ) > 0 ) { $user = mysqli_fetch_array( $r, MYSQLI_ASSOC ); 
			
				while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC )) 
				{
				echo'  
				<option value="' .$row['booking_id'].' " selected>Date: '.$row['date'].' &nbsp Booking ID: ' .$row['booking_id'].' &nbsp   
				Time: '.$row['time'].'&nbsp Registration: '.$row['reg'].' &nbsp Destination: '.$row['destination_campus'].'</option>';
				}
			}	
			else { echo '<option value="" selected> There are no bookings to select.</option>' ; }
			?>
			</select>
		<label for="check">Pre Use Check:</label>
		<select id="check" name="check" style="margin-bottom: 20px;">
		<option value="" disabled selected>Choose option</option>
		  <option value="0"<?php 
		  if($pre_post==="0"){ echo'selected';}?> >No</option>
		  <option value="1"<?php 
		  if($pre_post==="1"){ echo'selected';}?>>Yes</option>
		</select>

		<label for="purpose">Purpose:</label>
		<input type="text" class="form-control" id="purpose" name="purpose" placeholder="Max 100 characters." size="100" required 
		value="<?php if (isset($_POST['purpose'])) echo $_POST['purpose']; ?>"><br>
		<label for="number_passengers">Number of passengers:</label>
		<input type="number" class="form-control" id="number_passengers" name="number_passengers" placeholder="Enter a number" size="20" required
		 value="<?php if (isset($_POST['number_passengers'])) echo $_POST['number_passengers'];?>"><br>
		<label for="start_mileage">Start mileage:</label>
		<input type="number" class="form-control" id="start_mileage" name="start_mileage" placeholder="Enter miles" size="20" required 
		value="<?php if (isset($_POST['start_mileage'])) echo $_POST['start_mileage']; ?>"><br>
		<label for="end_mileage">Finish mileage:</label>
		<input type="number" class="form-control" id="end_mileage" name="end_mileage" size="20" placeholder="Enter miles" required 
		value="<?php if (isset($_POST['end_mileage'])) echo $_POST['end_mileage'];?>">
		<br>
		<div class="col-sm d-flex justify-content-center">
		<button type="submit" class="btn btn-outline-dark btn-lg">SUBMIT</button>
		</div>
	  </div> 
	</div>
  </div>
	
</form>
</div><!-- end of container-->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>