<?php
session_start();
if($_SESSION['tl'] == session_id())
{?>



<html>
<body>
   <?php include 'tl_page.php' ?>

 <form method="post">
   <button type="submit" name="back" style="float:right;"><a href="test_result.php">Go Back </a></button>
 <?php
 session_start();
 $p=$_SESSION["num"];
  
 
 require 'db_connection.php';
 // $sql = mysql_query("SELECT * FROM job_code_master WHERE job_code=" .$p);
  //$row =  mysql_fetch_assoc($sql);
  
  //$h = $row['job_code_master_id'];

  $sql1 = mysql_query("SELECT * FROM candidate_job_info WHERE job_code_master_id=" .$p);
  while($row1 =  mysql_fetch_assoc($sql1))
  {
    $j = $row1['candidate_profile_id'];
    $sql3 = mysql_query("SELECT * FROM job_code_master WHERE job_code_master_id=" .$p);
     $row3 = mysql_fetch_assoc($sql3);
     $jc = $row3['job_code'];
   $sql2 = mysql_query("SELECT * FROM candidate_profile WHERE job_code_master_id=" .$p." AND candidate_profile_id=".$j);
   $row2 =  mysql_fetch_assoc($sql2);
   $n = $row2['name'];
   if ($row2['experienced']=='0')
                   {
                     $e="YES";
                   }
                   else
                   {
                     $e="NO";
                   }
                   
   
   $d = $row1['candidate_login_id'];
   $s = $row1['score'];

   echo "<div style='border:2px solid darkblue; width:500px; margin-top:130px;background-color: #e5ffff; display:inline-block; margin:40 20 20 50;'>";
                           
                           echo "<b style='float:left; padding-left:30px; '><font color='#000099'>Candidate Login Id:</font>&nbsp;$d</b> ";
                           echo "<br>";
                           echo "<br>";
                           echo "<b style='float:left; padding-left:30px;'><font color='#000099'>Candidate Name:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$n</b>";
                           echo "<br>";
                           echo "<br>";
                           echo "<b style='float:left; padding-left:30px;'><font color='#000099'>Job Code:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$jc</b>";
                           echo "<br>";
                           echo "<br>";
                           echo "<b style='float:left; padding-left:30px;'><font color='#000099'>Experienced:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$e</b>";
                           echo "<br>";
                           echo "<br>";
                           echo "<b style='float:left; padding-left:30px;'><font color='#000099'>Score:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$s</b>";
                           echo "<br>";
                           echo "<br>";
                           echo"</div>";
                           
  }
                                   
?>
</form>
    </div>
   
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
                                
                        
 

   