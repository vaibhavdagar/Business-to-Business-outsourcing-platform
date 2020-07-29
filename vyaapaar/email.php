<?php
$to='dagarvaibhav525@gmail.com';
$msg= "Thanks for new Registration.";
$subject="Email verification";
$headers .= "MIME-Version: 1.0"."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers .= '<info@iserv.co.in>'."\r\n";
$ms.="<html></body><div><div>Dear ,</div></br></br>";
$ms.="<div style='padding-top:8px;'>Please click The following link For verifying and activation of your account</div>
<div style='padding-top:10px;'><a href='http://www.iserv.co.in/vyaapaar/email_verification.php?code=$activationcode'>Click Here</a></div>
</div>
</body></html>";

mail($to,$subject,$ms,$headers)


?>