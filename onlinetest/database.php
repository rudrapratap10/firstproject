<?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
    

    $conn = new mysqli($servername , $username , $password);
  
    if($conn -> connect_error)
    {
       die("Connection failed" . $conn ->connect_error);
    }
    $sql = "CREATE DATABASE MydB";

    if ($conn -> query($sql) == TRUE)
    {
    	echo "DATABASE CREATED SUCESSFULLY";
    }
    else
    {
    	echo "ERROR CREATING DATABASE" . $conn->error;
    }
    $conn->close();

?>
