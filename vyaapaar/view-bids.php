<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

 $sql02=mysqli_query($con,"select * from buyer WHERE id ='".$_GET['a_id']."'");
		      $res02=mysqli_fetch_array($sql02);
		      $vendor_name=$res02['name'];
            $vendor_email=$res02['email'];
            
$sql01=mysqli_query($con,"select * from project WHERE id ='".$_GET['id']."'");
		      $res01=mysqli_fetch_array($sql01);
		      $project_name=$res01['project_name'];            
                
                


if(isset($_GET['award']))
		  {

               
                
		      
		      
                  $sql=mysqli_query($con,"UPDATE project set status='1',awarded='".$_GET['a_id']."' WHERE  id ='".$_GET['id']."'");
                  if($sql)
                  {
                      $to=$vendor_email;
$msg= "Congratulations! Project awarded!";
$subject="Congratulations! Project awarded!";
$headers .= "MIME-Version: 1.0"."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers .= 'From:Vyaapaar <info@iserv.co.in>'."\r\n";
$ms.="<html></body><div><div>Dear $vendor_name,</div></br></br>";
$ms.="<div style='padding-top:8px;'>The project '$project_name' has been awarded to you!<br>Please go to your dashboard to get in touch with the client.<br>Well done!<br> We wish you all the best for this project!</div>
</div>
</body></html>";
mail($to,$subject,$ms,$headers);
                      
                      echo"<script>alert('Your project has been awarded')</script>";
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
      <?php
$sql3=mysqli_query($con,"select * from project WHERE id='".$_GET['id']."'");
$row3=mysqli_fetch_array($sql3);
?>
<?php
$sql9=mysqli_query($con,"select * from bids WHERE project_id='".$_GET['id']."'");
$row9=mysqli_num_rows($sql9);
?>
    
            <h2 class="section-title">Bids for "<?php echo $row3['project_name'];?>"
            
<a class="btn btn-secondary" href="view-bids.php?id=<?php echo $_GET['id'];?>&sort=amount">Sort by Amount</a>
            </h2><br>

<?php if($row9==0)
{
    echo"<h3>Err. It's too empty in here.</h3><br><h4>Bids for this project will show up here.</h4>";
}
else{
?>



<?php
if ($_GET['sort'] == 'amount')
{
    $sql=mysqli_query($con,"select * from bids WHERE client_id='".$_SESSION['id']."' AND project_id='".$_GET['id']."' ORDER by amount DESC");
}
else{
$sql=mysqli_query($con,"select * from bids WHERE client_id='".$_SESSION['id']."' AND project_id='".$_GET['id']."'");
}
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
$vendorid=$row['vendor_id'];

$sql4=mysqli_query($con,"select * from buyer WHERE id=$vendorid");
$row4=mysqli_fetch_array($sql4)
?>  

                                                
                                                  
                                                    

                                                    <div class="card" style="width: 100%;">
  <div class="card-body">
    <h5 class="card-title"><b><?php echo $cnt;?>. <a href="company-profile.php?id=<?php echo $vendorid;?>" target="_blank"><?php echo $row4['name'];?></a></h5>
    <h6 class="card-subtitle mb-2">Bid Amount : INR <?php echo $row['amount'];?></h6>
    <p class="card-text">Proposal: <?php echo $row['Proposal'];?></p>
    <p class="card-text">Attachment: <a href="uploads/<?php echo $row['file_name'];?>" target="_blank">Open File</a></p>
    <p class="card-link">Action : <?php 
                                                    $sql7=mysqli_query($con,"select * from project WHERE id='".$_GET['id']."'");
                                                    $row7=mysqli_fetch_array($sql7);
                                                    $awarded=$row7['awarded'];
                                                    if($row3['awarded']==0)
                                                    {?>
							<a type="submit"  value="award" name="award" href="view-bids.php?id=<?php echo $_GET['id'];?>&a_id=<?php echo $vendorid;?>&award=update" onClick="return confirm('Are you sure you want to award project to <?php echo $row4['name'];?>?')">Award Bid</a>
                            <?php } else {
                                                    $sql6=mysqli_query($con,"select * from buyer WHERE id=$awarded");

                                                    $row6=mysqli_fetch_array($sql6);

                                                    $name2=$row6['name'];

                                                    echo "Project awarded to $name2 "; }?> 
  </div>
</div>         <br>         
												
												



											
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
