<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_GET['cancel']))
		  {
                  $sql=mysqli_query($con,"DELETE from project WHERE  id ='".$_GET['id']."'");
                  if($sql)
                  {
                      echo"<script>alert('Your project has been deleted')</script>";
                  }
                  
				 
		  }
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
  



  <div class="site-wrap"  id="home-section">


   
    <?php include_once('include/header.php');?>
        
    <body>
    <div class="site-section" id="features-section">
      <div class="container">
    
            <h2 class="section-title">Posted Projects</h2><br>



<?php
$sql9=mysqli_query($con,"select * from project WHERE user_id='".$_SESSION['id']."'");
$row9=mysqli_num_rows($sql9);
?>
    

<?php if($row9==0)
{
    echo"<h3>Err. It's too empty in here.</h3><br><h4>Projects you post will show up here.</h4>";
}
else{
?>	
       

<?php
$sql=mysqli_query($con,"select buyer.name as bname,project.*  from project join buyer on buyer.id=project.user_id where project.user_id='".$_SESSION['id']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
$projectid=$row['id'];
?>
<?php
$num=mysqli_query($con,"select * from bids where project_id='$projectid'");
$num1=mysqli_num_rows($num);
?>   

									
											
                      <div class="card" style="width: 100%;">
  <div class="card-body">
    <h5 class="card-title"><b><?php echo $cnt;?>. <?php echo $row['project_name'];?></h5>
    <h6 class="card-subtitle mb-2">Budget : <?php echo $row['budget'];?></h6>
    <p class="card-text">description: <?php echo $row['description'];?></p>
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
 $result2 =mysqli_query($con,"SELECT awarded FROM project WHERE id='$projectid'");
 $count2=mysqli_fetch_array($result2);
 $awarded=$count2['awarded'];
 $result3 =mysqli_query($con,"SELECT * FROM buyer WHERE id='$awarded'");
 $count3=mysqli_fetch_array($result3);
 $name5=$count3['name'];
 $link_address="company-profile.php?id=$awarded";
if($count2['awarded']>0)
{
  echo "<a href='$link_address'>Awarded to $name5</a>";
}
else
{
?>
							
    <a href="view-bids.php?id=<?php echo $row['id']?>">View Bids (<?php echo $num1;?> BIDS)</a>
    <?php }  ?>

    <p class="card-text">Action : <?php if(($row['status']==0))  
{ ?>

													
    <a href="my-projects.php?id=<?php echo $row['id']?>&cancel=update" onClick="return confirm('Are you sure you want to delete this project ?')"title="Delete Project">Delete Project</a>
	<?php } else { 
echo "<a href='work-project-client.php?id=$projectid' target='_blank'>See Work Record</a>";
		 } ?> </p>

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
