<?php
session_start();
if($_SESSION['hr1'] == session_id())
{?>



<!DOCTYPE html>
<html>
<head>
  <style>
  #margin{
    margin-top: 60px;
    background-color: #ffffe5;
    opacity:0.9;
  }
  </style>
</head>
<?php include 'hr_page.php' ?>
<table id="margin" border="1px" style="width:100%; height:500px;">
  <tr  valign="top"><td>
<table border= "1px solid blue" style="width:100%;">
  
  	<h1><font color='#4d1300'>Candidate Job Info List</font></h1>
  	<button name="subject" type="submit" style="float:right;"><a href ="candidate_job_info.php" ><font  size="5" style="font-family:Arial;">Add</font></a></button>
  <tr>
    <td><b>Sl No.</b></td>
    <td><b>Candidate Name</b></td>		
    <td><b>Job Code</b></td>
    <td><b>Paper Name</b></td>
    <td><b>Candidate Login Id</b></td>
    <td><b>Test start date/time</b></td>
    <td><b>Test end date/time</b></td>
    <td><b>Score</b></td>
    <td><b>Locked</b></td>
    <td><b>Edit/delete</b></td>
  </tr>
  <form method = "post">
   <?php
              
                 require 'db_connection.php';
               $i=1;

               $sql = mysql_query("SELECT * FROM  candidate_job_info");
              while( $row = mysql_fetch_assoc($sql))
              {
                 $b=$row['candidate_profile_id'];
                 $sql1 = mysql_query("SELECT * FROM  candidate_profile WHERE candidate_profile_id=".$b);
                 $row1 = mysql_fetch_assoc($sql1);
                echo "<td><b><font color='#000066'>".$i."</font></b></td>";
                echo "<td><b><font color='#000066'>".$row1['name']."</font></b></td>";
                $c=$row['job_code_master_id'];
                 $sql1 = mysql_query("SELECT * FROM  job_code_master WHERE job_code_master_id=".$c);
                $row2 = mysql_fetch_assoc($sql1);
                  
                
                echo "<td><b><font color='#000066'>".$row2['job_code']."</font></b></td>";
                $x=$row['question_master_id'];
                 $sql2 = mysql_query("SELECT * FROM  question_master WHERE question_master_id=".$x);
                $row3 = mysql_fetch_assoc($sql2);
                echo "<td><b><font color='#000066'>".$row3['paper_name']."</font></b></td>";
                 echo "<td><b><font color='#000066'>".$row['candidate_login_id']."</font></b></td>";
                 echo "<td><b><font color='#000066'>".$row['test_start_date_time']."</font></b></td>";
                 echo "<td><b><font color='#000066'>".$row['test_end_date_time']."</font></b></td>";
                 echo "<td><b><font color='#003300'>".$row['score']."</td>";
                 if ($row['locked']== '1')
                   {
                     echo"<td><b><font color='#000066'>Yes</font></b></td>";
                   }
                   else
                   {
                     echo"<td><b><font color='#000066'>No</font></b></td>";
                   }

                $z=$row['candidate_job_info_id'];
                echo "<td>&nbsp;<button type='submit' style='width:43px;height: 28px;font-size: 15px;background-color: #b3e5ff;' name='edit' value='".$z."'' >Edit</button>";
                echo "&nbsp;&nbsp;<button type='submit' style='width:59px;height: 28px;font-size: 15px;background-color: #b3e5ff;' name='delete' value='".$z."'>Delete</button></td>";
                  
                  echo"</tr>";
                 $i++;
              }
                   if(isset($_POST['delete']))
                   {
                 
                    $sql1 =  "DELETE FROM candidate_job_info WHERE candidate_job_info_id =".$_POST['delete'];

                    if(mysql_query($sql1))
                    {
                      echo "<script>alert('Deleted Successfully');</script>";
                      echo "<script>window.location='';</script>";
                    }
                   }


                   if(isset($_POST['edit']))
                       {
               
                  
                           $res1=mysql_query("SELECT * FROM candidate_job_info WHERE `candidate_job_info_id`=".$_POST['edit']);
                           while($row1= mysql_fetch_assoc($res1))
                       {
                
                           $cli=$row1['candidate_login_id'];
                           echo"</table><center><table  border='1px' style='width:30%; border-collapse: collapse;background-color:#F0F0F0;'>
                                   <td style='text-align:center; text-decoration: underline; color:red; background-color:#99ff33;'><b>EDIT DATA</b></td>
                          
                            <tr><td><br><b>Candidate Login Id: &nbsp;</b><input type='text' name='editcli'  value='".$cli." '><br><br></td>  </tr>  
                           
                            <tr><td colspan='2' style='padding-left:150px;'><button name='sumbmiteditdata' value='".$_POST['edit']."' type='submit'>Ok</button></td><tr>
                               </table></center>";
                           
                  
                          
                             
                       
                       if(isset($_POST['submiteditdata']))
                       {
                     
                           $sql1 =mysql_query( "UPDATE candidate_job_info  SET candidate_login_id='$cli'  where candidate_job_info_id=".$_POST['edit']);
                       }
                       }
                       }
                       if(isset($_POST['sumbmiteditdata']))
                       {
                           $a=$_POST['editcli'];
                           
                           $sql1=" UPDATE  `candidate_job_info` SET `candidate_login_id`= '$a'  WHERE `candidate_job_info_id`=".$_POST['sumbmiteditdata'];
                       if(mysql_query($sql1))
                       {
                  
                           echo "<script>alert('Successfully Edited...');</script>";
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