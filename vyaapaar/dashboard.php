<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$query0=mysqli_query($con,"select * from buyer where id='".$_SESSION['id']."'");
$row0=mysqli_fetch_array($query0);
$skill=$row0['skills'];


$query1=mysqli_query($con,"select * from project where user_id='".$_SESSION['id']."'");
$row1=mysqli_num_rows($query1);

$query2=mysqli_query($con,"select * from project where awarded='".$_SESSION['id']."'");
$row2=mysqli_num_rows($query2);

$query3=mysqli_query($con,"select * from bids where vendor_id='".$_SESSION['id']."'");
$row3=mysqli_num_rows($query3);

$query4=mysqli_query($con,"select * from project where skill='$skill' and awarded='0' and user_id!='".$_SESSION['id']."'");
$row4=mysqli_num_rows($query4);

$query10=mysqli_query($con,"select * from quotes ORDER BY RAND() LIMIT 1");
$row10=mysqli_fetch_array($query10);
$quote=$row10['quotes'];


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
    <style>
        .cards-list {
  z-index: 0;
  width: 100%;
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

.card {
  margin: 30px auto;
  width: 300px;
  height: 300px;
  border-radius: 40px;
box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);
  cursor: pointer;
  transition: 0.4s;
}

.card .card_image {
  width: inherit;
  height: inherit;
  border-radius: 40px;
}

.card .card_image img {
  width: inherit;
  height: inherit;
  border-radius: 40px;
  object-fit: cover;
}

.card .card_title {
  text-align: center;
  border-radius: 0px 0px 40px 40px;
  font-family: sans-serif;
  font-weight: bold;
  font-size: 30px;
  margin-top: -80px;
  height: 40px;
}

.card .card_titlex {
  text-align: center;
  border-radius: 0px 0px 40px 40px;
  font-family: sans-serif;
  font-weight: bold;
  font-size: 30px;
  margin-top: -80px;
  height: 40px;
  color: white;
  line-height: 1.0;
}


.card .card_content {
  text-align: center;
  border-radius: 0px 0px 40px 40px;
  font-family: sans-serif;
  font-weight: bold;
  font-size: 50px;
  margin-top: -160px;
  height: 50px;
  color: white;
}

.card:hover {
  transform: scale(0.9, 0.9);
  box-shadow: 5px 5px 30px 15px rgba(0,0,0,0.25), 
    -5px -5px 30px 15px rgba(0,0,0,0.22);
}

.title-white {
  color: white;
}

.title-black {
  color: black;
}

@media all and (max-width: 500px) {
  .card-list {
    /* On small screens, we are no longer using row direction but column */
    flex-direction: column;
  }
}



    </style>
  </head>
    
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  


   
    <?php include_once('include/header.php');?>
        
    <body>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="whatsapp://send?text=Hey, have you tried the new Vyaapaar app? It is the best platform to increase your business amid the Covid-19 crisis! Hurry up, visit https://vyaapaar.iserv.co.in now!" data-action="share/whatsapp/share" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
      
  <div class="container" data-aos="fade-up"> 
        <div class="row mb-5 justify-content-center text-center"  >
          <div class="row-7 text-center  mb-5">

            <h1 class="section-title">Namaste, <?php $query=mysqli_query($con,"select * from buyer where id='".$_SESSION['id']."'");while($row=mysqli_fetch_array($query)){echo $row['name'];}
?> </h1><p class="lead"><i> <?php echo $quote;?> </i></p>
          </div>
     
       
 
  <div style="overflow: hidden;">
  <div class="col align-items-center justify-content-center">

<div class="cards-list">
  
<a href="my-projects.php"><div class="card 1">
  <div class="card_image"> <img src="https://i.gifer.com/G9vw.gif" /> </div>
  <div class="card_title title-white">
    <p>My Projects</p>
  </div>
  <div class="card_content"><?php echo $row1;?></div>
</div></a>


<a href="awarded_projects.php"><div class="card 3">
  <div class="card_image">
    <img src="https://i.gifer.com/VIcP.gif" />
  </div>
  <div class="card_title title-white">
    <p>Awarded Projects</p>
  </div>
   <div class="card_content"><?php echo $row2;?></div>
</div></a>

    <a href="bid-project.php"><div class="card 4">
  <div class="card_image">
    <img src="https://i.gifer.com/o3h.gif" />
    </div>
  <div class="card_titlex">
    <p>Projects in my domain</p>
  </div>
<div class="card_content"><?php echo $row4;?></div>
  </div>

</div></a>



     
      </div>
    </div>
    
    
    
    
    <br><br>

<div class="container" data-aos="fade-up">
  <div class="col mb-5 justify-content-center text-center"  >
          <div class="row-7 text-center  mb-5">
     <h1 class="section-title" ><br>Quick Actions </h1><br>
     </div>

      <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" >
            
          <a href="make-project.php"><div class="unit-4 d-block">
              <div class="unit-4-icon mb-3">
                <span class="icon-wrap"><span class="text-primary icon-rupee"></span></span>
              </div>
              <div>
                <h3>Post a project</h3>
              
</a>
              </div>
            </div>

          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" >

          <a href="bid-project.php"><div class="unit-4 d-block">
              <div class="unit-4-icon mb-3">
                <span class="icon-wrap"><span class="text-primary icon-trophy"></span></span></span></span>
              </div>
              <div>
                <h3>Bid on projects</h3>
               
</a>
              </div>
            </div>
          </div>
       


          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
          <a href="my-projects.php"> <div class="unit-4 d-block">
              <div class="unit-4-icon mb-3">
                <span class="icon-wrap"><span class="text-primary icon-refresh"></span></span>
              </div>
              <div>
                <h3>My projects</h3>
                
</a>
              </div>
            </div>
          </div>
         


            
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
		<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5eab0bbc203e206707f86895/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

		<!-- end: CLIP-TWO JAVASCRIPTS -->

	</body>
</html>
