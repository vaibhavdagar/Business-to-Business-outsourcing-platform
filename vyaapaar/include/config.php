<?php
define('DB_SERVER','localhost');
define('DB_USER','iservign_vaibhav');
define('DB_PASS' ,'Vaibhav1');
define('DB_NAME', 'iservign_vyaapaar');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>