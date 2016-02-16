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
                  #wrapper { 
height: 200px;
width: 450px; 
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
     <h2 id = "office"><b>Job Code Papers<b></h2>
     <form class="job_code_paper" method= "post"><p align="left">
        <label for ="job_code_paper">Job Code:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><select id="period_dropdown" name="job_code_paper" onchange="updateButton()">
        <option value="nill" disabled="disabled" selected="selected">select Code</option>
        <?php 
                    require 'db_connection.php';
                    $result = mysql_query("SELECT * FROM job_code_master");
                    while($row = mysql_fetch_assoc($result))
                      {
                        echo "<option value='".$row['job_code_master_id']."'>".$row['job_code']."</option>";
                      }
                  ?>
        </select><br><br>
        <label for ="paper_name">Paper Name:</label>&nbsp;</b><select id="period_dropdown" name="paper_name" onchange="updateButton()">
        <option value="nill" disabled="disabled" selected="selected">select Paper</option>
        <?php 
                    require 'db_connection.php';
                    $result = mysql_query("SELECT * FROM question_master");
                    while($row = mysql_fetch_assoc($result))
                      {
                        echo "<option value='".$row['question_master_id']."'>".$row['paper_name']."</option>";
                      }
                  ?>
        </select><br><br></p>
        <center>
        <tr>
        <tr><td><button name="save" type="submit">Save</button></td></tr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <tr><td><button name="subject" type="submit"><a href ="job_code_paper_list.php">View</a></button></td></tr>
        </tr></center>
        <?php
              
                 require 'db_connection.php';
                 if (isset($_POST['save'])) 
                  {
                    $jcp = $_POST['job_code_paper'];
                    $pn = $_POST['paper_name'];
                  
                      
                    mysql_query(" INSERT INTO `MydB`.`job_code_papers` (`job_code_papers_id`, `job_code_master_id`, `question_master_id` ) VALUES ('', '$jcp' , '$pn') ");
                     
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