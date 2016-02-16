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
                           
                            }
                           
                           

                           ?>
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <button type="submit" name="next" onclick="next()">next</button>
                            
                           <script>
                           function next()
                           {
                            <?php $g++; ?>
                           }
                           </script>
                         


       </form>            
                          
                        

    </body>
    </html>
                  