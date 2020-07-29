<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();



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
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" style=" background-color:#F5F5F5;">
  


  <div class="site-wrap"  id="home-section">

   
    <?php include_once('include/header.php');?>
    <body>
    <div class="site-section" id="features-section">
      <div class="container">
        <div class="col mb-5 justify-content-center text-center"  data-aos="fade-up">
          
          <?php
$sql3=mysqli_query($con,"select * from project WHERE id='".$_GET['id']."'");
$row3=mysqli_fetch_array($sql3);
if($row3['user_id']!=$_SESSION['id'])
{
  echo "<h1>You don't have permission to view this page</h1>";
}
else
{
    $n1=$row3['project_name'];
?>
    
            <h2 class="section-title">Work record for "<?php echo $row3['project_name'];?>"</h2>

<?php 
$test=mysqli_query($con,"select * from work_record WHERE project_id='".$_GET['id']."'");
$test1=mysqli_fetch_array($test);

if($test1==0)
{
    echo"<h3><br>Err. It's too empty in here.</h3><br><h4>Work updates for $n1 will show up here!</h4>";
}
else{
?>
                                       

<?php
$sql=mysqli_query($con,"select * from work_record where project_id='".$_GET['id']."'");
while($row=mysqli_fetch_array($sql))
{

?>


<div class="card">
  <div class="card-body">
      <h5 class="card-title"><b>Task name: <?php echo $row['task_name'];?></h5>
    <h5 class="card-title"><b>Details: <?php echo $row['details'];?></h5>
          <p class="card-text">Attachment:<?php if($row['file_name']==$row['vendor_id']) { echo " N/A"; } else {?> <a href="uploads/<?php echo $row['file_name'];?>" target="_blank">Open File</a></p> <?php } ?>

  </div>
</div>
<?php }}}?>

                                           
                                            </div>
                                            </div>
<br>


                                            

    
 
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
