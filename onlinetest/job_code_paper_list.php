<?php
session_start();
if($_SESSION['hr1'] == session_id())
{?>



<!DOCTYPE html>
<html>
<head>
  <style>
  #margin{
    margin-top: 90px;
    background-color: #ffffe5;
    opacity:0.9;
  }
  </style>
</head>
<?php include 'hr_page.php' ?>
<table id="margin" border="1px" style="width:100%; height:500px;">
  <tr  valign="top"><td>
<table border= "1px" style="width:100%" >
  	
  
  <tr>
    <h1><font color='#4d1300'>Job Code Paper List</font></h1>
    <button name="subject" type="submit" style="float:right;"><a href ="job_code_paper.php" ><font  size="5" style="font-family:Arial;">Add</font></a></button>
    <td><b>Sl No.</b></td>
    <td><b>Job Code</b></td>		
    <td><b>Paper Name</b></td>
    <td><b>Delete</b></td>
  </tr>
  <form method = "post">
   <?php
              
                 require 'db_connection.php';
               $i=1;

               $sql = mysql_query("SELECT * FROM  job_code_papers ");
              while( $row = mysql_fetch_assoc($sql))
              {
                $b=$row['job_code_master_id'];
                 $sql1 = mysql_query("SELECT * FROM  job_code_master WHERE job_code_master_id=".$b);
                $row1 = mysql_fetch_assoc($sql1);
                  
                echo "<td><b><font color='#000066'>".$i."</font></b></td>";
                echo "<td><b><font color='#000066'>".$row1['job_code']."</font></b></td>";


                $x=$row['question_master_id'];
                 $sql2 = mysql_query("SELECT * FROM  question_master WHERE question_master_id=".$x);
                $row3 = mysql_fetch_assoc($sql2);
                echo "<td><b><font color='#000066'>".$row3['paper_name']."</font></b></td>";
                  
                $y=$row['job_code_papers_id'];
                
                echo "<td>&nbsp;<button type='submit' style='width:59px;height: 28px;font-size: 15px;background-color: #b3e5ff;' name='delete' value='".$y."'>Delete</button></td>";
                  
                
            
                  echo"</tr>";
                 $i++;
              }
                   if(isset($_POST['delete']))
                   {
                     
                    $sql1 =  "DELETE FROM job_code_papers WHERE job_code_papers_id =".$_POST['delete'];
                    if(mysql_query($sql1))
                    {
                      echo "<script>alert('Deleted Successfully');</script>";
                      echo "<script>window.location='';</script>";
                    }
                   }
                   

                       
                   ?>
  
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
