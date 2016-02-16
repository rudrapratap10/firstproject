<?php
session_start();
if($_SESSION['tl'] == session_id())
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
height: 270px;
width: 410px; 
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
      <?php include 'tl_page.php' ?>
      	<center><div id="wrapper">
           <h2 id = "office"><b>Question Master<b></h2>
           <form class="paper_subject" method="post"> <p align="left">
           

           	    <label for ="p_type">Paper Type:</label>&nbsp;</b>
                <select  name="p_type">
      	        <option value="nill" disabled="disabled" selected="selected">select paper</option>
                
                <?php 
                    require 'db_connection.php';
                    $result = mysql_query("SELECT * FROM paper_subject");
                    while($row = mysql_fetch_assoc($result))
                      {
                        echo "<option value='".$row['paper_subject_id']."'>".$row['paper_type']."</option>";
                      }
                  ?>
               </select>
                <br><br>
                <label for ="paper_name" style ="vertical-align:top;">Paper Name:&nbsp;</label><textarea type="text" name="paper_name" rows="4" cols="15" required></textarea> 
                <br><br>
                Paper For:
                <input type="radio" name="paper_for" value="1" checked="checked">FRESHER
                <input type="radio" name="paper_for" value="0">EXPERIENCE
                <br><br>
                </p>
                <center>
                <tr>
                <tr><td><input type="submit" name="submit"></td></tr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <tr><td><button name="subject" type="submit"><a href ="question_master_list.php">View</a></button></td></tr>
                </tr></center>
                <?php
              
                 require 'db_connection.php';
                 if (isset($_POST['submit'])) 
                  {
                    
                    $pat = $_POST['p_type'];
                  
                    $pn = $_POST['paper_name'];
                    $pf = $_POST['paper_for'];
                    
                    
                      
                    mysql_query(" INSERT INTO `MydB`.`question_master` (`question_master_id`, `paper_subject_id`, `paper_name`, `paper_for`) VALUES ('', '$pat', '$pn', b'$pf') ");
                    
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
	     