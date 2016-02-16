<html>
<body>
   <?php include 'hm.php' ?>
   
   
 <form method="post">
 <?php
 session_start();
 $p=$_SESSION["num"];
 $t=$_SESSION['time'];
 require 'db_connection.php';
    
      $sq5 = mysql_query("SELECT * FROM candidate_job_info WHERE candidate_login_id=" .$p);
           $ro5 =  mysql_fetch_assoc($sq5);
  
            $j = $ro5['candidate_profile_id'];
     $sq6 = mysql_query("SELECT * FROM candidate_profile WHERE  candidate_profile_id=".$j);
     $ro6 =  mysql_fetch_assoc($sq6);
     $y = $ro6['name'];

     $s= $ro6['job_code_master_id'];
     $sq7 = mysql_query("SELECT * FROM job_code_master WHERE job_code_master_id=" .$s);
     $ro7 = mysql_fetch_assoc($sq7);
     $jc = $ro7['job_code'];
 echo "<div style='border:2px solid black; width:1180px;background-color: #f0f4f4; display:inline-block; margin:0 20 10 50;'>";
 
        include 'timer_ex.php' ;

 echo "<b style='color:red;float:right;'>End Time:".$t."</b>";
  
$n=0;
 //$t6 = $_SESSION["end"];
 //echo $t6;
 

     

                          
                           echo "<b style='float:left; padding-left:30px;padding-top:1px;'>Candidate Login Id:&nbsp;&nbsp;$p</b> ";
                           echo "<br>";
                           echo "<br>";
                           echo "<b style='float:left; padding-left:30px;padding-top:1px;'>Candidate Name:&nbsp;$y</b>";
                           echo "<br>";
                           echo "<br>";
                           echo "<b style='float:left; padding-left:30px;padding-top:1px;'>Exam Paper:&nbsp;$jc</b>";
                           echo "<br>";
                           echo "<br>";
                           echo "<b style='float:left; padding-left:30px;padding-top:1px;'>Date:&nbsp;" .date('d/m/Y') ."</b>";
                           
                           echo"</div>"; 
                                  


 $sq2 = mysql_query("SELECT * FROM candidate_job_info WHERE candidate_login_id=" .$p);
 $row15 = mysql_fetch_array($sq2);
 $v=$row15['question_master_id'];

 
 $sql8 = mysql_query("SELECT * FROM question_bank WHERE question_master_id=" .$v );
                           while($row8 = mysql_fetch_assoc($sql8))
                           {
                           $n++;
                           }
 echo "<b style='color:blue;'>Current Question:<b>1/".$n;
 $sql = mysql_query("SELECT * FROM candidate_job_info WHERE candidate_login_id=" .$p);
                      $z=1;   
                         while($row = mysql_fetch_array($sql))
                           //$row = mysql_fetch_assoc($sql);

                         {
                         

                            $b=$row['question_master_id'];
                             
                            $sql1 = mysql_query("SELECT * FROM question_bank WHERE question_master_id=" .$b );
                            $i=1;
                          

                            //while($row1 = mysql_fetch_assoc($sql1))
                             $row1 = mysql_fetch_array($sql1);
                             $x= $row1['question_bank_id'];
                               $_SESSION["idd"]=$x;

                                $_SESSION["idd1"]= $b;
                                $_SESSION["idd2"]= $i;
                               
                          //echo $row1['option1'];
                           echo "<div style='border:2px solid darkblue;margin-top:130px; margin-left:120px; margin-right:120px;margin-top:60px; background-color: white;' >";
                           echo "<table  >";
                           
                          
                           echo "<tr><td >".$row1['description']."</td></tr>";
                                   
                           echo "<tr><td>Q".$i.")" .$row1['question_name']. "</td></tr>";
                           
                           echo "<tr><td><input type='radio' name='ans' value='1'>" .$row1['option1']. "</td>";
                           
                           echo "<td><input type='radio' name='ans' value='2'>" .$row1['option2']. "</td></tr>";
                           
                           echo "<tr><td><input type='radio' name='ans' value='3'>" .$row1['option3']. "</td>";
                     
                           echo "<td><input type='radio' name='ans' value='4'>" .$row1['option4']. "</td></tr>";
                           echo"<br>";
                           
                         
                           echo"</table>";
                           echo"</div>";
                           echo"<br>";
                           echo"<br>";
                           echo "<center>";
                           echo "<td style='padding-left:180px;'><button type='submit' id='sub' name='sub'>Submit</button>";
                           $g=1;?>

                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <?php
                           echo "<button name='nex'><a href='previous1.php?id=$g'>Next</a></button></td>";
                           //echo "<button type='submit' name='next' style='float:right;'>Next</button></td>";
                           echo "</center>";
                          
                          $s=0;
                          if(isset($_POST['sub'])) 
                          {
                            
                            $sql3=mysql_query("SELECT * FROM candidate_job_info WHERE candidate_login_id=" .$p);
                            $row3 = mysql_fetch_assoc($sql3);
                            $us= $row3['candidate_profile_id'];
                            $y = $row3['question_master_id'];
                            $sql4=mysql_query("SELECT * FROM question_bank WHERE question_master_id=" .$y);
                            $row4 = mysql_fetch_assoc($sql4);
                            $z= $row4['question_bank_id'];
                            $an = $_POST['ans'];


                              $sql0= mysql_query("SELECT * FROM candidate_answer WHERE question_bank_id=" .$z);
                            if(mysql_fetch_assoc($sql0))
                            {
                               mysql_query(" UPDATE `MydB`.`candidate_answer` SET candidate_answer =".$an." WHERE question_bank_id=" .$z );

                                
                               }         
                                      
                             else
                             {
                           
                          mysql_query(" INSERT INTO `MydB`.`candidate_answer` (`candidate_answer_id`, `candidate_profile_id`, `question_bank_id` , `candidate_answer` ) VALUES ('', '$us' , '$z' , '$an' ) ");
                           
                         }
                          
                                
                                
                             
                              
                            echo "<style>#sub{display:none;}</style>";
                              
                            
                             }
                               
                               $_SESSION["idd"]++;
                              $_SESSION["idd2"]++;

                            

}
    /*$t5 = now();
     if($t5 == $t6)
           {
            echo "<script>alert('Time Up..!!');</script>";
            echo "<script>window.location='http://localhost/online%20test/previous1.php?id=y';</script>";
           }*/
           




                         
        ?>

      </form>
    </div>
  
    </body>
    </html>