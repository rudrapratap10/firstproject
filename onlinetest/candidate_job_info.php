<?php
session_start();
if($_SESSION['hr1'] == session_id())
{?>

<!DOCTYPE HTML>
<html>
<head>
           <link href="info.css" rel="stylesheet" type="text/css"></link>
           <script type="text/javascript" src="jquery-1.11.1.min.js"></script>

         <style>
               #office{
                       background-color: #00ffff;
                  }
                   #wrapper { 
height: 400px;
width: 470px; 
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
       <script type="text/javascript">
function get()
{
var id = $('#name').val();
    var datastring  = 'getid='+id;
    $.ajax({
      type: "POST",
      data: datastring,
      url: "ajax1.php",
      success: function(data)
      {
       
         
          $('#job_code1').html(data);

      },
        
    });

}
</script>
     </head>

<body>
    <?php include 'hr_page.php' ?>
	<center><div id="wrapper">
     <h2 id = "office"><b>Candidate Job Info<b></h2>
     <form class="candidate_job_info" method = "post"><p align="left">
      <label for ="name"> Candidate Name:</label>&nbsp;<select name="name" id="name" onchange="get()">
<option selected="selected">--Select Code--</option>
<?php

   require 'db_connection.php';
    $result = mysql_query("SELECT * FROM candidate_profile");
    while($row = mysql_fetch_assoc($result))
  {
   
      echo "  <option value='". $row['candidate_profile_id']."'>". $row['name']."</option>";
      
  } 
?>
</select>
<br><br>
<label>Job Code :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <select name="job_code" id="job_code1">
<option disabled="disabled" selected="selected">--Select Code--</option>
</select>
<img  id="loding1"></img>
<br><br>

        <label for ="paper_name"><b>Paper Name:</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><select id="period_dropdown" name="paper_name" onchange="updateButton()">
        <option value="nill" disabled="disabled" selected="selected">select paper</option>
        <?php 
                    require 'db_connection.php';
                    $result = mysql_query("SELECT * FROM question_master");
                    while($row = mysql_fetch_assoc($result))
                      {
                        echo "<option value='".$row['question_master_id']."'>".$row['paper_name']."</option>";
                      }
                  ?>
        </select><br><br>
        <b>Candidate Login Id:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="login"> 
        <br><br>
        <b>Test start date/time:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="test_start"> 
        <br><br>
        <b>Test end date/time:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="test_end"> 
        <br><br>
        <b>Score:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="score">
        <br><br>
        <b>Locked:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="locked" value="1" checked="checked">YES&nbsp;&nbsp;&nbsp;
        <input type="radio" name="locked" value="0">NO
        <br><br>
        </p>
        <center>
        <tr>
        <tr><td><input type="submit" name="submit" ></td></tr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <tr><td><button name="subject" type="submit"><a href ="candidate_job_info_list.php">View</a></button></td></tr>
        </tr></center>
        <?php
              
                 require 'db_connection.php';
                 if (isset($_POST['submit'])) 
                  {
                    $nm = $_POST['name'];
                    $jc = $_POST['job_code'];
                    $pn = $_POST['paper_name'];
                    $cln = $_POST['login'];
                    $lo = $_POST['locked'];


                    mysql_query(" INSERT INTO `MydB`.`candidate_job_info` (`candidate_job_info_id`, `candidate_profile_id`, `job_code_master_id` , `question_master_id`, `candidate_login_id`, `locked` ) VALUES ('', '$nm' , '$jc' , '$pn' , '$cln' , '$lo' ) ");
                     
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

                  
                  

