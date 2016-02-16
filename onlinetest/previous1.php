
<html>
<body>
   <?php include 'hm.php' ?>
   
   
 <form method="post">
 <?php
 session_start();
 $p=$_REQUEST["id"];
 $p1= $_SESSION["idd1"];
 $p2= $_SESSION["idd2"];
 $k=$_SESSION["num"];
 $o=$_SESSION["sco"];
 $h=$_SESSION["idd"];
 $t=$_SESSION['time'];
 $ti=date('h:i:sa');
       
 
 require 'db_connection.php';
    $sq5 = mysql_query("SELECT * FROM candidate_job_info WHERE candidate_login_id=" .$k);
           $ro5 =  mysql_fetch_assoc($sq5);
  
            $j = $ro5['candidate_profile_id'];
     $sq6 = mysql_query("SELECT * FROM candidate_profile WHERE  candidate_profile_id=".$j);
     $ro6 =  mysql_fetch_assoc($sq6);
     $y = $ro6['name'];

     $s= $ro6['job_code_master_id'];
     $sq7 = mysql_query("SELECT * FROM job_code_master WHERE job_code_master_id=" .$s);
     $ro7 = mysql_fetch_assoc($sq7);
     $jc = $ro7['job_code'];

     

                          

 $sql8 = mysql_query("SELECT * FROM question_bank WHERE question_master_id=" .$p1 );
                           while($row8 = mysql_fetch_assoc($sql8))
                           {
                           ${'file' . $z}=$row8['question_bank_id'];$z++;
                           }
                            $p0=$p+1;

                           $pn= ${'file' . $p};
                           
 $sql = mysql_query("SELECT * FROM question_bank WHERE question_bank_id=" .$pn." AND question_master_id=".$p1);
                           
                         if($row1 = mysql_fetch_assoc($sql))
                         {
                          echo "<div style='border:2px solid black; width:1180px;background-color: #f0f4f4; display:inline-block; margin:0 20 10 50;'>";
                            include 'timer_ex.php';
                            echo "<b style='color:red;float:right;'>End Time:".$t."</b>";
                           echo "<b style='float:left; padding-left:30px;'>Candidate Login Id:&nbsp;&nbsp;$k </b>";
                           echo "<br>";
                           echo "<br>";
                           echo "<b style='float:left; padding-left:30px;'>Candidate Name:&nbsp;$y</b>";
                           echo "<br>";
                           echo "<br>";
                           echo "<b style='float:left; padding-left:30px;'>Exam Paper:&nbsp;$jc</b>";
                           echo "<br>";
                           echo "<br>";
                           echo "<b style='float:left; padding-left:30px;'>Date:&nbsp;" .date('d/m/Y') ."</b>";
                           
                           echo"</div>";
                                    
                          echo "<b style='color:blue;'>Current Question:<b>".$p0."/".$z;
                          //echo "<button type='submit' name='logout' style='float:right;'><a href='logout.php'>Log Out </a></button>";
                           echo "<div style='border:2px solid darkblue; margin-top:60px; margin-left:120px; margin-right:120px; background-color: white;' >";
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
                           
                           $p++;
                           $q=$p-2;
                           ?>

                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <?php
                           if($p==$z){
                             echo  "<button name='nex'><a href='previous1.php?id=$p'>Finish</a></button></td>";
                           }
                            else{
                           echo  "<button name='nex'><a href='previous1.php?id=$p'>Next</a></button></td>";}
                           //echo "<button type='submit' name='next' style='float:right;'>Next</button></td>";
                           if($q>=1)
                           {
                           echo  "<button name='pre' style='float:right;'><a href='previous1.php?id=$q'>Previous</a></button></td>";
                            }
                            else
                            {
                              echo  "<button name='pre' style='float:right;'><a href='previous.php?id=$q'>Previous</a></button></td>";
                            }
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

                               
                                

                       
                            }
                             else{
                           
                          mysql_query(" INSERT INTO `MydB`.`candidate_answer` (`candidate_answer_id`, `candidate_profile_id`, `question_bank_id` , `candidate_answer` ) VALUES ('', '$us' , '$pn' , '$an' ) ");
                           }
                         
                          
                   
                        echo "<style>#sub{display:none;}</style>";
                   }
                       $_SESSION["idd"]++;
                        



                       }
                      else{
                        echo "<center><p style='padding-top:100px;'><font color='red' size='15'><b>Test Over!!</b></font></p>
                              <p style='padding-top:30px;'><font color='black' size='15'><b>Click OK For Final Submit  
                               And Logout</b></font></p>
                              <button type='submit' name='ok' style='font-size:30px;'>OK</button>
                              </center>";

                              if(isset($_POST['ok']))
                              {
                             
                            $sql12=mysql_query("SELECT * FROM candidate_job_info WHERE candidate_login_id= ".$k);
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
                   
                       
                              mysql_query(" UPDATE `MydB`.`candidate_job_info` SET score =".$t." WHERE candidate_login_id=" .$k );
                                echo "<script>alert('Sucessfully Logged Out...');</script>";
                                echo "<script>window.location='page.php';</script>";
                              }
                              
                      
                        }


              if($ti == $t)
              {
                  echo "<center><p style='padding-top:100px;'><font color='red' size='15'><b>Test Over!!</b></font></p>
                              <p style='padding-top:30px;'><font color='black' size='15'><b>Click OK For Final Submit  
                               And Logout</b></font></p>
                              <button type='submit' name='ok' style='font-size:30px;'>OK</button>
                              </center>";


                              if(isset($_POST['ok']))
                              {
                             
                            $sql12=mysql_query("SELECT * FROM candidate_job_info WHERE candidate_login_id= ".$k);
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
                   
                       
                              mysql_query(" UPDATE `MydB`.`candidate_job_info` SET score =".$t." WHERE candidate_login_id=" .$k );
                                echo "<script>alert('Sucessfully Logged Out...');</script>";
                                echo "<script>window.location='page.php';</script>";
                              }
                              
              }  
                       
        ?>

      </form>
    </div>
      
    </body>
    </html>
                           
                                    
                            

                            
