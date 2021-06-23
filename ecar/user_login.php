<?php # DISPLAY USER PAGE.
$page_title = 'User Area ' ;
# adding a header file
include('includes/header_logout.php');



echo "<div class=\"container\"><h1 class=\"text-center display-4\">eCar Booking System</title></div>";
# Style the page
echo'<style>
.card{
	margin-top: 20px;
	margin-bottom: 20px;
	background-color: #1B3641!important;
	height: 300px;
	width: auto;
}

.vertical-center {
	margin: 0;
	position: absolute;
	top: 50%;
	-ms-transform: translateY(-50%);
	transform: translateY(-50%);
}

.btn-outline-light {
	color:  #1B3641;
	border: 2px solid black;
	border-color: #1B3641;
	background-color: #FCFCFE!important;
	
}

.btn-outline-light:hover{
	color: #FCFCFE!important;
	background-color: #F05762!important;
	border: 2px solid black;
	border-color: #F05762;
}

.btn-outline-danger {
	color:  #FCFCFE;
	border: 2px solid black;
	border-color: #F05762;
	background-color: #F05762!important;
}

.btn-outline-danger:hover{
	color: #1B3641!important;
	border-color: #F05762;
}

.modal-content{
	background-color: #FCFCFE!important;
 }

</style>';

echo '<div class="container">';


# Open database connection.
require ( 'includes/connect_db.php' ) ;
# Create query to retrieve items from 'payments' table, based on the user_id PHP set in session.
$q = "SELECT * FROM users WHERE user_id='{$_SESSION['user_id']}'" ;
#Create variable to validate database connection and query.
$r = mysqli_query( $link, $q ) ;
# If there is only one user with that ID proceed. If there isn't, error.
if ( mysqli_num_rows( $r ) == 1 ) {
	# Save the data in the variable user.
	$user = mysqli_fetch_array( $r, MYSQLI_ASSOC );
	# If the user is not active, the user will be blocked
	if ( $user['is_active'] != 1 ) {
		echo'
		<div class="row">
		  <div class="form-group col-sm d-flex justify-content-center" style="height: auto;">
			<div class="card shadow p-3 mb-5 rounded" >
				<p style="color: #FCFCFE;"><strong> You must undergo a familiarizing course. </p>
				<p style="color: #FCFCFE;">Please contact cars.maintenance@edinburghcollege.ac.uk to book your course.</p>
				<p style="color: #FCFCFE;">Until then, you cannot use this booking system.</p>
			</div>
		  </div>
	    </div>';
	}
	# If the user is active
	else {
		echo '
		<div class="row"> <!-- first row -->
		 <div class="col-sm-12 col-md-6">
			<div class="card shadow p-3 mb-5 rounded" >
			  <div class="vertical-center" style="left: 40%;">
				<p><a href="" class="btn btn-outline-light" data-toggle="modal" data-target="#user_details"><strong>User Details</strong></a></p>	
			  </div>
			</div>
		 </div>
		 
		 <div class="col-sm-12 col-md-6">
			<div class="card shadow p-3 mb-5 rounded" >
			  <div class="vertical-center" style="left: 35%;">
				<p><a href="#" class="btn btn-outline-light" data-toggle="modal" data-target="#password"><strong>Change Password</strong></a></p>
			  </div>
			</div>
		 </div>
		</div> <!-- end of first row -->
		<div class="row"><!-- second row -->
			<div class="col-sm-12 col-md-6">
			<div class="card shadow p-3 mb-5 rounded" >
			  <div class="vertical-center" style="left: 35%;">
				<a href="book_his.php?id='.$user['user_id'].'" class="btn btn-outline-light btn-block"><strong>Booking History</strong></a>
			  </div>
			</div>
		 </div>
		 
		 <div class="col-sm-12 col-md-6">
		 <div class="card shadow p-3 mb-5 rounded" >
		   <div class="vertical-center" style="left: 20%;">
		   <h2 style="color:#FCFCFE; text-align:center;"><strong> Forms</strong></h2>
			 <a href="log_sheet.php" class="btn btn-outline-danger"><strong>Vehicle Log Sheet</strong></a>
			 <a href="check_sheet.php" class="btn btn-outline-danger"><strong>Vehicle Check Sheet</strong></a>
		   </div>
		 </div>
	  </div>
		 
		 ';
		}
}



#Close database connection.
mysqli_close( $link ) ;
?>

</div> <!-- end of container --> 

<!--  =============================
=====    Modal User Details   =======
	=================================== -->	 
	
<div class="modal fade" id="user_details" tabindex="-1" role="dialog" aria-labelledby="user_details" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="exampleModalCenterTitle">User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>
      <div class="modal-body">
	  <?php
	  echo'
		<p><strong> Name : </strong> ' . $user['name'] . ' </p>
		<p><strong> Campus : </strong> ' . $user['campus'] . ' </p>
		<p><strong> Department : </strong> ' . $user['department'] . ' </p>
		<p><strong> Phone Number : </strong> ' . $user['phone_number'] . ' </p>
		<p><strong> Email : </strong> ' . $user['email'] . ' </p>';
	  ?>
	  </div>
	  <div class="modal-footer border-0">
		<button type="button" class="btn btn-outline-dark" data-dismiss="modal">Back</button>
	  </div>
    </div>
  </div>
</div>

<!--  =============================
=====    Modal Change Password   =======
	=================================== -->	 
	
<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="password" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="change_password.php" method="post">
            <div class="form-group">
                <input type="password" 
				       name="pass1" 
					   class="form-control" 
					   placeholder="New Password"
					   value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" required>

            </div>
            <div class="form-group">
                <input type="password" 
					   name="pass2" 
					   class="form-control" 
					   placeholder="Confirm New Password"
					   value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" required>

            </div>
				<div class="modal-footer border-0">
				  <div class="form-group">
					<input type="submit" name="btnChangePassword" class="btn btn-outline-dark btn-block" value="Save Changes"/>
				  </div>
				</div>
         </form>
      </div>
    </div>
  </div>
</div>
 
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>