<html>
<body>
   <?php include 'hm.php' ?>
   
   
 <form method="post">
 <?php
 session_start();
 
 $g=$_REQUEST["id"];
 $p=$_SESSION["num"];
 $t=$_SESSION['time'];
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
     $q=1;
    
     
 $sql8 = mysql_query("SELECT * FROM question_bank WHERE question_master_id=".$v );
                           while($row8 = mysql_fetch_assoc($sql8))
                           {
                           ${'file' . $z}=$row8['question_bank_id'];$z++;
                           }
                            //$p0=$g;

                           //$pn= ${'file' . $g};
                           $o = $z-1;

            $f=1;
            for($u=1;$u<=$o;$u++)
            {          
                          $r=${'file' . $u};    
                          $sql9 = mysql_query("SELECT * FROM question_bank WHERE question_bank_id= ".$r." AND question_master_id=".$v);
                           $row9 = mysql_fetch_assoc($sql9);
                           ${'file' . $d}=$row9['description'];++$d;
                           ${'file' . $d}=$row9['question_name'];++$d;
                           ${'file' . $d}=$row9['option1'];++$d;
                           ${'file' . $d}=$row9['option2'];++$d;
                           ${'file' . $d}=$row9['option3'];++$d;
                           ${'file' . $d}=$row9['option4'];++$d;

                           $f++;
                           
                        

            }

                           echo ${'file' . 1};
                  
                           

                           //$g++;
            $p0=1;
                           
                           echo "<div  style='border:2px solid darkblue; margin-top:60px; margin-left:120px; margin-right:120px; background-color: white;' >";
                           echo "<table id='demo' >";
                           
                          
                           echo "<tr><td >".${'file' . $f}."</td></tr>";
                                   
                           echo "<tr><td>Q".$p0.")" .${'file' . $f}. "</td></tr>";
                           
                           echo "<tr><td><input type='radio' name='ans' value='1'>" .${'file' . $f}. "</td>";
                           
                           echo "<td><input type='radio' name='ans' value='2'>" .${'file' . $f}. "</td></tr>";
                           
                           echo "<tr><td><input type='radio' name='ans' value='3'>" .${'file' . $f}. "</td>";
                     
                           echo "<td><input type='radio' name='ans' value='4'>" .${'file' . $f}[5]. "</td></tr>";
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
                           echo  "<button name='nex' onclick='next()'>Next</button></td>";}
                           //echo "<button type='submit' name='next' style='float:right;'>Next</button></td>";
                           if($q>=1)
                           {
                           echo  "<button name='pre' onclick='prev()' style='float:right;'>Previous</button></td>";
                            }
                            else
                            {
                              echo  "<button name='pre' style='float:right;'><a href='practise.php?id=$g'>Previous</a></button></td>";
                            }
                           echo "</center>";
                          $i++;
                       
                          ?>
                          <script>
                              function next() {
                             
                                  document.getElementById("demo").innerHTML =<?php $f++;$p0++; ?>
                              }
                              </script>


    </body>
    </html>
                           
                                    
                            

                            
