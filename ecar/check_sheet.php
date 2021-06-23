<?php # CHECK SHEET

# Access session.
session_start() ;

$page_title = 'Check Sheet' ;
include ( 'includes/header_logout.php' ) ;

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ; 

# Open database connection.
require ( 'includes/connect_db.php' ) ;

# Initialize an error array.
$errors = array();

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
	
	# assigning form values into variables
	$pre_post = $_POST[ 'pre_post' ] ;
	$charge_in =  $_POST[ 'charge_in' ];
	$charge_lead = $_POST[ 'charge_lead' ];
	$swipe_card = $_POST[ 'swipe_card' ];
	$wipers = $_POST[ 'wipers' ];
	$windows = $_POST[ 'windows' ];
	$mirrors = $_POST[ 'mirrors' ];
	$indicators = $_POST[ 'indicators' ];
	$lights = $_POST[ 'lights' ];
	$horn = $_POST[ 'horn' ];
	$belts = $_POST[ 'belts' ];
	$body_damage = $_POST[ 'body_damage' ];
	$tyres = $_POST[ 'tyres' ];
	$first_aid_kit = $_POST[ 'first_aid_kit' ];
	$hi_vis_vest = $_POST[ 'hi_vis_vest' ];
	$triangle = $_POST[ 'triangle' ];
	$clean = $_POST[ 'clean' ];
	# Damages and comments can be empty
	if (empty( $_POST[ 'damage_desc' ] ) )
	{ $dd = '' ; }
	else
	{ $dd = mysqli_real_escape_string( $link, trim( $_POST[ 'damage_desc' ] ) ) ; }

	if (empty( $_POST[ 'comments' ] ) )
	{ $com = '' ; }
	else
	{ $com = mysqli_real_escape_string( $link, trim( $_POST[ 'comments' ] ) ) ; }
	
	
	if ((( $_POST[ 'pre_post' ] ) == "" ) || (( $_POST[ 'charge_in' ] ) == "" ) || (( $_POST[ 'charge_lead' ] ) == "" ) || 
		(( $_POST[ 'swipe_card' ] ) == "" ) ||  (( $_POST[ 'wipers' ] )== "" ) || (( $_POST[ 'windows' ] ) == "" ) || 
		(( $_POST[ 'mirrors' ] ) == "" ) || (( $_POST[ 'indicators' ] ) == "") || (( $_POST[ 'lights' ] ) == "") ||
		(( $_POST[ 'horn' ] ) == "" ) || (( $_POST[ 'belts' ] ) == "" ) || (( $_POST[ 'body_damage' ] ) == "" ) ||
	   	(( $_POST[ 'tyres' ] ) == "" ) || (( $_POST[ 'first_aid_kit' ] ) == "" ) || (( $_POST[ 'hi_vis_vest' ] ) == "" ) ||
	   	(( $_POST[ 'triangle' ] ) == "" ) || (( $_POST[ 'clean' ] ) == "" ) )
		{ $errors[] = 'You must check all listed items.' ; }
	# On success update 'users' database table.
	if ( empty( $errors ) ) {
		
		#Calculate the trip mileage
		$mil = $em - $sm ;
		$id = $_POST[ 'booking_details' ];

		if ((( $_POST[ 'charge_in' ] ) == 0 ) || (( $_POST[ 'charge_lead' ] ) == 0 ) || 
		(( $_POST[ 'swipe_card' ] ) == 0 ) ||  (( $_POST[ 'wipers' ] )== 0 ) || (( $_POST[ 'windows' ] ) == 0 ) || 
		(( $_POST[ 'mirrors' ] ) == 0 ) || (( $_POST[ 'indicators' ] ) == 0) || (( $_POST[ 'lights' ] ) == 0 ) ||
		(( $_POST[ 'horn' ] ) == 0 ) || (( $_POST[ 'belts' ] ) == 0 ) || (( $_POST[ 'body_damage' ] ) == 0 ) ||
	   	(( $_POST[ 'tyres' ] ) == 0 ) || (( $_POST[ 'first_aid_kit' ] ) == 0 ) || (( $_POST[ 'hi_vis_vest' ] ) == 0 ) ||
	   	(( $_POST[ 'triangle' ] ) == 0 ) ){
			$q = "INSERT INTO check_sheet 
			VALUES (NULL,'$id', '$pre_post', '$charge_in', '$charge_lead', '$swipe_card', '$wipers', '$windows', '$mirrors', 
			'$indicators', '$lights', '$horn', '$belts', '$body_damage', '$tyres', '$first_aid_kit', '$hi_vis_vest', '$triangle', 
			'$triangle','$dd', '$com')";
			$r = @mysqli_query ( $link, $q ) ;
			echo'
		
			<div class="container">
			<div class="alert alert-danger alert-dismissible fade show justify-content-center" role="alert"">
				<h1>Worning !!!</h1>
				<p><strong> You have discovered that some items are not functioning as suposed to. </p>
				<p>This should be reported to the Janitor and vehicle should not be driven!!!</p>
				<a href="user_login.php" class="btn btn-outline-dark">BACK</a>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>
			</div>'; 
		   }
		   else
		   {
		#SQL query
		$q = "INSERT INTO check_sheet 
		VALUES (NULL,'$id', '$pre_post', '$charge_in', '$charge_lead', '$swipe_card', '$wipers', '$windows', '$mirrors', 
		'$indicators', '$lights', '$horn', '$belts', '$body_damage', '$tyres', '$first_aid_kit', '$hi_vis_vest', '$triangle', 
		'$triangle','$dd', '$com')";
		$r = @mysqli_query ( $link, $q ) ;
		if ($r) { echo '
		<div class="container">
			<div class="alert alert-light alert-dismissible fade show" role="alert">
			<h1>Submitted</h1>
			<p>The check sheet is recorded.</p>
			<a href="user_login.php" class="btn btn-outline-dark">BACK</a>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
		</div>'; 
		}
	}
		# Close database connection.
		mysqli_close($link); 
		exit();
	}
	# Or report errors.
	else {
		echo '<div class="container">
		<div class="alert alert-light alert-dismissible fade show justify-content-center" role="alert">
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
	width: 30rem;
	height: 115rem;
	background-color: #FCFCFE!important;
}

