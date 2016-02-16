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
                opacity:0.9;
              }
              #wrapper { 
height: 130px;
width: 400px; 
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
      <?php include 'tl_page.php' ?>
      	<center><div id="wrapper">
           <h2 id = "office" ><b>PAPER SUBJECT<b></h2>
           <form class="paper_subject" method="post"><p align="left">
           	    <label for ="paper_type">Paper Type:</label>&nbsp;<input type="text" name="paper_type" required>
                <br><br>
      	        <center class = "sub_submit"><input type="submit" name="submit"></center>


                <?php
              
                 require 'db_connection.php';
                 if (isset($_POST['submit'])) 
                  {
                    $pa = $_POST['paper_type'];
                     
                      
                    mysql_query(" INSERT INTO `MydB`.`paper_subject` (`paper_subject_id`, `paper_type`) VALUES ('', '$pa') ");
                     
                 if(mysql_affected_rows())

                  {
                    echo "<script>alert('Updated Successfully');</script>";
                  }

                  } 

      
               
                   ?>
           </form>
        </div></center><br>
        
        




<table id="margin" border="1px" style="width:100%; height:50px;">
  <tr  valign="top"><td>
<table border= "1px" style="width:100%">
    
  <tr>
    <h1><font color='#4d1300'>Paper Subject List</font></h1>
    
    <td>Sl No.</td>
    <td>Paper Type</td>   
    
    <td>Delete</td>
  </tr>

  <form method = "post">
   <?php
              
                 require 'db_connection.php';
               $i=1;

               $sql = mysql_query("SELECT * FROM  paper_subject ");
              while( $row = mysql_fetch_assoc($sql))
              {
                
                echo "<td><b><font color='#000066'>".$i."</font></b></td>";
                echo "<td><b><font color='#000066'>".$row['paper_type']."</font></b></td>";
                
                   
                $b=$row['paper_subject_id'];
                
                echo "<td>&nbsp;<button type='submit' style='width:59px;height: 28px;font-size: 15px;background-color: #b3e5ff;' name='delete' value='".$b."'>Delete</button></td>";
                  
                  echo"</tr>";
                 $i++;
              }
                   if(isset($_POST['delete']))
                   {
                     
                    $sql2 =  "DELETE FROM paper_subject WHERE paper_subject_id =".$_POST['delete'];
                    if(mysql_query($sql2))
                    {
                      echo "<script>alert('Deleted Successfully');</script>";
                      echo "<script>window.location='';</script>";
                    }
                   }
            ?>
  </form>
  
</table>
</td></tr>
</table>


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

           
	     