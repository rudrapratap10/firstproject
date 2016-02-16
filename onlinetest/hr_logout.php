<?php
session_start();
 session_destroy();
 echo "<script>alert('Successfully Logged Out..!!');</script>";
 echo "<script>window.location='office_user_login.php';</script>";
 ?>