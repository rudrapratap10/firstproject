<html>
<body>
   <?php include 'hm.php' ?>
   
   
 <form method="post">
 <?php
 session_start();
 
 $g=$_REQUEST["id"];
 $p=$_SESSION["num"];
 $t=$_SESSION['time'];
 $t1=$_SESSION['time1'];
 
 require 'db_connection.php';
    $sq5 = mysql_query("SELECT * FROM candidate_job_info WHERE candidate_login_id=" .$p);
           $ro5 =  mysql_fetch_assoc($sq5);
            $v=$ro5['question_master_id'];
            $j = $ro5['candidate_profile_id'];
     $sq6 = mysql_query("SELECT * FROM candidate_profile WHERE  candidate_profile_id=".$j);
     $ro6 =  mysql_fetch_assoc($sq6);
     $y = $ro6['name'];

     $s= $ro6['job_code_master_id'];
     $sq7 = mysql_query("SELECT * FROM job_code_master WHERE job_code_master_id=" .$s);
     $ro7 = mysql_fetch_assoc($sq7);
     $jc = $ro7['job_code'];
     
     $z=1;
     
    
     
 $sql8 = mysql_query("SELECT * FROM question_bank WHERE question_master_id=".$v );
                           while($row8 = mysql_fetch_assoc($sql8))
                           {
                           ${'file' . $z}=$row8['question_bank_id'];$z++;
                           }
                            $p0=$g;

                           $pn= ${'file' . $g};
                           $to=$z-1;
                           
 $sql9 = mysql_query("SELECT * FROM question_bank WHERE question_bank_id= ".$pn." AND question_master_id=".$v);

                         if($row9 = mysql_fetch_assoc($sql9))
                         {

                          
                          echo "<div style='border:2px solid black; width:1180px;background-color: #f0f4f4; display:inline-block; margin:0 20 10 50;'>";
                            include '2d_clock.php';
                            //include 'timer_ex.php';
                            echo "<b style='color:red;float:right;'>End Time:".$t."</b>";
                           echo "<b style='float:left; padding-left:30px;'><font color='#000099'>Candidate Login Id:</font>&nbsp;&nbsp;$p </b>";
                           echo "<br>";
                           echo "<br>";
                           echo "<b style='float:left; padding-left:30px;'><font color='#000099'>Candidate Name:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$y</b>";
                           echo "<br>";
                           echo "<br>";
                           echo "<b style='float:left; padding-left:30px;'><font color='#000099'>Exam Paper:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$jc</b>";
                           echo "<br>";
                           echo "<br>";
                           echo "<b style='float:left; padding-left:30px;'><font color='#000099'>Date:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" .date('d/m/Y') ."</b>";
                           
                           echo"</div>";
                           echo "<b style='color:blue;'>Current Question:<b>".$p0."/".$to;
                           echo "<div style='border:2px solid darkblue; margin-top:40px; margin-left:50px; margin-right:50px; background-color: white;' >";
                           echo "<table  >";
                           
                          
                           echo "<tr><td >".$row9['description']."</td></tr>";
                                   
                           echo "<tr><td>Q".$p0.")" .$row9['question_name']. "</td></tr>";
                           
                           echo "<tr><td><input type='radio' name='ans' value='1'>" .$row9['option1']. "</td>";
                           
                           echo "<td><input type='radio' name='ans' value='2'>" .$row9['option2']. "</td></tr>";
                           
                           echo "<tr><td><input type='radio' name='ans' value='3'>" .$row9['option3']. "</td>";
                     
                           echo "<td><input type='radio' name='ans' value='4'>" .$row9['option4']. "</td></tr>";
                           echo"<br>";
                           
                           echo"</table>";
                           echo"</div>";
                           echo"<br>";
                           echo"<br>";
                           echo "<center>";
                           echo "<td style='padding-left:180px;'><button type='submit' id='sub' name='sub'>Submit</button>";
                           
                           $g++;
                           $q=$g-2;
                           ?>
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <?php
                           if($g==$z){
                             echo  "<button name='nex'><a href='practise.php?id=$g'>Finish</a></button></td>";
                           }
                            else{
                           echo  "<button name='nex'><a href='practise.php?id=$g'>Next</a></button></td>";}
                           //echo "<button type='submit' name='next' style='float:right;'>Next</button></td>";
                           if($q>=1)
                           {
                           echo  "<button name='pre' style='float:right;'><a href='practise.php?id=$q'>Previous</a></button></td>";
                            }
                            
                           echo "</center>";
                          $i++;
                          if(isset($_POST['sub'])) 
                          {
                            
                            $sql3=mysql_query("SELECT * FROM candidate_job_info WHERE candidate_login_id=" .$p);
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

                            }
                             else{
                           
                          mysql_query(" INSERT INTO `MydB`.`candidate_answer` (`candidate_answer_id`, `candidate_profile_id`, `question_bank_id` , `candidate_answer` ) VALUES ('', '$us' , '$pn' , '$an' ) ");
                           }
                        echo "<style>#sub{display:none;}</style>";
                   }
                     $t2=time();
                     if($t2 >= $t1)
                      {
                        echo "<script>alert('times up..!!');</script>";
                        echo "<script>window.location='practise.php?id=100000';</script>";
                      }   
                        }
                        else{
                        echo "<center><p style='padding-top:100px;'><font color='red' size='15'><b>Test Over!!</b></font></p>
                              <p style='padding-top:30px;'><font color='black' size='15'><b>Click OK For Final Submit  
                               And Logout</b></font></p>
                              <button type='submit' name='ok' style='font-size:30px;'>OK</button>
                              </center>";

                              if(isset($_POST['ok']))
                              {
                             
                            $sql12=mysql_query("SELECT * FROM candidate_job_info WHERE candidate_login_id= ".$p);
                            $row12=mysql_fetch_assoc($sql12);
                            $e = $row12['candidate_profile_id'];

                        $sql5=mysql_query("SELECT * FROM candidate_answer WHERE candidate_profile_id= ".$e);
                            $t=0;
                          while($row5 = mysql_fetch_assoc($sql5))
                          {
                             
                            $a= $row5['question_bank_id'];
                            $c= $row5['candidate_answer'];
                             
                            $sql6= mysql_query("SELECT * FROM question_bank WHERE  question_bank_id=" .$a);
                            //while($row6 = mysql_fetch_assoc($sql6))
                            $row6 = mysql_fetch_assoc($sql6);
                            //{
                              $d = $row6['correct_answer'];
                              if($d == $c)
                              {
                                
                                $t++; 
                               } 
                              
                       // ${'file' . $i}=$row['name'];$i++;
                               }
                   
                       
                              mysql_query(" UPDATE `MydB`.`candidate_job_info` SET score =".$t." WHERE candidate_login_id=" .$p );
                                echo "<script>alert('Sucessfully Logged Out...');</script>";
                                echo "<script>window.location='page.php';</script>";
                              }
                              mysql_query(" UPDATE `MydB`.`candidate_job_info` SET test_end_date_time =now() WHERE candidate_login_id=" .$p );
                              
                      
                        }

                       
                      
                        
                      
                        
                      


                   
                          ?>
                        

    </body>
    </html>
                           
                                    
                            

                            
