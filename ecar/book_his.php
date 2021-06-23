<?php # DISPLAY BOOKING HISTORY.
$page_title = ' Booking History ' ;

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ; 

include('includes/header_logout.php');

echo '
<style>

table {
	background-color: #FCFCFE!important;
	border-collapse: collapse;
	border-spacing: 0;
	width: 100%;
	border: 2px solid black;
	margin-top: 30px;
}

th, td {
	border: 2px solid black!important;
	text-align: left;
	padding: 8px;
	white-space: nowrap;
}

tr:nth-child(even) {
  background-color: #F2F2F4;
}

</style>

<div class="container">
	<h2 class="text" style="margin-top: 20px;">My Bookings</h2>
	<table>
    <thead>
      <tr style="background-color: #1B3641; color:#FCFCFE;">
        <th>ID</th>
		<th>Car</th>
        <th>Origin</th>
		<th>Destination</th>
		<th>Date</th>
        <th>Time</th>
	
      </tr>
    </thead>
    <tbody>';
		require ( 'includes/connect_db.php' ) ;
		$q = "SELECT * FROM bookings WHERE user_id =$id ORDER BY `bookings`.`date` , `bookings`.`time` ASC";
		$r = mysqli_query( $link, $q ) ;
		if ( mysqli_num_rows( $r ) > 0 ) {
			while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC )) {
			echo '
			<tr>
				<th>' . $row['booking_id'] . '</th>
				<th>' . $row['reg'] . '</th>
				<th>' . $row['origin_campus'] . '</th>
				<th>' . $row['destination_campus'] . '</th>
				<th>' . $row['date'] . '</th>
				<th>' . $row['time'] . '</th>
			
			</tr> '; 
			}
		}
		else { echo '
			<tr>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				
			</tr> ';  }
			
		mysqli_close( $link ) ;
		echo '
    </tbody>
  </table>

</div> ';

?>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>