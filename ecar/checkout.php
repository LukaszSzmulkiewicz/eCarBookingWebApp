

<?php # Display Checkout Page.
$page_title = ' Checkout ' ;

# starting a session, adding header and database connection files.
session_start() ;
include('includes/header_logout.php');
require ( 'includes/connect_db.php' ) ;

# Initialize an error array.
$errors = array();

# assigning session details into a variable
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ; 

# assigning  user id into a variable
$user_id = $_SESSION['user_id'];
# assigning  calendar field id into a variable
$booking_id = substr($id,0,2);

if( is_numeric($booking_id)){

# assigning  registration and location into a variable
$reg =  substr($id,2,7);
$location = substr($id,9,1);

if ($location==='S'){
    $location = 'Sighthill';
   
}
if ($location==='G'){
    $location = 'Granton';
    
}

if ($location==='M'){
    $location = 'Milton';
  
}
# assigning time and date into a variable
$time = substr($id,-15,5);
$date = substr($id,-10);

}
else
{
    # assigning booking id, registration and location into a variable
    $booking_id = substr($id,0,1);
    $reg =  substr($id,1,7);
    $location = substr($id,8,1);

if ($location==='S'){
    $location = 'Sighthill';
   
}
if ($location==='G'){
   $location = 'Granton';
   
}

if ($location==='M'){
    $location = 'Milton';
    
}
# assigning time and date into a variable
$time = substr($id,-15,5);
$date = substr($id,-10);
}

# checking if form submitted and assigning the form entries into variables
if (isset($_POST['submit'])) {

    if ( ( $_POST[ 'destination' ] ) == "" ) 
     { $errors[] = 'Please choose the destination.' ; }
 # On success update 'bookings' database table.
 
    $reg = $_POST[ 'reg' ]; 
    $location = $_POST[ 'location' ]; 
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $booking_id = $_POST['booking_id'];
    
    if ( empty( $errors ) ) {
    
    // updating bookings table
       $q = "INSERT INTO bookings (user_id, reg, origin_campus, destination_campus, date, time )
       VALUES ('$user_id', '$reg', '$location', '$destination', '$date', '$time')";
  
    $r = mysqli_query ( $link, $q ) ;
    if($r){
        if($time==='08:00'){
       
        $q = "UPDATE callendar
        SET eight = '$destination'
        WHERE id = '$booking_id'";
        $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='08:30'){
          
            $q = "UPDATE callendar
            SET eightHalf = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='09:00'){
           
            $q = "UPDATE callendar
            SET nine = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='09:30'){
          
            $q = "UPDATE callendar
            SET nineHalf = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='10:00'){
           
            $q = "UPDATE callendar
            SET ten = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='10:30'){
          
            $q = "UPDATE callendar
            SET tenHalf = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='11:00'){
            $q = "UPDATE callendar
            SET el = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='11:30'){
            $q = "UPDATE callendar
            SET elHalf = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='12:00'){
            $q = "UPDATE callendar
            SET tw = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='12:30'){
            $q = "UPDATE callendar
            SET twHalf = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='13:00'){
            $q = "UPDATE callendar
            SET th = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='13:30'){
            $q = "UPDATE callendar
            SET thHalf = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='14:00'){
            $q = "UPDATE callendar
            SET fo = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='14:30'){
            $q = "UPDATE callendar
            SET foHalf = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='15:00'){
            $q = "UPDATE callendar
            SET fi = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='15:30'){
            $q = "UPDATE callendar
            SET fiHalf = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='16:00'){
            $q = "UPDATE callendar
            SET si = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='16:30'){
            $q = "UPDATE callendar
            SET siHalf = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='17:00'){
            $q = "UPDATE callendar
            SET se = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='17:30'){
            $q = "UPDATE callendar
            SET seHalf = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='18:00'){
            $q = "UPDATE callendar
            SET ei = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='18:30'){
            $q = "UPDATE callendar
            SET eiHalf = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='19:00'){
            $q = "UPDATE callendar
            SET ni = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
        if($time==='19:30'){
            $q = "UPDATE callendar
            SET niHalf = '$destination'
            WHERE id = '$booking_id'";
            $f = mysqli_query ( $link, $q ) ;
        }
    # message after booking completed.
    echo '  <div class="d-flex align-items-center justify-content-center" style="height: 350px">
    <div class="p-2 bd-highlight col-example">
    <div class="card border-dark">
       <div class="card-body">
       <h2>Booking Completed.</h2>
       <a href="calendar.php"  
       class="btn btn-dark btn-block" style="background-color: #F05762;">Back</a>
      
       </div>
       </div>
       </div>';
    $db->close();
    }
}
   else 
   {
		echo '<div class="container">
		<div class="alert alert-light alert-dismissible fade show" role="alert">
		<h1>Error!</h1>
		<p id="err_msg">The following error(s) occurred:<br>' ;
		foreach ( $errors as $msg )
		{ echo " - $msg<br>" ; }
		echo '<hr>
			<p class="mb-0">Try again OR <a href="calendar.php" class="btn btn-outline-dark">BACK</a></p>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
	   </div>
	  </div>';
	}
}

?>

<h1 class="text-center display-4" style="color:#D50e0c;">Booking Summary </h1> 


<div class="d-flex align-items-center justify-content-center">
    <div class="p-2 bd-highlight col-example">

 <div class="container" style="border:1px solid #cecece;">
<div class="col-lg d-flex justify-content-center">	
<!--Booking Form -->

<form  action="checkout.php" method="post">
<hr>
        
            <div class="form-group">
                <label for="firstname"style="color:#285873;">Calendar Entry ID</label>
                <input type="text" class="form-control" id="booking_id" name="booking_id"  size="40" 
                value="<?php echo htmlspecialchars($booking_id, ENT_QUOTES);?>"readonly>
            </div>
            <div class="form-group">
                <label for="firstname"style="color:#285873;">Car Base Location</label>
                <input type="text" class="form-control" id="location" name="location"  size="40" 
                value="<?php echo htmlspecialchars($location, ENT_QUOTES);?>"readonly>
            </div>
            <div class="form-group">
                <label for="firstname"style="color:#285873;">Car Registration</label>
                <input type="text" class="form-control" id="reg" name="reg"  size="40" 
                value="<?php echo htmlspecialchars($reg, ENT_QUOTES);?>"readonly>
            </div>
            <div class="form-group">
                <label for="firstname"style="color:#285873;">Booking Date</label>
                <input type="text" class="form-control" id="date" name="date"  size="40" 
                value="<?php echo htmlspecialchars($date, ENT_QUOTES);?>"readonly>
            </div>
       
            <div class="form-group">
                <label for="firstname"style="color:#285873;">Booking Time</label>
                <input type="text" class="form-control" id="time" name="time"  size="40" 
                value="<?php echo htmlspecialchars($time, ENT_QUOTES);?>"readonly>
            </div>

            <div class="col-md-6 col-sm-12">
				<h3>
                Destination: <select name="destination" require>
                                <option value="" disabled selected>Choose option</option>
                                <option value="Sighthill">Sighthill</option>
                                <option value="Granton">Granton</option>
                                <option value="Milton">Milton</option>
                            </select>
				</h3>
			</div>
           

<hr>	

<div class="form-group">
<div class="row justify-content-center">
<input class="btn btn-dark btn-lg btn-block" style="background-color: #F05762;" type="submit" name="submit" value="Submit">
<a href="calendar.php"  class="btn btn-dark btn-lg btn-block" style="background-color: #F05762;" >Cancel</a>

</div>
</div>
</form><!--Closing Form -->
