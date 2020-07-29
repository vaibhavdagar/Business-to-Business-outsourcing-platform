<?php
include_once 'include/config.php';
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $result = mysqli_query($con,"SELECT * FROM buyer where email='$email'");
    $row = mysqli_fetch_array($result);
	$email_id=$row['email'];
	$code=md5($email.time());
	$link="https://vyaapaar.iserv.co.in/reset-password.php?code=$code";
	if($email_id==$email)
	{
	    $sql=mysqli_query($con,"update buyer set code='$code' WHERE email='$email'");
	    if($sql){
	        
	   
				$to = $email_id;
                $subject = "Password reset link for Vyaapaar ID";
                $txt = "Here is the link to reset your password, Please ignore this mail if you did not make this request. Link to reset your password is $link.";
                $headers = "From:Vyaapaar <vaibhav@vyaapaar.iserv.co.in>" . "\r\n";
                mail($to,$subject,$txt,$headers);
                echo "<script>alert('The link to reset you password has been mailed to your registered email-id. Check spam folder as well.');</script>";
echo "<script>window.location = 'registration.php';</script>";;
			}
}
else{
					echo "<script>alert('The link to reset you password has been mailed to your registered email-id. Check spam folder as well.');</script>";
					echo "<script>window.location = 'registration.php';</script>";;
				}
}
?>




<!DOCTYPE html>
<html lang="en">
 <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    

  


   

        
  	<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  

  

  <div class="site-wrap"  id="home-section">


   
   

		
				
				<!-- end: TOP NAVBAR -->
				<div class="site-section" id="features-section">
      <div class="container">
        <div class="col mb-5 justify-content-center text-center"  data-aos="fade-up">
          <div class="row-7 text-center  mb-5">
        
      
     <div class="container" data-aos="fade-up"> 
        <div class="row mb-5 justify-content-center text-center"  >
          <div class="row-7 text-center  mb-5">

            <h1 class="section-title">Forgot Password </h1>
          </div><br>
     
     <div class="container">
<form action='' method='post'>

	<div class="form-group">
															<label for="exampleInputPassword1">
																Email Id:
															</label>
					<input type="text" name="email" class="form-control"  placeholder="Your E-mail">
														</div>
														 <div class="g-reCAPTCHA" data-sitekey="6LckgvEUAAAAAN7Hnah_AWNVFjtUMkgYbPWN5W9m"></div>
<input class="btn btn-primary" type='submit' name='submit' value='Submit'/>

</form>
</div>
 
</body>


    

    
         

    

    

     <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/main.js"></script>
  
 
		
	

				
						
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->

	</body>
</html>






