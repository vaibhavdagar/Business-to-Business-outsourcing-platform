<?php
session_start();
include('include/config.php');
$_SESSION['login']=="";
session_unset();
//session_destroy();
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="./registration.php";
</script>
