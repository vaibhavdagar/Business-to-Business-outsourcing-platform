<?php
session_start();
error_reporting(0);

include_once('include/config.php');

if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$registration=$_POST['registration'];
$address=$_POST['city'];
$skill=$_POST['skill'];
$website=$_POST['website'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$status=0;
$activationcode=md5($email.time());

$result =mysqli_query($con,"SELECT email FROM buyer WHERE email='$email'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<script>alert('This email is already in use. Please use another email.');</script>";

}

else{

$query=mysqli_query($con,"INSERT INTO buyer (name,registration,address,skills,website,email,password,activationcode,status)values('$fname','$registration','$address','$skill','$website','$email','$password','$activationcode','$status')");
if($query)
{

$to=$email;
$msg= "Thanks for new Registration.";
$subject="Email verification";
$headers .= "MIME-Version: 1.0"."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers .= 'From:Vyaapaar <vaibhav@vyaapaar.iserv.co.in>'."\r\n";
$ms.="<html></body><div><div>Dear $fname,</div></br></br>";
$ms.="<div style='padding-top:8px;'>Please click The following link for verification and activation of your account</div>
<div style='padding-top:10px;'><a href='https://vyaapaar.iserv.co.in/email_verification.php?code=$activationcode'>Click Here</a></div>
</div>
</body></html>";
mail($to,$subject,$ms,$headers);
echo "<script>alert('Please verify your Email by clicking the link sent to your Email-Id. Please check spam folder as well.');</script>";
echo "<script>window.location = 'registration.php';</script>";;
}
else
{
echo "<script>alert('Data not inserted');</script>";
}
}
}


if(isset($_POST['login']))
{
$ret=mysqli_query($con,"SELECT * FROM buyer WHERE email='".$_POST['username']."' and password='".md5($_POST['password'])."' AND status='1'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";//
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;

header("location:dashboard.php");
exit();
}
else
{
	echo "<script>alert('Username or password is wrong.');</script>";
	echo "<script>window.location = 'registration.php';</script>";;
exit();
}
}
?>

<head>
    <title>Sign In</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
   
    <style>

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
    box-sizing: border-box;
}

body {
    font-family: 'Montserrat', sans-serif;
    background: #f6f5f7;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: -20px 0 50px;
		margin-top: 20px;
}

h1 {
    font-weight: bold;
    margin: 0;
}

p {
    font-size: 14px;
    font-weight: 100;
    line-height: 20px;
    letter-spacing: .5px;
    margin: 20px 0 30px;
}

span {
    font-size: 12px;
}

a {
    color: #333;
    font-size: 14px;
    text-decoration: none;
    margin: 15px 0;
}

.container {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0, 0, 0, .25), 0 10px 10px rgba(0, 0, 0, .22);
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    min-height: 600px;
}

.form-container form {
    background: #fff;
    display: flex;
    flex-direction: column;
    padding:  0 50px;
    height: 100%;
    justify-content: center;
    align-items: center;
    text-align: center;
}

.social-container {
    margin: 20px 0;
}

.social-container a {
    border: 1px solid #ddd;
    border-radius: 50%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 5px;
    height: 40px;
    width: 40px;
}

.form-container input {
    background: #eee;
    border: none;
    padding: 12px 15px;
    margin: 8px 0;
    width: 100%;
}

.form-container select {
    background: #eee;
    border: none;
    padding: 12px 15px;
    margin: 8px 0;
    width: 100%;
}

button {
    border-radius: 20px;
    border: 1px solid #78B7D2;
    background: #007bff;
    color: #fff;
    font-size: 12px;
    font-weight: bold;
    padding: 12px 45px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
}

button:active {
    transform: scale(.95);
}

button:focus {
    outline: none;
}

button.ghost {
    background: transparent;
    border-color: #fff;
}

.form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all .6s ease-in-out;
}

.sign-in-container {
    left: 0;
    width: 50%;
    z-index: 2;
}

.sign-up-container {
    left: 0;
    width: 50%;
    z-index: 1;
    opacity: 0;
}

.overlay-container {
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: transform .6s ease-in-out;
    z-index: 100;
}

