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
  	
  <tr>
    <h1><font color='#4d1300'>Candidate List</font></h1>
    <button name="subject" type="submit" style="float:right;"><a href ="candidate_profile.php" ><font  size="5" style="font-family:Arial;">Add</font></a></button>
    <td><b>Sl No.</b></td>
    <td><b>Name</b></td>		
    <td><b>Moblie</b></td>
    <td><b>Email</b></td>
    <td><b>DateofBirth</b></td>
    <td><b>Gender</b></td>
    <td><b>Experienced</b></td>
    <td><b>Job Code</b></td>
    <td><b>Edit/delete</b></td>
  </tr>
  <form method = "post">
   <?php
              
                 require 'db_connection.php';
               $i=1;

               $sql = mysql_query("SELECT * FROM  candidate_profile ");
              while( $row = mysql_fetch_assoc($sql))
              {
                
                echo "<td><b><font color='#000066'>".$i."</font></b></td>";
                echo "<td><b><font color='#000066'>".$row['name']."</font></b></td>";
                echo"<td><b><font color='#000066'>".$row['mobile_no']."</font></b></td>";
                echo"<td><b><font color='#000066'>".$row['email']."</font></b></td>";
                echo"<td><b><font color='#000066'>".$row['dob']."</font></b></td>";
                 if ($row['gender']=='0') {
                     echo"<td><b><font color='#000066'>others</font></b></td>";
                   }
                   elseif ($row['gender']=='1') {
                     echo"<td><b><font color='#000066'>Male</font></b></td>";
                   }
                    
                   else{
                     echo"<td><b><font color='#000066'>Female</font></b></td>";;
                   }
                   if ($row['experienced']=='0')
                   {
                     echo"<td><b><font color='#000066'>Yes</font></b></td>";
                   }
                   else
                   {
                     echo"<td><b><font color='#000066'>No</font></b></td>";
                   }
                   
                    $a=$row['job_code_master_id'];
                    $res=mysql_query("SELECT * FROM  job_code_master WHERE job_code_master_id=".$a );
                    $row1=mysql_fetch_assoc($res);

                echo"<td><b><font color='#000066'>".$row1['job_code']."</font></b></td>";
                
                $b=$row['candidate_profile_id'];
                echo "<td>&nbsp;<button type='submit' style='width:43px;height: 28px;font-size: 15px;background-color: #b3e5ff;' name='edit' value='".$b."'' >Edit</button>";
                echo "&nbsp;&nbsp;<button type='submit' style='width:59px;height: 28px;font-size: 15px;background-color: #b3e5ff;' name='delete' value='".$b."'>Delete</button></td>";
                  
                  echo"</tr>";
                 $i++;
              }
                   if(isset($_POST['delete']))
                   {
                     
                    $sql2 =  "DELETE FROM candidate_profile WHERE candidate_profile_id =".$_POST['delete'];
                    if(mysql_query($sql2))
                    {
                      echo "<script>alert('Deleted Successfully');</script>";
                      echo "<script>window.location='';</script>";
                    }
                   }
                   

                       if(isset($_POST['edit']))
                       {
               
                        
                          $res1=mysql_query("SELECT * FROM  candidate_profile WHERE candidate_profile_id=".$_POST['edit'] );
                 

                           while ($row1= mysql_fetch_assoc($res1))
                       {
                            
                           $nm=$row1['name'];

                           $mb=$row1['mobile_no'];
                           $em=$row1['email'];
                           $db=$row1['dob'];
                           echo"</table><center><table border='1px' style='width:30%; border-collapse: collapse;background-color:#F0F0F0;'>
                                   <td style='text-align:center; text-decoration: underline; color:red; background-color:#99ff33;'><b>EDIT DATA</b></td>
                          
                            <tr><td><br><b>Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type='text' name='editnm'  value='".$nm." '></td>  </tr>  
                            <tr><td ><br><b>Mobile No.:&nbsp;&nbsp; </b><input type='text' name='editmb'  value='".$mb." '></td></tr>  
                            <tr><td><br><b>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><input type='text' name='editem'  value='".$em." '></td></tr>  
                            <tr><td><br><b>DateOfBirth:&nbsp;</b><input type='text' name='editdb'  value='".$db."'> </td></tr>  
                            <tr><td colspan='2' style='padding-left:150px;'><button name='sumbmiteditdata' value='".$_POST['edit']."' type='submit'>Ok</button></td><tr>
                               </table></center>";
                      
                          
                        }        
                       
                      
                       
                       }
                       
                       if(isset($_POST['sumbmiteditdata']))
                       {
                           $a=$_POST['editnm'];
                           $b=$_POST['editmb'];
                           $c=$_POST['editem'];
                           $d=$_POST['editdb'];
                           $sql1=" UPDATE  `candidate_profile` SET `name`= '$a' , `mobile_no`= '$b' , `email`= '$c' , `dob`= '$d' WHERE `candidate_profile_id`=".$_POST['sumbmiteditdata'];
                       if(mysql_query($sql1))
                       {
                  
                           echo "<script>alert('Successfully Edited...');</script>";
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

