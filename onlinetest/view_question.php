<html>
<body>
   <?php include 'tl_page.php' ?>

<button style="float:right;"><a href ="question_master_list.php">Go back</a></button>
 <form method="post">
    <?php
 session_start();
 $a=$_REQUEST['id'];
 
 

    require 'db_connection.php';
  $l=1;
 $sql = mysql_query("SELECT * FROM question_bank WHERE question_master_id=" .$a);
 while($row1 = mysql_fetch_assoc($sql))
 { 
                                  $x =$row1['question_bank_id'];

                                   echo "<div style='border:2px solid darkblue; margin-top:130px;background-color: white;  margin:40 20 20 50;' >";
                                   
                                   echo  $l; echo ")";
                                   echo "&nbsp";
                                   echo "&nbsp";
                                   echo "<b>".$row1['description']."</b>";
                                   echo"<br>";
                                   echo"<br>";
                                   echo "Q)";
                                   echo "<b>&nbsp;". $row1['question_name']."</b>";
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left; padding-left:20px;'>Option1:</b>&nbsp;&nbsp;&nbsp;".$row1['option1'];
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left;padding-left:20px;'>Option2:</b>&nbsp;&nbsp;&nbsp;".$row1['option2'];
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left;padding-left:20px;'>Option3:</b>&nbsp;&nbsp;&nbsp;".$row1['option3'];
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left;padding-left:20px;'>Option4:</b>&nbsp;&nbsp;&nbsp;".$row1['option4'];
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left;padding-left:20px;'>Correct Option:</b>&nbsp;&nbsp;&nbsp;".$row1['correct_answer'];
                                   echo"<br>";
                                   echo"<br>";
                               
                                   
                                   echo "</td><center><button type='submit' name='delete' value='".$x."'>Delete</button></center></td>";
                                   echo"</div>";
                                   $l++;
                                   
 }
 ?>
</form>
<form method = "post">
  <?php
  require 'db_connection.php';
  if(isset($_POST['delete']))
                   {
                     
                    $sql1 =  "DELETE FROM question_bank WHERE question_bank_id =".$_POST['delete'];
                    if(mysql_query($sql1))
                    {
                      echo "<script>alert('Deleted Successfully');</script>";
                      echo "<script>window.location='';</script>";
                    }
                   }
  ?>
</form>

</body>
</html>