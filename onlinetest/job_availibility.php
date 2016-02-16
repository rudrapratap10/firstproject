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
<table border= "1px" style="width:100%">
  	<h1><font color='#4d1300'>Active Posts</font></h1>
  	<button name="subject" type="submit" style="float:right;"><a href ="job_code_master.php" ><font  size="5" style="font-family:Arial;">Add</font></a></button>
  <tr><tbody>
    <th><b>Sl No.</b></th>
    <td><b>Job Code</b></td>		
    <td><b>Description</b></td>
    <td><b>Creation Date</b></td>
    <td><b>Active</b></td>
    <td><b>Edit/delete</b></td></tr>
<tr>
  <form method = "post">
   <?php
              
                 require 'db_connection.php';
               $i=1;

               $sql = mysql_query("SELECT * FROM  job_code_master ");
              while( $row = mysql_fetch_assoc($sql))
              {
               
                echo "<td><b><font color='#000066'>".$i."</font></b></td>";
                echo "<td><b><font color='#000066'>".$row['job_code']."</font></b></td>";
                echo"<td><b><font color='#000066'>".$row['job_desc']."</font></b></td>";
                echo"<td><b><font color='#000066'>".$row['creation_date']."</font></b></td>";
                
                
                if ($row['activate']== '1')
                   {
                     echo"<td><b><font color='#000066'>Yes</font></b></td>";
                   }
                   else
                   {
                     echo"<td><b><font color='#000066'>No</font></b></td>";
                   }
                
                $b=$row['job_code_master_id'];
                echo "<td>&nbsp;<button type='submit' style='width:43px;height: 28px;font-size: 15px;background-color: #b3e5ff;' name='edit' value='".$b."'' >Edit</button>";
                echo "&nbsp;&nbsp;<button type='submit' style='width:59px;height: 28px;font-size: 15px;background-color: #b3e5ff;'  name='delete' value='".$b."'>Delete</button></td>";
                  
                  echo"</tr>";
                 $i++;
              }
                   if(isset($_POST['delete']))
                   {
                 
                    $sql1 =  "DELETE FROM job_code_master WHERE job_code_master_id =".$_POST['delete'];

                    if(mysql_query($sql1))
                    {
                      echo "<script>alert('Deleted Successfully');</script>";
                      echo "<script>window.location='';</script>";
                    }
                   }
                   

                       if(isset($_POST['edit']))
                       {
               
                           
                           $res1=mysql_query("SELECT * FROM job_code_master WHERE `job_code_master_id`=".$_POST['edit']);
                           while($row1= mysql_fetch_assoc($res1))
                       {
                
                           $jobcd=$row1['job_code'];
                           $jobdes=$row1['job_desc'];
                           $cre=$row1['creation_date'];
                            echo"</table><center><table  border='1px solid' style='width:30%; border-collapse: collapse; background-color:#F0F0F0;'>
                                   <td style='text-align:center; text-decoration: underline; color:red; background-color:#99ff33;'><b>EDIT DATA</b></td>
                          
                            <tr><td><br><b>Job Code: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type='text' name='editjbcd'  value='".$jobcd." '><br><br></td>  </tr>  
                           <tr style='vertical-align: text-top;'> <td ><b>Description:&nbsp;&nbsp; &nbsp;&nbsp;</b><textarea type='text' name='editjbdes'   rows='4' cols='20'>".$jobdes."</textarea></td></tr>  
                            <tr><td><br><b>Creation Date: </b><input type='text' name='editcre'  value='".$cre."'></td></tr>  
                           <tr> <td><br><b>Active:</b><input type='radio' name='editactive' value='1' checked='checked'>Yes<input type='radio' name='editactive' value='0' > No </td></tr>  
                            <tr><td colspan='2' style='padding-left:150px;'><button name='sumbmiteditdata' value='".$_POST['edit']."' type='submit'>Ok</button></td><tr>
                               </table></center>";
                          
                             
                       
                       if(isset($_POST['submiteditdata']))
                       {
                     
                           $sql1 =mysql_query( "UPDATE job_code_master  SET job_code='$jobcd', job_desc='$jobdes' creation_date='$cre'  where job_code_master_id=".$_POST['edit']);
                       }
                       }
                       }
                       if(isset($_POST['sumbmiteditdata']))
                       {
                           $a=$_POST['editjbcd'];
                           $b=$_POST['editjbdes'];
                           $c=$_POST['editcre'];
                            $d=$_POST['editactive'];
                           $sql1=" UPDATE  `job_code_master` SET `job_code`= '$a' , `job_desc`= '$b' , `creation_date`= '$c' , `activate`= '$d' WHERE `job_code_master_id`=".$_POST['sumbmiteditdata'];
                       if(mysql_query($sql1))
                       {
                  
                           echo "<script>alert('Successfully Edited...');</script>";
                           echo "<script>window.location='';</script>";
                       }
                       }
                   ?>

  </form>
</tbody></table>
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
