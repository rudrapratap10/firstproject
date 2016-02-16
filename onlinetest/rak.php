<html>
<body>
<div >
<?php
require 'db_connection.php';
$a=$_REQUEST['id'];
$q=$_SESSION['qmi'];
$off= $_REQUEST['id2'];
      $res1 = mysql_query("SELECT * FROM question_bank where question_master_id= ".$a);
      $i=$off+1;
      $rn=mysql_num_rows($res1);
      $a=$rn/1;
      $a= ceil($a);
      if($off>0){
      $res = mysql_query("SELECT * FROM question_bank  where question_master_id=".$a."  limit 1 offset $off ");
      

      
      while($row= mysql_fetch_assoc($res))
               {  
                 
                 $x =$row['question_bank_id'];

                                   echo "<div style='border:2px solid darkblue; margin-top:130px;background-color: white;  margin:40 20 20 50;' >";
                                   
                                   echo  $l; echo ")";
                                   echo "&nbsp";
                                   echo "&nbsp";
                                   echo "<b>".$row['description']."</b>";
                                   echo"<br>";
                                   echo"<br>";
                                   echo "Q)";
                                   echo "<b>&nbsp;". $row['question_name']."</b>";
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left; padding-left:20px;'>Option1:</b>&nbsp;&nbsp;&nbsp;".$row['option1'];
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left;padding-left:20px;'>Option2:</b>&nbsp;&nbsp;&nbsp;".$row['option2'];
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left;padding-left:20px;'>Option3:</b>&nbsp;&nbsp;&nbsp;".$row['option3'];
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left;padding-left:20px;'>Option4:</b>&nbsp;&nbsp;&nbsp;".$row['option4'];
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left;padding-left:20px;'>Correct Option:</b>&nbsp;&nbsp;&nbsp;".$row['correct_answer'];
                                   echo"<br>";
                                   echo"<br>";
                               
                                   
                                   echo "</td><center><button type='submit' name='delete' value='".$x."'>Delete</button></center></td>";
                                   echo"</div>";
                                   $l++;
                                   

                    $off++; 
                     
               }
             }
             else {
      $res = mysql_query("SELECT * FROM question_bank  where question_master_id=".$a."  limit 1 offset 0 ");
      
      while($row= mysql_fetch_assoc($res))
               {  
                 
                $x =$row['question_bank_id'];

                                   echo "<div style='border:2px solid darkblue; margin-top:130px;background-color: white;  margin:40 20 20 50;' >";
                                   
                                   echo  $l; echo ")";
                                   echo "&nbsp";
                                   echo "&nbsp";
                                   echo "<b>".$row['description']."</b>";
                                   echo"<br>";
                                   echo"<br>";
                                   echo "Q)";
                                   echo "<b>&nbsp;". $row['question_name']."</b>";
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left; padding-left:20px;'>Option1:</b>&nbsp;&nbsp;&nbsp;".$row['option1'];
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left;padding-left:20px;'>Option2:</b>&nbsp;&nbsp;&nbsp;".$row['option2'];
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left;padding-left:20px;'>Option3:</b>&nbsp;&nbsp;&nbsp;".$row['option3'];
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left;padding-left:20px;'>Option4:</b>&nbsp;&nbsp;&nbsp;".$row['option4'];
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left;padding-left:20px;'>Correct Option:</b>&nbsp;&nbsp;&nbsp;".$row['correct_answer'];
                                   echo"<br>";
                                   echo"<br>";
                               
                                   
                                   echo "</td><center><button type='submit' name='delete' value='".$x."'>Delete</button></center></td>";
                                   echo"</div>";
                                   $l++;
                       
                    $off++; 
                     
               }
             }
             
               
    ?>
</table>
    <?php  
 echo "<ul>";
                    for($k=0;$k<$a;$k++){
                          $n=$k*1; 
                        echo"<li ><a href='rak.php?id2=$n'>".($k+1)."</a></li>";
                                          }
 echo"</ul>";

?>