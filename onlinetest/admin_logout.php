<?php
session_start();
 session_destroy();
 echo "<script>alert('Successfully Logged Out..!!');</script>";
 echo "<script>window.location='admin.php';</script>";
 ?>