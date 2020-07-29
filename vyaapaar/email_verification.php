<?php
include 'include/config.php';
global $headertext;
global $msg;

if(!empty($_GET['code']) && isset($_GET['code']))
{
$code=$_GET['code'];
$sql=mysqli_query($con,"SELECT * FROM buyer WHERE activationcode='$code'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$email=$num['email'];
$fname=$num['name'];
$st=0;
$result =mysqli_query($con,"SELECT id FROM buyer WHERE activationcode='$code' and status='$st'");
$result4=mysqli_fetch_array($result);
if($result4>0)
 {
$st=1;
$result1=mysqli_query($con,"UPDATE buyer SET status='$st' WHERE activationcode='$code'");
$link="https://vyaapaar.iserv.co.in/registration.php";
$headertext="Your account is activated!";
$msg="<a href='".$link."''>Click here to login</a>";
$to=$email;
$subject="Greetings from Vyaapaar!";
$headers .= "MIME-Version: 1.0"."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers .= 'From:Vyaapaar <info@iserv.co.in>'."\r\n";
$ms.="<html></body><div><div>Hello $fname!</div></br></br>";
$ms.="<div style='padding-top:8px;'>We are so happy we could hook you in to becoming a member of Vyaapaar!<br><br>

Now that you are with us, here are some things that you can do to  fully utilize our platform!<br><br>

1. Post Project(s)<br>
2. Bid on Project(s)<br>
3. Award your project to a bidder<br>
<br>
You can Login <a href='https://vyaapaar.iserv.co.in/registration.php'>Here</a>.<br><br>

If you have any queries or any question, we're always here to support!

and if you need a little help, just contact us by replying to this email.

We hope you've a successful journey.<br><br>


Best Wishes,<br>
Vyaapaar.<br>
</div>
</body></html>";
mail($to,$subject,$ms,$headers);
}
else
{
$headertext="Your account is already active!";
$msg ="no need to activate again. <a href='".$link."''>Click here to login</a> ";
}
}
else
{
$msg ="Wrong activation code. <a href='".$link."''>Redirect back to website</a>";
}
}
?>

<style>
.container {
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left:
}
</style>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vyapar</title>
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
  

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <div class="site-wrap"  id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
   
        <br><br><br><br><br>
    <body>
    <div class="container" data-aos="fade-up">
            
            <div class="unit-4 d-block">
              <div>
                <?php echo $headertext;?>
               <?php echo $msg; ?>
              </div>
            </div>
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
