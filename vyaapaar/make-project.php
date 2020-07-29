<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$extension=$_SESSION['id'];

$targetDir = "uploads/";
$fileName = $extension.basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST['submit']))
{
    
     // Allow certain file formats
    $allowTypes = array('pdf','docx','pptx','doc','ppt');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
}
$pname=$_POST['project_name'];
$user_id=$_SESSION['id'];
$description=$_POST['description'];
$skill_string=$_POST['skill'];
$budget=$_POST['budget'];




$query=mysqli_query($con,"INSERT INTO project (project_name,user_id,description,skill,budget,file_name) values('$pname','$user_id','$description','$skill_string','$budget','$fileName')");
if($query)
{
	echo "<script>alert('Project created successfully!');</script>";
		echo "<script>window.location = 'my-projects.php';</script>";;
	//header('location:user-login.php');
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
          <div class="row-7 text-center  mb-5">
            <h2 class="section-title">Post a Project</h2><br>


            
												
									
													<form role="form" name="project" method="post" enctype="multipart/form-data">
														<div class="form-group">
															<label for="">
																Project Name
															</label>
							<input type="text" name="project_name" class="form-control"  placeholder="Eg:- Build a mobile app" required>
														</div>
														<div class="form-group">
															<label for="">
																Project Description
															</label>
					<textarea name="description" class="form-control"  placeholder="Describe your project" required></textarea>
														</div>
														
<div class="form-group">
															<label for="exampleInputPassword1">
																Field of work
                              </label>
                              

									<select name="skill" class="form-control" required>
                                    
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
															<label for="">
																Project Budget 
															</label>
									<select name="budget" class="form-control" required>
                                        <option value="INR 1,000 - INR 5,000">INR 1,000 - INR 5,000</option>
                                        <option value="INR 5,000 - INR 10,000">INR 5,000 - INR 10,000</option>
                                        <option value="INR 10,000 - INR 20,000">INR 10,000 - INR 20,000</option>
                                        <option value="INR 20,000 - INR 40,000">INR 20,000 - INR 40,000</option>
                                        <option value="INR 40,000 - INR 75,000">INR 40,000 - INR 75,000</option>
                                        <option value="INR 75,000 - INR 1,00,000">INR 75,000 - INR 1,00,000</option>
                                        <option value="INR 1,00,000 - INR 3,50,000">INR 1,00,000 - INR 3,50,000</option>
                                        <option value="INR 3,50,000 - INR 5,00,000">INR 3,50,000 - INR 5,00,000</option>
                                        <option value="INR 5,00,000 - INR 10,00,000">INR 5,00,000 - INR 10,00,000</option>
                                        <option value="> INR 10,00,000">> INR 10,00,000</option>
                     
                                    </select>


                                    
														</div>
														 <div class="form-group">
															<label>
																Attachments (if any)
																<b>(Only PDF, DOC, PPT)</b>
                                            </label>
					                            <input class="form-control" type="file" name="file" id="file">
														</div>
														
														
														<button type="submit" name="submit" class="btn btn-secondary">
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
