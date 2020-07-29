<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$extension=$_SESSION['id'];

$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$newName = "{$extension}{$fileName}";
$targetFilePath = $targetDir . $newName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_REQUEST["submit"]))

{
    // Allow certain file formats
    $allowTypes = array('pdf','docx','pptx','doc','ppt');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
         
$amount=$_REQUEST['amount'];
$proposal=$_REQUEST['proposal'];
$vendor_id=$_SESSION['id'];
$client_id=$_REQUEST['client_id'];
$project_id=$_REQUEST['project_id'];
$amount=$_REQUEST['amount'];
$client_email=$_REQUEST['cemail'];
$client_name=$_REQUEST['cname'];



$result5 =mysqli_query($con,"SELECT * FROM buyer WHERE id='$vendor_id'");
		$count5=mysqli_fetch_array($result5);
		$vname=$count5['name'];
		
$result6 =mysqli_query($con,"SELECT * FROM project WHERE id='$project_id'");
		$count6=mysqli_fetch_array($result6);
		$pname=$count6['project_name'];		

$result =mysqli_query($con,"SELECT * FROM bids WHERE vendor_id='$vendor_id' AND project_id='$project_id'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<script>alert('You have already placed your bid');</script>";
}
else
{


$query=mysqli_query($con,"INSERT INTO bids (client_id,project_id,vendor_id,proposal,amount,file_name) values('$client_id','$project_id','$vendor_id','$proposal','$amount','$newName')");
if($query)
{
$to=$client_email;
$subject="New Bid by $vname";
$headers .= "MIME-Version: 1.0"."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers .= 'From:Vyaapaar <info@iserv.co.in>'."\r\n";
$ms.="<html></body><div><div>Dear $client_name,</div></br></br>";
$ms.="<div style='padding-top:8px;'>$vname has placed a bid on your project '$pname'. Bid amount is INR $amount. Go to your dashboard now to see all bids!</div>
</div>
</body></html>";
mail($to,$subject,$ms,$headers);
    
	echo "<script>alert('Bid created successfully!');</script>";
	header ("LOCATION:bid-project.php");
	
}
}
}
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
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" style=" background-color:#F5F5F5;">
  


  <div class="site-wrap"  id="home-section">

   
    <?php include_once('include/header.php');?>
    <body>
    <div class="site-section" id="features-section">
      <div class="container">
        <div class="col mb-5 justify-content-center text-center"  data-aos="fade-up">
          <div >
          <?php
$sql3=mysqli_query($con,"select * from project WHERE id='".$_GET['id']."'");
$row3=mysqli_fetch_array($sql3);
?>
    
            <h2 class="section-title">Bidding on "<?php echo $row3['project_name'];?>"</h2>


                                       

<?php
$sql=mysqli_query($con,"select * from project where id='".$_GET['id']."'");
while($row=mysqli_fetch_array($sql))
{
    $client_id1=$row['user_id'];
    $project_id1=$_GET['id'];
?>
<?php
$sql12=mysqli_query($con,"select * from buyer where id='$client_id1'");
$row12=mysqli_fetch_array($sql12);

    $cname=$row12['name'];
    $cemail=$row12['email'];
?>

<div class="card" style="width: 100%;">
  <div class="card-body">
      <h5 class="card-title"><b>Posted By: <?php echo $cname;?></h5>
    <h5 class="card-title"><b>Description: <?php echo $row['description'];?></h5>
    <h6 class="card-subtitle mb-2">Budget : <?php echo $row['budget'];?></h6>
     <p class="card-text">Attachment:<?php if($row['file_name']==$row['user_id']) { echo " N/A"; } else {?> <a href="uploads/<?php echo $row['file_name'];?>" target="_blank">Open File</a></p> <?php } ?>
<?php } ?>
  </div>
</div>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="container">
                                            <div class="col mb-5 justify-content-center text-center"  data-aos="fade-up">
          <div class="row-7 text-center  mb-5">
            <h2 class="section-title">Place Your Bid</h2><br>
            
												
									
                                                    <form role="form" name="project" method="post"  enctype="multipart/form-data">
                                                <input type="text" name="client_id" value="<?php echo $client_id1;?>"hidden>
                                                <input type="text" name="project_id" value="<?php echo $project_id1;?>"hidden>
                                                <input type="text" value="<?php echo $cemail;?>" name="cemail" hidden>
                                                <input type="text" value="<?php echo $cname;?>" name="cname" hidden>
														<div class="form-group">
															<label for="">
																Bid Amount (Keep it within the budget range)
															</label>
							<input type="number" name="amount" class="form-control"  placeholder="INR" required >
														</div>
														<div class="form-group">
															<label for="">
																Proposal
															</label>
					<textarea name="proposal" size="5000" class="form-control"  placeholder="Write your proposal here..." required></textarea>
														</div>
                                                        
                                                        <div class="form-group">
															<label>
																Attach your company profile
																<b>(Only PDF, DOC, PPT)</b>
                                            </label>
					                            <input class="form-control" type="file" name="file" id="file" required >
														</div>
                                            


                                    
														
														
														
														
														<button type="submit" name="submit" class="btn btn-secondary" width="100%">
															Submit
														</button>
													</form>
 








                        </div>
                </div>
        </div>
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
