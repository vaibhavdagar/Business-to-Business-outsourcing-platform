<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{

$fname=$_POST['fname'];
$address=$_POST['address'];
$skill=$_POST['skill'];
$website=$_POST['website'];



$sql=mysqli_query($con,"Update buyer set name='$fname',address='$address',skills='$skill',website='$website' WHERE id='".$_SESSION['id']."'");
if($sql)
{

echo "<script>alert('Profile Updated Successfully')</script>";


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
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  






   
    <?php include_once('include/header.php');?>

				<!-- end: TOP NAVBAR -->
				<div class="site-section" id="features-section">
      <div class="container">
        <div class="col mb-5 justify-content-center text-center"  data-aos="fade-up">
          <div class="row-7 text-center  mb-5">
					
				<h2 class="section-title">Edit Profile</h2>
						
									<?php 
$sql=mysqli_query($con,"select * from buyer where id='".$_SESSION['id']."'");
while($data=mysqli_fetch_array($sql))
{
?>
												
													<form role="form"  method="post" width="100%">
													

<div class="form-group">
															<label for="fname">
																 Business Name
															</label>
	<input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['name']);?>" >
														</div>


<div class="form-group">
															<label for="address">
																 Address
															</label>
					<textarea name="address" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
														</div>
														<div class="form-group">
														<label for="website">
																 Website
															</label>
					<textarea name="website" class="form-control"><?php echo htmlentities($data['website']);?></textarea>
														</div>

															
														<div class="form-group">
														
																  Current Business Domain : <b><?php echo htmlentities($data['skills']);?><b><br> 
															
																  <select name="skill" class="form-control"><!---->
  <option value="Accounting">Accounting</option>
 <option value="Agriculture">Agriculture</option>
 <option value="Architecture">Architecture</option>
 <option value="Automobile">Automobile</option>
 <option value="Clothing &amp; Accessories">Clothing &amp; Accessories</option>
 <option value="Education">Education</option>
 <option value="E-Commerce">E-Commerce</option>
 <option value="Event Management/Organisation">Event Management/Organisation</option>
 <option value="Financial Services">Financial Services</option>
 <option value="Food &amp; Beverages">Food &amp; Beverages</option>
 <option value="Gaming">Gaming</option>
 <option value="Graphic Design">Graphic Design</option>
 <option value="Health &amp; Fitness">Health &amp; Fitness</option>
 <option value="Healthcare">Healthcare</option>
 <option value="Healthcare Products">Healthcare Products</option>
 <option value="Information Technology &amp; Services">Information Technology &amp; Services</option>
 <option value="Industry">Industry</option>
 <option value="Manufacturing">Manufacturing</option>
 <option value="Marketing">Marketing</option>
 <option value="Packaging">Packaging</option>
 <option value="Real Estate">Real Estate</option>
 <option value="Renewable Energy">Renewable Energy</option>
 <option value="Science &amp; Engineering">Science &amp; Engineering</option>
 <option value="Sports">Sports</option>
 <option value="Transportation">Transportation</option>
 <option value="VFX &amp; Animation">VFX &amp; Animation</option>
</select>
														</div>
	

									

<div class="form-group">
									<label for="fess">
																 User Email
															</label>
					<input type="email" name="uemail" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['email']);?>">
					
                            </div>
                            <label for="fess">
																 Password
															</label>
<h6><a href="change-password.php">Click here to change password</a></h6><br>


														
														
														
														
														<button type="submit" name="submit" class="btn btn-secondary" align="center">
															Update
														</button>
													</form>
													<?php } ?>
												</div>
											</div>
									</div>
									
							
						
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
			
			<!-- start: FOOTER -->

			<!-- end: FOOTER -->
		

			
			<!-- end: SETTINGS -->
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
