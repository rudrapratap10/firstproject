<?php
session_start();
if($_SESSION['hr1'] == session_id())
{?>



<!DOCTYPE HTML>
<html>
   <head>
	   <link href ="info.css" rel ="stylesheet" type="text/css"></link>
     <style>
      #wrapper { 
height: 450px;
width: 500px; 
padding:20px;
background-color: white; 
margin-top: 50px;
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
	   <center>
	   <div id="wrapper">
            <h2><font size="5" color="#0098e6"><u><b>EMPLOPYEE BASIC INFORMATION<b></u></font></h2>
     
          <form class="form" method="post"><p align="left">
		      Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" required> 
		      <br><br>
		      <label for ="qualification" style ="vertical-align:top;">Qualification:&nbsp;&nbsp;</label><textarea name="qualification" type="text" rows="4" cols="20" required></textarea> 
		      <br><br>
          Mobile:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="mobile" required> 
          <br><br>
		      Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" placeholder = "info@gmail.com" required> 
		      <br><br>
		      DateofBirth:&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="dateofbirth">
		      <br><br>
		      Gender:
		      <input type="radio" name="gender" value="1" checked="checked">MALE
		      <input type="radio" name="gender" value="2">FEMALE
		      <input type="radio" name="gender" value="0">OTHERS
		      <br><br>
		      Experienced:
		      <input type="radio" name="experienced" value="0" checked="checked">YES
		      <input type="radio" name="experienced" value="1">NO
		      <br><br>
		      <label for ="job_codes">Job Code:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><select id="period_dropdown" name="job_codes" >
      	       <option value="nill" disabled="disabled" selected="selected">select paper</option>
               <?php 
                    require 'db_connection.php';
                    $result = mysql_query("SELECT * FROM job_code_master");
                    while($row = mysql_fetch_assoc($result))
                      {
                        echo "<option value='".$row['job_code_master_id']."'>".$row['job_code']."</option>";
                      }
                  ?>



               </select><br><br>
               <center>
               <tr>
		       <tr><td><input type="submit" name="submit" ></td></tr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		       <tr><td><button name="subject" type="submit"><a href ="candidate_lists.php" >View Candidate</a></button></td></tr>
		       </tr></center>
              </p>
              <?php
              
                 require 'db_connection.php';
               if (isset($_POST['submit'])) 
                 {
                 	  $nm = $_POST['name'];
                    $qa = $_POST['qualification'];
                    $mb = $_POST['mobile'];
                    $em = $_POST['email'];
                    $dob = $_POST['dateofbirth'];
                    $gd = $_POST['gender'];
                    $ex = $_POST['experienced'];
                    $jc = $_POST['job_codes'];
                   

                      
                    
                      
                    mysql_query(" INSERT INTO `MydB`.`candidate_profile` (`candidate_profile_id`, `name`, `qualification`, `mobile_no`, `email`, `dob` , `gender` , `experienced` , `job_code_master_id` ) VALUES ('', '$nm', '$qa', '$mb', '$em', '$dob' , $gd , $ex , $jc) ");
                    
               if(mysql_affected_rows())

                  {
                  	echo "<script>alert('Updated Successfully');</script>";
                  }

                  } 

      
               
                   ?>

          </form>
     </div>
     </center>
	  

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

      