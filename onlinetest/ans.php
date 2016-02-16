


<html>
<body>
   <?php include 'inc/home1.php' ?>

   <button type="submit" name="logout" style="float:right;"><a href="logout.php">Log Out </a></button>
 <form method="post">
 <?php
 session_start();
 $p=$_REQUEST["id"];
 $p1= $_SESSION["idd1"];
 $p2= $_SESSION["idd2"];
 $k=$_SESSION["num"];
 $o=$_SESSION["sco"];
 $h=$_SESSION["idd"];
 echo $o;
 
 require 'db_connection.php';
 $sql8 = mysql_query("SELECT * FROM question_bank WHERE question_master_id=" .$p1 );
                           while($row8 = mysql_fetch_assoc($sql8))
                           {
                           ${'file' . $z}=$row8['question_bank_id'];$z++;
                           }

                           $pn= ${'file' . $p};
 $sql = mysql_query("SELECT * FROM question_bank WHERE question_bank_id=" .$pn." AND question_master_id=".$p1);
                           $p0=$p+1;
                         if($row1 = mysql_fetch_assoc($sql))
                         {
                            
                           echo "<div style='border:2px solid darkblue; margin-top:130px; margin-left:120px; margin-right:120px; background-color: white;' >";
                           echo "<table  >";
                           
                          
                           echo "<tr><td >".$row1['description']."</td></tr>";
                                   
                           echo "<tr><td>Q".$p0.")" .$row1['question_name']. "</td></tr>";
                           
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
                           
                           $p++;?>

                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <?php
                           echo  "<button name='nex'><a href='ans.php?id=$p'>Next</a></button></td>";
                           //echo "<button type='submit' name='next' style='float:right;'>Next</button></td>";
                           echo "</center>";
                          $i++;
                          $s=0;
                          if(isset($_POST['sub'])) 
                          {
                            
                            $sql3=mysql_query("SELECT * FROM candidate_job_info WHERE candidate_login_id=" .$k);
                            $row3 = mysql_fetch_assoc($sql3);
                            $us= $row3['candidate_profile_id'];
                            $y = $row3['question_master_id'];
                            //$sql4=mysql_query("SELECT * FROM question_bank WHERE question_master_id=" .$y." AND question_bank_id=");
                           // $row4 = mysql_fetch_assoc($sql4);
                            //$z= $row4['question_bank_id'];
                            $an = $_POST['ans'];
                            
                             $sql0= mysql_query("SELECT * FROM candidate_answer WHERE question_bank_id=" .$pn);
                            if(mysql_fetch_assoc($sql0))
                            {
                               mysql_query(" UPDATE `MydB`.`candidate_answer` SET candidate_answer =".$an." WHERE question_bank_id=" .$pn );

                                $sql10=mysql_query("SELECT * FROM candidate_answer WHERE question_bank_id=" .$pn);
                            
                         // while($row10 = mysql_fetch_assoc($sql10))
                          //{
                             $row10 = mysql_fetch_assoc($sql10);
                            //$a= $row5['question_bank_id'];
                            $c1= $row10['candidate_answer'];
                             //}
                            $sql11= mysql_query("SELECT * FROM question_bank WHERE WHERE candidate_profile_id=" .$k. " AND question_bank_id=" .$pn);
                            //while($row6 = mysql_fetch_assoc($sql6))
                            $row11 = mysql_fetch_assoc($sql11);
                            
                              $d1= $row11['correct_answer'];
                              if($d1 == $c1)
                              {
                                
                                $t1 = ++$_SESSION["sco"];
                                

                       // ${'file' . $i}=$row['name'];$i++;
                                
                              mysql_query(" UPDATE `MydB`.`candidate_job_info` SET score =".$t1." WHERE candidate_login_id=" .$k );
                            }
                            }
                             else{
                           
                          mysql_query(" INSERT INTO `MydB`.`candidate_answer` (`candidate_answer_id`, `candidate_profile_id`, `question_bank_id` , `candidate_answer` ) VALUES ('', '$us' , '$pn' , '$an' ) ");
                           }
                         
                          $sql5=mysql_query("SELECT * FROM candidate_answer WHERE question_bank_id=" .$pn);
                            
                          while($row5 = mysql_fetch_assoc($sql5))
                          {
                             
                            //$a= $row5['question_bank_id'];
                            $c= $row5['candidate_answer'];
                             }
                            $sql6= mysql_query("SELECT * FROM question_bank WHERE question_bank_id=" .$pn);
                            //while($row6 = mysql_fetch_assoc($sql6))
                            $row6 = mysql_fetch_assoc($sql6);
                            
                              $d = $row6['correct_answer'];
                              if($d == $c)
                              {
                                $_SESSION["sco"]++;
                                $t = $_SESSION["sco"];
                                

                       // ${'file' . $i}=$row['name'];$i++;
                                
                              mysql_query(" UPDATE `MydB`.`candidate_job_info` SET score =".$t." WHERE candidate_login_id=" .$k );
                      
                   }
                        echo "<style>#sub{display:none;}</style>";
                   }
                       $_SESSION["idd"]++;
                        



                       }
                      else{
                        echo "<center><p style='padding-top:200px;'><font color='red' size='20'><b>Test Over</b></font></p></center>";
                       }
                          


                         
        ?>

      </form>
    </div>
    </body>
    </html>
                           
                                    
                            

                            
