<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$extension=$_SESSION['id'];

$targetDir = "uploads/";
$fileName = $extension.basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_REQUEST["submit"]))

{
    // Allow certain file formats
    $allowTypes = array('pdf','docx','pptx','doc','ppt');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
}       
$project_id=$_GET['id'];
$vendor_id=$_SESSION['id'];
$name=$_REQUEST['name'];
$details=$_REQUEST['details'];




$query=mysqli_query($con,"INSERT INTO work_record (vendor_id,project_id,task_name,details,file_name) values('$vendor_id','$project_id','$name','$details','$fileName')");
if($query)
{
    echo "<script>alert('New completed task generated successfully')</script>";
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
          
          <?php
$sql3=mysqli_query($con,"select * from project WHERE id='".$_GET['id']."' and awarded='".$_SESSION['id']."'");
$row3=mysqli_fetch_array($sql3);
if($row3['awarded']!=$_SESSION['id'])
{
  echo "<h1>You don't have permission to view this page</h1>";
}
else
{
?>

    
            <h2 class="section-title">Work record for "<?php echo $row3['project_name'];?>"</h2>


                                       

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
<?php } ?>

                                           
                                            </div>
                                            </div>
<br>


                                            <div class="container">
                                            <div class="col mb-5 justify-content-center text-center"  data-aos="fade-up">
          <div class="row-7 text-center  mb-5">
            <h2 class="section-title">Add completed task</h2><br>
            
												
									
                                                    <form role="form" name="project" method="post"  enctype="multipart/form-data">
                                            
														<div class="form-group">
															<label for="">
																Task name
															</label>
							<input type="text" name="name" class="form-control" placeholder="Task Name" required >
														</div>
														<div class="form-group">
															<label for="">
																Details
															</label>
					<textarea name="details" size="5000" class="form-control"  placeholder="Write details of the task here..." required></textarea>
														</div>
                                                        
                                                        <div class="form-group">
															<label>
																Attachments (if any)
																<b>(Only PDF, DOC, PPT)</b>
                                            </label>
					                            <input class="form-control" type="file" name="file" id="file" >
														</div>
                                            


                                    
														
														
														
														
														<button type="submit" name="submit" class="btn btn-secondary" width="100%">
															Submit
														</button>
													</form>
 



<?php } ?>




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
