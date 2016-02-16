<html>
<body>
   <?php include 'inc/home1.php' ?>


   <button type="submit" name="logout" style="float:right;"><a href="logout.php">Log Out </a></button>
 <form method="post">
 <?php
 session_start();
 $p=$_SESSION["num"];
 
 
 require 'db_connection.php';
 
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
                           echo "<div style='border:2px solid darkblue;margin-top:130px; margin-left:120px; margin-right:120px; background-color: white;' >";
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
                           echo "<button name='nex'><a href='ans.php?id=$g'>Next</a></button></td>";
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

                                $sql9=mysql_query("SELECT * FROM candidate_answer WHERE candidate_profile_id=" .$p. " AND question_bank_id=".$z);
                            
                                  //while($row9 = mysql_fetch_assoc($sql9))
                                  //{
                                     
                                   // $a1= $row9['question_bank_id'];
                                    $c1= $row9['candidate_answer'];
                                     //}
                                    $sql10= mysql_query("SELECT * FROM question_bank WHERE question_bank_id=" .$z);
                                    //while($row6 = mysql_fetch_assoc($sql6))
                                    $row10 = mysql_fetch_assoc($sql10);
                                    
                                      $d = $row10['correct_answer'];
                                      if($d1 == $c1)
                                      {
                                       $s1= ++$_SESSION["sco"];

                                        
                                        
                                        
                                      mysql_query(" UPDATE `MydB`.`candidate_job_info` SET score =".$s1." WHERE candidate_login_id=" .$p );
                                       }
                                         $sql11= mysql_query("SELECT * FROM candidate_job_info WHERE candidate_login_id=" .$p);
                                         $row11 = mysql_fetch_assoc($sql11);
                                         $f1 = $row7['score'];
                                          $_SESSION["sco"]= $s1;




                                    }
                             else
                             {
                           
                          mysql_query(" INSERT INTO `MydB`.`candidate_answer` (`candidate_answer_id`, `candidate_profile_id`, `question_bank_id` , `candidate_answer` ) VALUES ('', '$us' , '$z' , '$an' ) ");
                           
                         }
                          $sql5=mysql_query("SELECT * FROM candidate_answer WHERE candidate_profile_id=" .$p. " AND question_bank_id=".$z);
                            
                          //while($row5 = mysql_fetch_assoc($sql5))
                          //{
                             $row5 = mysql_fetch_assoc($sql5);
                            //$a= $row5['question_bank_id'];
                            $c= $row5['candidate_answer'];
                             //}
                            $sql6= mysql_query("SELECT * FROM question_bank WHERE question_bank_id=" .$z);
                            //while($row6 = mysql_fetch_assoc($sql6))
                            $row6 = mysql_fetch_assoc($sql6);
                            
                              $d = $row6['correct_answer'];
                              if($d == $c)
                              {
                                $s++;

                                
                                
                                
                              mysql_query(" UPDATE `MydB`.`candidate_job_info` SET score =".$s." WHERE candidate_login_id=" .$p );
                               }
                                 $sql7= mysql_query("SELECT * FROM candidate_job_info WHERE candidate_login_id=" .$p);
                                 $row7 = mysql_fetch_assoc($sql7);
                                 $f = $row7['score'];
                                  $_SESSION["sco"]= $s;

                              

                              
                            echo "<style>#sub{display:none;}</style>";
                              
                            
                             }
                               
                               $_SESSION["idd"]++;
                              $_SESSION["idd2"]++;

                            

}
                          


                         
        ?>

      </form>
    </div>
   
    </body>
    </html>
                           
                                    
                            

                            
