<?php # DISPLAY LANDING PAGE.
$page_title = 'User Area ' ;
include('includes/header_login.html');

?>
<div class="container">
   
	<img src="img/logo.png" style="margin-top: 40px" width="30%" height="30%" class="center" alt="Logo">
   
	<h1 class="text-center">ECAR</h1>
   
   <div class="row">
     <div class="col-sm d-flex justify-content-center">
	   <a href="login.php" class="btn btn-outline-dark btn-block" style= "font-size: 30px">Login</a>
     </div>
	 <div class="col-sm d-flex justify-content-center">
	   <a href="register.php" class="btn btn-outline-dark btn-block" style= "font-size: 30px">Register</a>
     </div>
	</div>

</div> <!-- end of container --> 

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>