.overlay {
    background: #007bff;
    background: linear-gradient(to right, #78B7D2, #007bff) no-repeat 0 0 / cover;
    color: #fff;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateY(0);
    transition: transform .6s ease-in-out;
}

.overlay-panel {
    position: absolute;
    top: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 0 40px;
    height: 100%;
    width: 50%;
    text-align: center;
    transform: translateY(0);
    transition: transform .6s ease-in-out;
}

.overlay-right {
    right: 0;
    transform: translateY(0);
}

.overlay-left {
    transform: translateY(-20%);
}

/* Move signin to right */
.container.right-panel-active .sign-in-container {
    transform: translateY(100%);
}

/* Move overlay to left */
.container.right-panel-active .overlay-container {
    transform: translateX(-100%);
}

/* Bring signup over signin */
.container.right-panel-active .sign-up-container {
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
}

/* Move overlay back to right */
.container.right-panel-active .overlay {
    transform: translateX(50%);
}

/* Bring back the text to center */
.container.right-panel-active .overlay-left {
    transform: translateY(0);
}

/* Same effect for right */
.container.right-panel-active .overlay-right {
    transform: translateY(20%);
}

.footer {
	margin-top: 25px;
	text-align: center;
}


.icons {
	display: flex;
	width: 30px;
	height: 30px;
	letter-spacing: 15px;
	align-items: center;
}

.logo {
    margin-bottom:35px;
    border-radius: 80px;
    border: 1px solid #fff;
    background: #fff;
    color: #fff;
    padding: 15px 15px;
    transition: transform 80ms ease-in;
}

.opacity-fade {
    animation:fade ease 3.5s;
    animation-iteration-count:1;
    animation-fill-mode: forwards;

}
.opacity-fade-container {
    animation:fade ease 2s;
    animation-iteration-count:1;
    animation-fill-mode: forwards;

}


@keyframes fade{
    0%{
        opacity: 0;
    }
    100%{
        opacity: 1;
    }

}


        </style>
        </head>

        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous">

        <div class="col-6 col-md-3 col-xl-4  d-block opacity-fade">
            <h1 class="mb-0 site-logo logo"><a href="index.html" class="text-black h2 mb-0"><img src="vyaparlogo.png" height="50px" width="150px"></a></h1>
          </div>

<div class="container opacity-fade-container" id="container">
        <div class="form-container sign-up-container">
            <form method="post">
                <h2>Create Account</h2>
                <input type="text" name="full_name" placeholder="Your business name*" />
                Registration Type*:
                <select class="form-control" required name="registration">
                    <option value="Partnership Firm">Partnership Firm</option>
                    <option value="Sole Proprietorship">Sole Proprietorship</option>
                    <option value="Public Limited Company">Public Limited Company</option>
                    <option value="Limited Liability Partnership(LLP)">Limited Liability Partnership(LLP)</option>
                    <option value="Section 8 Company">Section 8 Company</option>
                    <option value="One Person Company(OPC)">One Person Company(OPC)</option>
                    <option value="Private Limited Company">Private Limited Company</option>
</select>
                    
                

				<input type="text" name="city" placeholder="Business City*" /required>
				<input type="text" name="website" placeholder="Your business website" />
				<input type="email" name="email" id="email" onBlur="userAvailability()"  placeholder="Your Email*" required>
                <input type="password" name="password" placeholder="Your Password*" />
               Business Domain*:<select required="" name="skill"><!---->
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
</select><br>
                <button type="submit" name="submit" value="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="post">
                <h1>Sign in</h1>
             
                <span>Enter your account details</span>
                 <input type="email" name="username" placeholder="Email"   />
                <input type="password" name="password" placeholder="Password" />
                <a href="forgot-password.php" class="link">Forgot your password?</a>
                <button type="submit" value="login" name="login">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>Sign in to access your account!</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, There!</h1>
                    <p>Didn't sign up yet? Sign up with us now!</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>



<script>
        const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () =>
container.classList.add('right-panel-active'));

signInButton.addEventListener('click', () =>
container.classList.remove('right-panel-active'));
        </script>
					
						


		
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>	
		
	</body>
	<!-- end: BODY -->
</html>