.form-control:focus{
	border: 2px solid black;
	border-color: #1B3641;
	box-shadow: none;
}
</style>
<div class="container">
	<h1 class="text-center">Vehicle Check Sheet</h1>

	<div class="col-sm d-flex justify-content-center">
	</div>
	
<!-- Display body section with sticky form. -->
<form action="check_sheet.php" id="check_form" method="post">
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
				<option value="' .$row['booking_id'].' " selected>Date: '.$row['date'].' &nbsp Booking ID: ' .$row['booking_id'].' &nbsp   Time: '.$row['time'].'</option>
				';
				}
			}	
			else { echo '<option value="" selected> There are no bookings to select.</option>' ; }
			?>
			</select>
		<label for="pre_post">Pre or post trip check:</label>
		<select id="pre_post" name="pre_post" style="margin-bottom: 20px;">
		<option value="" disabled selected>Choose option</option>
		  <option value="pre"<?php 
		  if($pre_post==="pre"){ echo'selected';}?> >Pre check</option>
		  <option value="post"<?php 
		  if($pre_post==="post"){ echo'selected';}?>>Post check</option>
		</select>  	  
		<label for="charge_in">Charge in vehicle:</label>
		<select id="charge_in" name="charge_in" style="margin-bottom: 20px;">
		<option value="" disabled selected>Choose option</option>
		  <option value="0" <?php 
		  if($charge_in==="0"){ echo'selected';}?>>NO</option>
		  <option value="1" <?php 
		  if($charge_in==="1"){ echo'selected';}?>>YES</option>
		</select>
		<label for="charge_lead">Electrical charge lead:</label>
		<select id="charge_lead" name="charge_lead" style="margin-bottom: 20px;">
		<option value="" disabled selected>Choose option</option>
		<option value="0" <?php 
		  if($charge_lead==="0"){ echo'selected';}?>>NO</option>
		  <option value="1" <?php 
		  if($charge_lead==="1"){ echo'selected';}?>>YES</option>
		</select>
		<label for="swipe_card">Charge post swipe card:</label>
		<select id="swipe_card" name="swipe_card" style="margin-bottom: 20px;">
		<option value="" disabled selected>Choose option</option>
		<option value="0" <?php 
		  if($swipe_card==="0"){ echo'selected';}?>>NO</option>
		  <option value="1" <?php 
		  if($swipe_card==="1"){ echo'selected';}?>>YES</option>
		</select>
		<label for="wipers">Washers and wipers:</label>
		<select id="wipers" name="wipers" style="margin-bottom: 20px;">
			<option value="" disabled selected>Choose option</option>
			<option value="0" <?php 
		  if($wipers==="0"){ echo'selected';}?>>NO</option>
		  <option value="1" <?php 
		  if($wipers==="1"){ echo'selected';}?>>YES</option>
		</select>
		<label for="windows">Windows and windscreen:</label>
		<select id="windows" name="windows" style="margin-bottom: 20px;">
		<option value="" disabled selected>Choose option</option>
		<option value="0" <?php 
		  if($windows==="0"){ echo'selected';}?>>NO</option>
		  <option value="1" <?php 
		  if($windows==="1"){ echo'selected';}?>>YES</option>
		</select>
		<label for="mirrors">Clean, intact:</label>
		<select id="mirrors" name="mirrors" style="margin-bottom: 20px;">
		<option value="" disabled selected>Choose option</option>
		<option value="0" <?php 
		  if($mirrors==="0"){ echo'selected';}?>>NO</option>
		  <option value="1" <?php 
		  if($mirrors==="1"){ echo'selected';}?>>YES</option>
		</select>
		<label for="indicators">Indicators working:</label>
		<select id="indicators" name="indicators" style="margin-bottom: 20px;">
		<option value="" disabled selected>Choose option</option>
		<option value="0" <?php 
		  if($indicators==="0"){ echo'selected';}?>>NO</option>
		  <option value="1" <?php 
		  if($indicators==="1"){ echo'selected';}?>>YES</option>
		</select>
		<label for="lights">Lights working:</label>
		<select id="lights" name="lights" style="margin-bottom: 20px;">
			<option value="" disabled selected>Choose option</option>
			<option value="0" <?php 
		  if($lights ==="0"){ echo'selected';}?>>NO</option>
		  <option value="1" <?php 
		  if($lights==="1"){ echo'selected';}?>>YES</option>
		</select>
		<label for="horn">Horn:</label>
		<select id="horn" name="horn" style="margin-bottom: 20px;">
		<option value="" disabled selected>Choose option</option>
		<option value="0" <?php 
		  if($horn ==="0"){ echo'selected';}?>>NO</option>
		  <option value="1" <?php 
		  if($horn ==="1"){ echo'selected';}?>>YES</option>
		</select>
		<label for="belts">Seat belts:</label>
		<select id="belts" name="belts" style="margin-bottom: 20px;">
		<option value="" disabled selected>Choose option</option>
		<option value="0" <?php 
		  if($belts==="0"){ echo'selected';}?>>NO</option>
		  <option value="1" <?php 
		  if($belts==="1"){ echo'selected';}?>>YES</option>
		</select>
		<label for="body_damage">Body damage:</label>
		<select id="body_damage" name="body_damage" style="margin-bottom: 20px;">
		<option value="" disabled selected>Choose option</option>
		<option value="0" <?php 
		  if($body_damage==="0"){ echo'selected';}?>>NO</option>
		  <option value="1" <?php 
		  if($body_damage==="1"){ echo'selected';}?>>YES</option>
		</select>
		<label for="tyres">Tyre condition (visual inspection):</label>
		<select id="tyres" name="tyres" style="margin-bottom: 20px;">
		<option value="" disabled selected>Choose option</option>
		<option value="0" <?php 
		  if($tyres==="0"){ echo'selected';}?>>NO</option>
		  <option value="1" <?php 
		  if($tyres==="1"){ echo'selected';}?>>YES</option>
		</select>
		<label for="first_aid_kit">First Aid Kit:</label>
		<select id="first_aid_kit" name="first_aid_kit" style="margin-bottom: 20px;">
		<option value="" disabled selected>Choose option</option>
		<option value="0" <?php 
		  if($first_aid_kit==="0"){ echo'selected';}?>>NO</option>
		  <option value="1" <?php 
		  if($first_aid_kit==="1"){ echo'selected';}?>>YES</option>
		</select>
		<label for="hi_vis_vest">Hight Visibility Vest:</label>
		<select id="hi_vis_vest" name="hi_vis_vest" style="margin-bottom: 20px;">
		<option value="" disabled selected>Choose option</option>
		<option value="0" <?php 
		  if($hi_vis_vest==="0"){ echo'selected';}?>>NO</option>
		  <option value="1" <?php 
		  if($hi_vis_vest==="1"){ echo'selected';}?>>YES</option>
		</select>
		<label for="triangle">Warning triangle:</label>
		<select id="triangle" name="triangle" style="margin-bottom: 20px;">
		<option value="" disabled selected>Choose option</option>
		<option value="0" <?php 
		  if($triangle==="0"){ echo'selected';}?>>NO</option>
		  <option value="1" <?php 
		  if($triangle==="1"){ echo'selected';}?>>YES</option>
		</select>
		<label for="clean">Wipe down:</label>
		<select id="clean" name="clean" style="margin-bottom: 20px;">
		<option value="" disabled selected>Choose option</option>
		<option value="0" <?php 
		  if($clean==="0"){ echo'selected';}?>>NO</option>
		  <option value="1" <?php 
		  if($clean==="1"){ echo'selected';}?>>YES</option>
		</select>
		<label for="damage_desc">Describe all damages discovered, if any:</label>
		<textarea name="damage_desc" form="check_form" style="min-height:60px; width:auto;" maxlenght="100" placeholder="Max 100 characters">
		<?php if (isset($_POST['damage_desc'])) echo $_POST['damage_desc']; ?></textarea><br>
		<p>In case of any damage discovered before, during or after the use of the vehicle, maintenance team must be notified at cars.maintenance@edinburghcollege.ac.uk</p>
		<label for="comments">Any other comments on the vehicle:</label>
		<textarea name="comments" form="check_form" style="min-height:60px; width:auto;" maxlenght="100" placeholder="Max 100 characters">
		<?php if (isset($_POST['comments'])) echo $_POST['comments']; ?></textarea><br>
		<p>When pressing submit, I confirm that the vehicle is in the condition indicated in this form</p>
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