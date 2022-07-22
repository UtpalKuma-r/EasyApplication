<?php
session_start();
session_unset();
session_destroy();
echo "<script>if(confirm('You are logged out. Login to continue.')){document.location.href='../LoginPage.php'};</script>";
?>