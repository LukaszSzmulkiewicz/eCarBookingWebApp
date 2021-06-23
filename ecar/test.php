echo '


<div class="container">
	
	<table>
    <thead>
      <tr style="background-color: #1B3641; color:#FCFCFE;">
        <th>Monday 24/05/21 </th>
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
		$q = "SELECT *  FROM callendar WHERE day='Monday'" ;
		$r = mysqli_query( $link, $q ) ;
		if ( mysqli_num_rows( $r ) > 0 ) {
			while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC )) {
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

</div> ';