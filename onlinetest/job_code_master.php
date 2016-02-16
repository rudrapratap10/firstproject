<?php
session_start();
if($_SESSION['hr1'] == session_id())
{?>


<!DOCTYPE HTML>
<html>
    <head>
	       <link href="info.css" rel="stylesheet" type="text/css"></link>
	  <style>
		  #office{
	                background-color: #00ffff;
                 }
       #job_code{
                     background-color: #ccffff;

       }  
       #wrapper { 
height: 300px;
width: 480px; 
padding:20px;
background-color: white; 
margin-top: 70px;
/* outer shadows  (note the rgba is red, green, blue, alpha) */
-webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
-moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);

/* rounded corners */
-webkit-border-radius: 12px;
-moz-border-radius: 7px; 
border-radius: 7px;

/* gradients */
background: -webkit-gradient(linear, left top, left bottom, 
color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); 
}        
       </style>
    </head>
    <body>
    	<?php include 'hr_page.php' ?>
	   <center><div id="wrapper">
           <h2 id = "office"><b>REQUIREMENT POSTS<b></h2>
           <form class="job_code" method="post"><p align ="left">
	     
		      <label for ="job_code">Job Code:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="text" name="job_code" required>
		      <br><br>
		      <label for ="job_desc" style ="vertical-align:top;"> Job Description:</label>&nbsp;<textarea type="text" name="job_desc" rows="4" cols="20" required></textarea> 
		      <br><br>
		      Creation Date:&nbsp;&nbsp;&nbsp;&nbsp;<input name="creation_date" type="text" required> 
		      <br><br>
		      Active:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		      <input type="radio" name="active" value="1" checked="checked">YES&nbsp;&nbsp;
		      <input type="radio" name="active" value="0">NO
		      <br>
		      <center>
		      <tr>
		      <tr><td><input type="submit" name="submit" ></td></tr>&nbsp;&nbsp;
		      <tr><td><button name="subject" type="submit"><a href ="job_availibility.php" >View</a></button></td></tr>
		      </tr></center>
		      </p>

              <?php
              
                 require 'db_connection.php';
               if (isset($_POST['submit'])) 
                 {
                 	  $jc = $_POST['job_code'];
                    $jd = $_POST['job_desc'];
                    $cd = $_POST['creation_date'];
                    $ad = $_POST['active'];

                      
                    mysql_query(" INSERT INTO `MydB`.`job_code_master` (`job_code_master_id`, `job_code`, `job_desc`, `creation_date`, `activate`) VALUES ('', '$jc', '$jd', '$cd', '$ad') ");
                    
               if(mysql_affected_rows())

                  {
                  	echo "<script>alert('Updated Successfully');</script>";
                  }

                  } 

      
               
                   ?>




           </form>
       </div></center>
      
    </body>
</html>	  
<?php
}
else
{
  echo "<script>alert('You must Login first');</script>";
  echo "<script>window.location='office_user_login.php';</script>";
}
?>  
  
