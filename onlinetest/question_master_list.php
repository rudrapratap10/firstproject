<?php
session_start();
if($_SESSION['tl'] == session_id())
{?>


<!DOCTYPE html>
<html>
<head>
  <style>
  #margin{
    margin-top: 60px;
    background-color: #ffffe5;
    opacity:0.9;
  }
  </style>
</head>
<?php include 'tl_page.php' ?>
<table id="margin" border="1px" style="width:100%; height:500px;">
  <tr  valign="top"><td>
<table border= "1px" style="width:100%">
  	<h1><font color='#4d1300'>Question Master List</font></h1>
  	<button name="subject" type="submit" style="float:right;"><a href ="question_master.php" ><font  size="5" style="font-family:Arial;">Add</font></a></button>
  <tr>
    <td><b>Sl No.</b></td>
    <td><b>Paper Type</b></td>		
    <td><b>Paper Name</b></td>
    <td><b>Paper For</b></td>
    <td><b>Add Question</b></td>
    <td><b>View</b></td>
    <td><b>Edit/delete</b></td>
  </tr>
  <form method = "post">
   <?php
              
                 require 'db_connection.php';
               $i=1;

               $sql = mysql_query("SELECT * FROM  question_master ");
              while( $row = mysql_fetch_assoc($sql))
              {
                $b=$row['paper_subject_id'];
                 $sql1 = mysql_query("SELECT * FROM  paper_subject WHERE paper_subject_id=".$b);
                $row1 = mysql_fetch_assoc($sql1);
                  
                echo "<td><b><font color='#000066'>".$i."</font></b></td>";
                echo "<td><b><font color='#000066'>".$row1['paper_type']."</font></b></td>";
                echo"<td><b><font color='#000066'>".$row['paper_name']."</font></b></td>";
                
                if ($row['paper_for']=='0')
                   {
                     echo"<td><b><font color='#000066'>Experience</font></b></td>";
                   }
                   else
                   {
                     echo"<td><b><font color='#000066'>Fresher</font></b></td>";
                   }
                //echo"<td>".$row['paper_for']."</td>";
                echo "<td><button type='submit' name='addques'><a href ='question_bank.php'>Add Question</a></button></td>";
                $p=$row['question_master_id'];
                
                
            
                echo "<td><button type='submit' name='viewques'  ><a href ='view_question.php?id=$p'> View Question</a></button></td>";
                $b=$row['question_master_id'];
                $_SESSION['qmi'] = $b;
                echo "<td>&nbsp;<button type='submit' style='width:43px;height: 28px;font-size: 15px;background-color: #b3e5ff;'  name='edit' value='".$b."' >Edit</button>";
                echo "&nbsp;&nbsp;<button type='submit' name='delete' style='width:59px;height: 28px;font-size: 15px;background-color: #b3e5ff;' value='".$b."'>Delete</button></td>";
                  
                  echo"</tr>";
                 $i++;
              }
                   if(isset($_POST['delete']))
                   {
                     
                    $sql1 =  "DELETE FROM question_master WHERE question_master_id =".$_POST['delete'];
                    if(mysql_query($sql1))
                    {
                      echo "<script>alert('Deleted Successfully');</script>";
                      echo "<script>window.location='';</script>";
                    }
                   }
                   

                       if(isset($_POST['edit']))
                       {
               
                  
                           $res1=mysql_query("SELECT * FROM question_master WHERE `question_master_id`=".$_POST['edit']);
                           while($row1= mysql_fetch_assoc($res1))
                       {
                
                           $jobcd=$row1['paper_type'];
                           $jobdes=$row1['paper_name'];
                           $cre=$row1['paper_for'];
                           echo"</table><center><table border='1px' style='width:30%;border-collapse: collapse;background-color:#F0F0F0;'>
                                   <td style='text-align:center; text-decoration: underline; color:red; background-color:#99ff33;'><b>EDIT DATA</b></td>
                          
                            <tr><td><br><b>Paper Name: &nbsp;</b><textarea type='text' name='editjbdes'   rows='4' cols='20'>".$jobdes."</textarea></td>  </tr>  
                            <tr><td><br><b>Paper For: </b><input type='radio' name='editpaper' value='1' checked='checked'>Fresher<input type='radio' name='editpaper' value='0' > Experience </td></tr>  
                            
                            <tr><td colspan='2' style='padding-left:150px;'><button name='sumbmiteditdata' value='".$_POST['edit']."' type='submit'>Ok</button></td><tr>
                               </table></center>";

                          
                                
                       
                       if(isset($_POST['submiteditdata']))
                       {
                     
                           $sql1 =mysql_query( "UPDATE question_master  SET  paper_name='$jobdes' paper_for='$cre'  where question_master_id=".$_POST['edit']);
                       }
                       }
                       }
                       if(isset($_POST['sumbmiteditdata']))
                       {
                           $a=$_POST['editjbcd'];
                           $b=$_POST['editjbdes'];
                           $c=$_POST['editpaper'];
                           $sql1=" UPDATE  `question_master` SET  `paper_name`= '$b' , `paper_for`= '$c' WHERE `question_master_id`=".$_POST['sumbmiteditdata'];
                       if(mysql_query($sql1))
                       {
                  
                           echo "<script>alert('Successfully Edited...');</script>";
                           echo "<script>window.location='';</script>";
                       }
                       }

                     if(isset($_POST['viewques']))
                       { 
                     
                           // header('Location: view_question.php');
                             $l=1;
                           $sql5 = mysql_query("SELECT * FROM  question_bank WHERE question_master_id =".$_POST['viewques']);
                              while($r= mysql_fetch_assoc($sql5))
                              {
                               
                                   echo  $l; echo ")";
                                   echo "&nbsp";
                                   echo "&nbsp";
                                   echo $r['description'];
                                   echo"<br>";
                                   echo $r['question_name'];
                                   echo"<br>";
                                   echo $r['option1'];
                                   echo"<br>";
                                   echo $r['option2'];
                                   echo"<br>";
                                   echo $r['option3'];
                                   echo"<br>";
                                   echo $r['option4'];
                                   echo"<br>";
                                   echo $r['correct_answer'];
                                   echo"<br>";
                                   $l++;
                                   

                              }

                             
                             
                       }
                       /*$query = mysql_query("SELECT * FROM question_bank ");
                        $results = mysqli_query($query);

                        echo '<table border="1">';
                            echo '<tr>';
                                echo '<th>Paper Name</th>';
                                echo '<th>Question Description</th>';
                                echo '<th>Question Name</th>';
                                echo '<th>Option1</th>';
                                echo '<th>Option2</th>';
                                echo '<th>Option3</th>';
                                echo '<th>Option4</th>';
                                echo '<th>Correct Answer</th>';
                            echo '</tr>';


                            while($orderData = mysql_fetch_array($results)){
                                echo '<form action="view_question.php" method="POST">';
                                echo '<tr>';
                                    $_SESSION['question_bank_id']=$orderData['question_bank_id'];
                                    echo '<td>'.$orderData['question_bank_id'].'</td>';

                                     $_SESSION['description']=$orderData['description'];
                                    echo '<td>'.$orderData['description'].'</td>';

                                      $_SESSION['question_name']=$orderData['question_name'];
                                    echo '<td>'.$orderData['question_name'].'</td>';

                                      $_SESSION['option1']=$orderData['option1'];
                                    echo '<td>'.$orderData['option1'].'</td>';

                                      $_SESSION['option2']=$orderData['option2'];
                                    echo '<td>'.$orderData['option2'].'</td>';

                                      $_SESSION['option3']=$orderData['option3'];
                                    echo '<td>'.$orderData['option3'].'</td>';

                                       $_SESSION['option4']=$orderData['option4'];
                                    echo '<td>'.$orderData['option4'].'</td>';

                                      $_SESSION['correct_answer']=$orderData['correct_answer'];
                                    echo '<td>'.$orderData['correct_answer'].'</td>';

                                    echo '<td><input type="hidden" name="hidden" value="'.$orderData['question_bank_id'].'"></td>';
                                    echo '<td><input type="submit" name="delete" value="Delete"></td>';
                                    echo '<td><input type="submit" name="view" value="View Order"></td>';
                                echo '</tr>';
                                echo '</form>';
                            }


                        echo '</table>';*/
                            

                   ?>
  
</table>
</td></tr>
</table>

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

