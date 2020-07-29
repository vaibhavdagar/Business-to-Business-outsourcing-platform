<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

          
          
          
          


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    
    
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
  

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <div class="site-wrap"  id="home-section">

   
    <?php include_once('include/header.php');?>

    <div class="site-section" id="features-section">
      <div class="container">
<?php
$sql2=mysqli_query($con,"select * from buyer where id ='".$_SESSION['id']."'");
$row2=mysqli_fetch_array($sql2);
$skill=$row2['skills'];
?>
<?php
$sql9=mysqli_query($con,"select * from project WHERE skill='$skill' and awarded='0' and user_id!='".$_SESSION['id']."'");
$row9=mysqli_num_rows($sql9);
?>
    
            <h2 class="section-title"><b>Projects in your domain</b>
            

            </h2><br>

<?php if($row9==0)
{
    echo"<h3>Err. It's too empty in here.</h3><br><h4>Projects from your domain will show up here.</h4>";
}
else{
?>



<?php

$sql=mysqli_query($con,"select * from project where skill LIKE '%$skill%' AND awarded='0' AND user_id!='".$_SESSION['id']."' ORDER BY date DESC");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
    $project_id=$row['id'];
?>
     
													
<div class="card" style="width: 100%;">
  <div class="card-body">
    <h5 class="card-title"><b><?php echo $cnt;?>. <?php echo $row['project_name'];?></h5>
    <h6 class="card-subtitle mb-2">Budget : <?php echo $row['budget'];?></h6>
    <p class="card-text">Description: <?php echo $row['description'];?></p>
    <p class="card-text">Attachment:<?php if($row['file_name']==$row['user_id']) { echo " N/A"; } else {?> <a href="uploads/<?php echo $row['file_name'];?>" target="_blank">Open File</a></p> <?php } ?>
    <p class="card-text">Project Status: <?php if(($row['status']==1)) 
{
	echo "Under Process";
}
 if(($row['status']==0))  
{
	echo "Active";
}
?></p>
    <p class="card-link">Bid : <?php
$sql9=mysqli_query($con,"SELECT * FROM bids WHERE vendor_id='".$_SESSION['id']."' AND project_id='$project_id'");
$count=mysqli_num_rows($sql9);
if($count==0)  
{ ?>
								
<a  href="bid-on-project.php?id=<?php echo $row['id']?>">Place Bid</a>
	<?php } else {
		echo "Bid Submitted";
		} ?></a>
		
  </div>
</div><br>

<?php 
$cnt=$cnt+1;
											 }}?>
 
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
