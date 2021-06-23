
<style>
 body { margin:0; }
table {
	background-color: #FCFCFE!important;
	border-collapse: collapse;
	border-spacing: 0;
	width: 100%;
	border: 2px solid black;
	margin-top: 10px;
	
	
}

th, td {
	border: 1px solid black!important;
	text-align: left;
	
   margin: 0;
	white-space: nowrap;
}

tr:nth-child(even) {
  background-color: #F2F2F4;
  margin: 0;
}

</style>


<?php # DISPLAY Callendar.
$page_title = 'Callendar ' ;

# adding header and database connection files.
include('includes/header_logout.php');
require ( 'includes/connect_db.php' ) ;
# Create query to retrieve items from 'users' table, based on the user_id PHP set in session.
$q = "SELECT * FROM users WHERE user_id='{$_SESSION['user_id']}'" ;
#Create variable to validate database connection and query.
$r = mysqli_query( $link, $q ) ;
# If there is only one user with that ID proceed. If there isn't, error.
if ( mysqli_num_rows( $r ) == 1 ) {
	# Save the data in the variable user.
	$user = mysqli_fetch_array( $r, MYSQLI_ASSOC );
	# If the user is not active, the user will be blocked
	if ( $user['is_active'] != 1 ) {
		header("Location:user_login.php");
	}
};
# displaying table day header to the user
echo '
<div class="container-fluid">
	
	<table>
    <thead>
      <tr style="background-color: #1B3641; color:#FCFCFE;">
        <th>Monday &nbsp &nbsp &nbsp  07/06/21 </th>
		<th>08:00</th>
        <th>08:30</th>
		<th>09:00</th>
		<th>09:30</th>
        <th>10:00</th>
		<th>10:30</th>
        <th>11:00</th>
        <th>11:30</th>
		<th>12:00</th>
		<th>12:30</th>
        <th>13:00</th>
		<th>13:30</th>
        <th>14:00</th>
        <th>14:30</th>
		<th>15:00</th>
		<th>15:30</th>
        <th>16:00</th>
		<th>16:30</th>
        <th>17:00</th>
        <th>17:30</th>
		<th>18:00</th>
		<th>18:30</th>
        <th>19:00</th>
		<th>19:30</th>
      </tr>
    </thead>
    <tbody>';
	# displaying all entries related to Monday
		$q = "SELECT *  FROM callendar WHERE day='Monday'" ;
		$r = mysqli_query( $link, $q ) ;
		if ( mysqli_num_rows( $r ) > 0 ) {
			while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC )) {
			# if statements to check if a calendar field has been booked or not.
			echo '
            <tbody>
			<tr>
			<th>' . $row['reg'] . ' ' . $row['location'] . '</th>
			'.((is_numeric(substr($row['eight'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['eight'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['eight'] . '</th>').'

			'.((is_numeric(substr($row['eightHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['eightHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['eightHalf'] . '</th>').'

			'.((is_numeric(substr($row['nine'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['nine'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['nine'] . '</th>').'	

			'.((is_numeric(substr($row['nineHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['nineHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['nineHalf'] . '</th>').'		

			'.((is_numeric(substr($row['ten'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['ten'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['ten'] . '</th>').'

			'.((is_numeric(substr($row['tenHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['tenHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['tenHalf'] . '</th>').'

			'.((is_numeric(substr($row['el'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['el'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['el'] . '</th>').'

			'.((is_numeric(substr($row['elHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['elHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['elHalf'] . '</th>').'

			'.((is_numeric(substr($row['tw'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['tw'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['tw'] . '</th>').'

			'.((is_numeric(substr($row['twHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['twHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['twHalf'] . '</th>').'

			'.((is_numeric(substr($row['th'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['th'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['th'] . '</th>').'

			'.((is_numeric(substr($row['thHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['thHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['thHalf'] . '</th>').'

			'.((is_numeric(substr($row['fo'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['fo'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['fo'] . '</th>').'

			'.((is_numeric(substr($row['foHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['foHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['foHalf'] . '</th>').'

			'.((is_numeric(substr($row['fi'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['fi'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['fi'] . '</th>').'

			'.((is_numeric(substr($row['fiHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['fiHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['fiHalf'] . '</th>').'

			'.((is_numeric(substr($row['si'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['si'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['si'] . '</th>').'

			'.((is_numeric(substr($row['siHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['siHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['siHalf'] . '</th>').'

			'.((is_numeric(substr($row['se'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['se'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['se'] . '</th>').'

			'.((is_numeric(substr($row['seHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['seHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['seHalf'] . '</th>').'

			'.((is_numeric(substr($row['ei'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['ei'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['ei'] . '</th>').'

			'.((is_numeric(substr($row['eiHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['eiHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['eiHalf'] . '</th>').'

			'.((is_numeric(substr($row['ni'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['ni'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['ni'] . '</th>').'

			'.((is_numeric(substr($row['niHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['niHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['niHalf'] . '</th>').'
			'; 
			}
		}
		# display if no data to show
		else { echo '
			<tr>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
			</tr> ';  }
		echo '
    </tbody>
  </table>

</div> ';
# displaying table day header to the user
echo '
<div class="container-fluid">
	<table>
    <thead>
      <tr style="background-color: #1B3641; color:#FCFCFE;">
        <th>Tusday &nbsp &nbsp &nbsp &nbsp 08/06/21 </th>
		<th>08:00</th>
        <th>08:30</th>
		<th>09:00</th>
		<th>09:30</th>
        <th>10:00</th>
		<th>10:30</th>
        <th>11:00</th>
        <th>11:30</th>
		<th>12:00</th>
		<th>12:30</th>
        <th>13:00</th>
		<th>13:30</th>
        <th>14:00</th>
        <th>14:30</th>
		<th>15:00</th>
		<th>15:30</th>
        <th>16:00</th>
		<th>16:30</th>
        <th>17:00</th>
        <th>17:30</th>
		<th>18:00</th>
		<th>18:30</th>
        <th>19:00</th>
		<th>19:30</th>
      </tr>
    </thead>
    <tbody>';
		# displaying all entries related to Tusday
		$q = "SELECT *  FROM callendar WHERE day='Tusday'" ;
		$r = mysqli_query( $link, $q ) ;
		if ( mysqli_num_rows( $r ) > 0 ) {
			while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC )) {
			# if statements to check if a calendar field has been booked or not.
			echo '
			
            <tbody>
            
			<tr>
			<th>' . $row['reg'] . ' ' . $row['location'] . '</th>
			'.((is_numeric(substr($row['eight'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['eight'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['eight'] . '</th>').'

			'.((is_numeric(substr($row['eightHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['eightHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['eightHalf'] . '</th>').'

			'.((is_numeric(substr($row['nine'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['nine'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['nine'] . '</th>').'	

			'.((is_numeric(substr($row['nineHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['nineHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['nineHalf'] . '</th>').'		

			'.((is_numeric(substr($row['ten'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['ten'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['ten'] . '</th>').'

			'.((is_numeric(substr($row['tenHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['tenHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['tenHalf'] . '</th>').'

			'.((is_numeric(substr($row['el'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['el'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['el'] . '</th>').'

			'.((is_numeric(substr($row['elHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['elHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['elHalf'] . '</th>').'

			'.((is_numeric(substr($row['tw'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['tw'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['tw'] . '</th>').'

			'.((is_numeric(substr($row['twHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['twHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['twHalf'] . '</th>').'

			'.((is_numeric(substr($row['th'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['th'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['th'] . '</th>').'

			'.((is_numeric(substr($row['thHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['thHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['thHalf'] . '</th>').'

			'.((is_numeric(substr($row['fo'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['fo'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['fo'] . '</th>').'

			'.((is_numeric(substr($row['foHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['foHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['foHalf'] . '</th>').'

			'.((is_numeric(substr($row['fi'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['fi'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['fi'] . '</th>').'

			'.((is_numeric(substr($row['fiHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['fiHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['fiHalf'] . '</th>').'

			'.((is_numeric(substr($row['si'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['si'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['si'] . '</th>').'

			'.((is_numeric(substr($row['siHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['siHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['siHalf'] . '</th>').'

			'.((is_numeric(substr($row['se'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['se'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['se'] . '</th>').'

			'.((is_numeric(substr($row['seHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['seHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['seHalf'] . '</th>').'

			'.((is_numeric(substr($row['ei'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['ei'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['ei'] . '</th>').'

			'.((is_numeric(substr($row['eiHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['eiHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['eiHalf'] . '</th>').'

			'.((is_numeric(substr($row['ni'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['ni'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['ni'] . '</th>').'

			'.((is_numeric(substr($row['niHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['niHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['niHalf'] . '</th>').'


			'; 
			}
		}
		# display if no data to show
		else { echo '
			<tr>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
			</tr> ';  }
			
	
		echo '
    </tbody>
  </table>

</div> ';
# displaying table day header to the user
echo '
<div class="container-fluid">
	
	<table>
    <thead>
      <tr style="background-color: #1B3641; color:#FCFCFE;">
        <th>Wednesday 09/06/21 </th>
		<th>08:00</th>
        <th>08:30</th>
		<th>09:00</th>
		<th>09:30</th>
        <th>10:00</th>
		<th>10:30</th>
        <th>11:00</th>
        <th>11:30</th>
		<th>12:00</th>
		<th>12:30</th>
        <th>13:00</th>
		<th>13:30</th>
        <th>14:00</th>
        <th>14:30</th>
		<th>15:00</th>
		<th>15:30</th>
        <th>16:00</th>
		<th>16:30</th>
        <th>17:00</th>
        <th>17:30</th>
		<th>18:00</th>
		<th>18:30</th>
        <th>19:00</th>
		<th>19:30</th>
      </tr>
    </thead>
    <tbody>';
		# displaying all entries related to Wednesday
		$q = "SELECT *  FROM callendar WHERE day='Wednesday'" ;
		$r = mysqli_query( $link, $q ) ;
		if ( mysqli_num_rows( $r ) > 0 ) {
			while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC )) {
			# if statements to check if a calendar field has been booked or not.
			echo '
			
            <tbody>
            
			<tr>
			<th>' . $row['reg'] . ' ' . $row['location'] . '</th>
			'.((is_numeric(substr($row['eight'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['eight'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['eight'] . '</th>').'

			'.((is_numeric(substr($row['eightHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['eightHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['eightHalf'] . '</th>').'

			'.((is_numeric(substr($row['nine'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['nine'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['nine'] . '</th>').'	

			'.((is_numeric(substr($row['nineHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['nineHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['nineHalf'] . '</th>').'		

			'.((is_numeric(substr($row['ten'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['ten'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['ten'] . '</th>').'

			'.((is_numeric(substr($row['tenHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['tenHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['tenHalf'] . '</th>').'

			'.((is_numeric(substr($row['el'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['el'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['el'] . '</th>').'

			'.((is_numeric(substr($row['elHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['elHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['elHalf'] . '</th>').'

			'.((is_numeric(substr($row['tw'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['tw'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['tw'] . '</th>').'

			'.((is_numeric(substr($row['twHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['twHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['twHalf'] . '</th>').'

			'.((is_numeric(substr($row['th'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['th'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['th'] . '</th>').'

			'.((is_numeric(substr($row['thHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['thHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['thHalf'] . '</th>').'

			'.((is_numeric(substr($row['fo'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['fo'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['fo'] . '</th>').'

			'.((is_numeric(substr($row['foHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['foHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['foHalf'] . '</th>').'

			'.((is_numeric(substr($row['fi'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['fi'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['fi'] . '</th>').'

			'.((is_numeric(substr($row['fiHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['fiHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['fiHalf'] . '</th>').'

			'.((is_numeric(substr($row['si'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['si'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['si'] . '</th>').'

			'.((is_numeric(substr($row['siHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['siHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['siHalf'] . '</th>').'

			'.((is_numeric(substr($row['se'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['se'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['se'] . '</th>').'

			'.((is_numeric(substr($row['seHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['seHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['seHalf'] . '</th>').'

			'.((is_numeric(substr($row['ei'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['ei'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['ei'] . '</th>').'

			'.((is_numeric(substr($row['eiHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['eiHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['eiHalf'] . '</th>').'

			'.((is_numeric(substr($row['ni'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['ni'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['ni'] . '</th>').'

			'.((is_numeric(substr($row['niHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['niHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['niHalf'] . '</th>').'


			'; 
			}
		}
		# display if no data to show
		else { echo '
			<tr>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
			</tr> ';  }
			
	
		echo '
    </tbody>
  </table>

</div> ';

# displaying table day header to the user
echo '


<div class="container-fluid">
	
	<table>
    <thead>
      <tr style="background-color: #1B3641; color:#FCFCFE;">
        <th>Thursday &nbsp &nbsp 10/06/21 </th>
		<th>08:00</th>
        <th>08:30</th>
		<th>09:00</th>
		<th>09:30</th>
        <th>10:00</th>
		<th>10:30</th>
        <th>11:00</th>
        <th>11:30</th>
		<th>12:00</th>
		<th>12:30</th>
        <th>13:00</th>
		<th>13:30</th>
        <th>14:00</th>
        <th>14:30</th>
		<th>15:00</th>
		<th>15:30</th>
        <th>16:00</th>
		<th>16:30</th>
        <th>17:00</th>
        <th>17:30</th>
		<th>18:00</th>
		<th>18:30</th>
        <th>19:00</th>
		<th>19:30</th>
      </tr>
    </thead>
    <tbody>';
	# displaying all entries related to Thursday
		$q = "SELECT *  FROM callendar WHERE day='Thursday'" ;
		$r = mysqli_query( $link, $q ) ;
		if ( mysqli_num_rows( $r ) > 0 ) {
			while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC )) {
			# if statements to check if a calendar field has been booked or not.	
			echo '
			
            <tbody>
            
			<tr>
			<th>' . $row['reg'] . ' ' . $row['location'] . '</th>
			'.((is_numeric(substr($row['eight'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['eight'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['eight'] . '</th>').'

			'.((is_numeric(substr($row['eightHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['eightHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['eightHalf'] . '</th>').'

			'.((is_numeric(substr($row['nine'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['nine'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['nine'] . '</th>').'	

			'.((is_numeric(substr($row['nineHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['nineHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['nineHalf'] . '</th>').'		

			'.((is_numeric(substr($row['ten'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['ten'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['ten'] . '</th>').'

			'.((is_numeric(substr($row['tenHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['tenHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['tenHalf'] . '</th>').'

			'.((is_numeric(substr($row['el'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['el'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['el'] . '</th>').'

			'.((is_numeric(substr($row['elHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['elHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['elHalf'] . '</th>').'

			'.((is_numeric(substr($row['tw'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['tw'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['tw'] . '</th>').'

			'.((is_numeric(substr($row['twHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['twHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['twHalf'] . '</th>').'

			'.((is_numeric(substr($row['th'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['th'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['th'] . '</th>').'

			'.((is_numeric(substr($row['thHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['thHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['thHalf'] . '</th>').'

			'.((is_numeric(substr($row['fo'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['fo'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['fo'] . '</th>').'

			'.((is_numeric(substr($row['foHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['foHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['foHalf'] . '</th>').'

			'.((is_numeric(substr($row['fi'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['fi'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['fi'] . '</th>').'

			'.((is_numeric(substr($row['fiHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['fiHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['fiHalf'] . '</th>').'

			'.((is_numeric(substr($row['si'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['si'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['si'] . '</th>').'

			'.((is_numeric(substr($row['siHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['siHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['siHalf'] . '</th>').'

			'.((is_numeric(substr($row['se'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['se'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['se'] . '</th>').'

			'.((is_numeric(substr($row['seHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['seHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['seHalf'] . '</th>').'

			'.((is_numeric(substr($row['ei'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['ei'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['ei'] . '</th>').'

			'.((is_numeric(substr($row['eiHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['eiHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['eiHalf'] . '</th>').'

			'.((is_numeric(substr($row['ni'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['ni'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['ni'] . '</th>').'

			'.((is_numeric(substr($row['niHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['niHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['niHalf'] . '</th>').'


			'; 
			}
		}
		# display if no data to show
		else { echo '
			<tr>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
				<th>No data</th>
			</tr> ';  }
			
	
		echo '
    </tbody>
  </table>

</div> ';

# displaying table day header to the user
echo '
<div class="container-fluid">
	
	<table>
    <thead>
      <tr style="background-color: #1B3641; color:#FCFCFE;">
        <th>Friday &nbsp &nbsp &nbsp &nbsp &nbsp 11/06/21 </th>
		<th>08:00</th>
        <th>08:30</th>
		<th>09:00</th>
		<th>09:30</th>
        <th>10:00</th>
		<th>10:30</th>
        <th>11:00</th>
        <th>11:30</th>
		<th>12:00</th>
		<th>12:30</th>
        <th>13:00</th>
		<th>13:30</th>
        <th>14:00</th>
        <th>14:30</th>
		<th>15:00</th>
		<th>15:30</th>
        <th>16:00</th>
		<th>16:30</th>
        <th>17:00</th>
        <th>17:30</th>
		<th>18:00</th>
		<th>18:30</th>
        <th>19:00</th>
		<th>19:30</th>
      </tr>
    </thead>
    <tbody>';
		# displaying all entries related to Friday
		$q = "SELECT *  FROM callendar WHERE day='Friday'" ;
		$r = mysqli_query( $link, $q ) ;
		if ( mysqli_num_rows( $r ) > 0 ) {
			while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC )) {
			# if statements to check if a calendar field has been booked or not.	
			echo '
			
            <tbody>
            
			<tr>
			<th>' . $row['reg'] . ' ' . $row['location'] . '</th>
			'.((is_numeric(substr($row['eight'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['eight'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['eight'] . '</th>').'

			'.((is_numeric(substr($row['eightHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['eightHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['eightHalf'] . '</th>').'

			'.((is_numeric(substr($row['nine'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['nine'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['nine'] . '</th>').'	

			'.((is_numeric(substr($row['nineHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['nineHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['nineHalf'] . '</th>').'		

			'.((is_numeric(substr($row['ten'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['ten'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['ten'] . '</th>').'

			'.((is_numeric(substr($row['tenHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['tenHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['tenHalf'] . '</th>').'

			'.((is_numeric(substr($row['el'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['el'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['el'] . '</th>').'

			'.((is_numeric(substr($row['elHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['elHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['elHalf'] . '</th>').'

			'.((is_numeric(substr($row['tw'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['tw'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['tw'] . '</th>').'

			'.((is_numeric(substr($row['twHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['twHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['twHalf'] . '</th>').'

			'.((is_numeric(substr($row['th'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['th'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['th'] . '</th>').'

			'.((is_numeric(substr($row['thHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['thHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['thHalf'] . '</th>').'

			'.((is_numeric(substr($row['fo'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['fo'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['fo'] . '</th>').'

			'.((is_numeric(substr($row['foHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['foHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['foHalf'] . '</th>').'

			'.((is_numeric(substr($row['fi'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['fi'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['fi'] . '</th>').'

			'.((is_numeric(substr($row['fiHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['fiHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['fiHalf'] . '</th>').'

			'.((is_numeric(substr($row['si'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['si'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['si'] . '</th>').'

			'.((is_numeric(substr($row['siHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['siHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['siHalf'] . '</th>').'

			'.((is_numeric(substr($row['se'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['se'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['se'] . '</th>').'

			'.((is_numeric(substr($row['seHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['seHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['seHalf'] . '</th>').'

			'.((is_numeric(substr($row['ei'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['ei'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['ei'] . '</th>').'

			'.((is_numeric(substr($row['eiHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['eiHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['eiHalf'] . '</th>').'

			'.((is_numeric(substr($row['ni'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['ni'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['ni'] . '</th>').'

			'.((is_numeric(substr($row['niHalf'],0,1)))?
			'<th><a href="checkout.php?id=' . $row['id'] . '' . $row['reg'] . '' . $row['location'] . '' . $row['niHalf'] . '' . $row['date'] . '"  
			class="btn btn-dark btn-block" style="background-color: #F05762;">book</a></th>':'<th>'. $row['niHalf'] . '</th>').'


			'; 
			}
		}
		# display if no data to show
		else { echo '
			<tr>
				<th>No data</th>
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

</div> '
;

?>
<hr>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>