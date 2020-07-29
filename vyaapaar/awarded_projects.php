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
    <title>Vyaapaar</title>
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
  


  <div class="site-wrap"  id="home-section">

 
   
    <?php include_once('include/header.php');?>

    <body>
    <div class="site-section" id="features-section">
      <div class="container">
    
            <h2 class="section-title">Projects Awarded To us</h2><br>

<?php
$sql9=mysqli_query($con,"select * from project WHERE awarded='".$_SESSION['id']."'");
$row9=mysqli_num_rows($sql9);
?>
    

<?php if($row9==0)
{
    echo"<h3>Err. It's too empty in here.</h3><br><h4>Projects awarded to you will show up here.</h4>";
}
else{
?>	        
                  

                
            
            
<?php
$sql=mysqli_query($con,"select * from project where awarded='".$_SESSION['id']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
$projectid=$row['id'];
$user_id=$row['user_id'];

?>
<?php
$sql0=mysqli_query($con,"select * from buyer where id='$user_id'");
$row0=mysqli_fetch_array($sql0);
$name=$row0['name'];
$website=$row0['website'];
?>

<div class="card" style="width: 100%;">
  <div class="card-body">
    <h5 class="card-title"><b><?php echo $cnt;?>. <?php echo $row['project_name'];?></h5>
    <h6 class="card-subtitle mb-2">Budget : <?php echo $row['budget'];?></h6>
    <p class="card-text">Client Name:<a href="company-profile?id=<?php echo $user_id;?>"> <?php echo $name;?></a></p>
     <p class="card-text">Client Website:<a href="//<?php echo $website;?>" target="_blank"> <?php echo $website;?></a></p>
    <p class="card-text"><?php echo $row['description'];?></p>
    <p class="card-text">Project Status: <?php if(($row['status']==1)) 
{
	echo "Awarded to us";
}
 if(($row['status']==0))  
{
	echo "Active";
}
?></p>
<p class="card-text">Action : <a href="work-project-vendor.php?id=<?php echo $projectid?>" target="_blank">Update Work Record</a></p>

  </div>
</div><br>
                                                

                                                
												
												




							
    


												
										
											
											<?php 
$cnt=$cnt+1;
											 }}?>
											
											
								
						


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
