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
                  #margin{
                margin-top: 20px;
                background-color: #ffffe5;
                
              }
              #wrapper { 
height: 180px;
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
.btn
{
  width:18%;
  height: 18%;
  font-size: 20px;
  background-color: #b3e5ff;

}
.op{
  font-size: 18px;
}
       </style>
     </head>
     <body>
      <?php include 'tl_page.php' ?>
      	<center><div id="wrapper">
           <h2 id = "office" ><font size="6"><b>Code Selection<b></font></h2>
           <form class="paper_subject" method="post"><p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           	    <label for ="job_code"><font size="5">Job Code:</font></label>&nbsp;</b><select id="period_dropdown" name="job_code" class="op">
        <option value="nill" disabled="disabled" selected="selected" >select Code</option>
        <?php 
                    require 'db_connection.php';
                    $result = mysql_query("SELECT * FROM job_code_master");
                    while($row = mysql_fetch_assoc($result))
                      {
                        echo "<option value='".$row['job_code_master_id']."'>".$row['job_code']."</option>";
                      }
                  ?>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
      	        <center><button type="submit" name="submit" class="btn">OK</button></center>

    

                    <?php
                    session_start();
                     require 'db_connection.php';
                    if(isset($_POST['submit']))
                    {
                        
                        $co = $_POST['job_code'];

                            $_SESSION["num"] = $co;
                        
                        echo "<script>window.location='test_result1.php';</script>";
                       }
                          
                       
                       ?> 
        </div></center><br>
        
                       
                        
                    
                   
                        
        </form>
                
     
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