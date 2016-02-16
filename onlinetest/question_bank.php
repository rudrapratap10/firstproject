<?php
session_start();
if($_SESSION['tl'] == session_id())
{?>


<!DOCTYPE HTML>
<html>
<head>
	<style>
		#office{
	       background-color: #00ffff;
         }
         </style>
     </head>
<body>
    <?php include 'tl_page.php' ?>
	<center>
     <h2 id = "office"><b>QUESTION BANK<b></h2>
     <form method = "post">
      <button style="float:right;"><a href ="question_master_list.php">Go back</a></button>
        <label for ="paper_name">Paper Name:</label>&nbsp;</b><select id="period_dropdown" name="paper_name" onchange="updateButton()">
        <option value="nill" disabled="disabled" selected="selected">select paper</option>
        <?php 
                    require 'db_connection.php';
                    $result = mysql_query("SELECT * FROM question_master");
                    while($row = mysql_fetch_assoc($result))
                      {
                        echo "<option value='".$row['question_master_id']."'>".$row['paper_name']."</option>";
                      }
                  ?>
        </select>
        <br><br>


        <label for ="description" style ="vertical-align:top;">Description:</label><textarea type="text" name="description" rows="4" cols="50"></textarea> 
        <br><br>
     	<label for ="question_name" style ="vertical-align:top;">Question:</label><textarea type="text" name="question_name" rows="4" cols="50"></textarea> 
        <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for ="option1" style ="vertical-align:top;">1:</label><textarea type="text" name="option1" rows="4" cols="50"></textarea> 
        <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for ="option2" style ="vertical-align:top;">2:</label><textarea type="text" name="option2" rows="4" cols="50"></textarea> 
        <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for ="option3" style ="vertical-align:top;">3:</label><textarea type="text" name="option3" rows="4" cols="50"></textarea> 
        <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for ="option4" style ="vertical-align:top;">4:</label><textarea type="text" name="option4" rows="4" cols="50"></textarea> 
        <br><br>
        <p><b>Correct Answer:</b><select id="period_dropdown" name="correct_answer" onchange="updateButton()">
        <option value="nill" disabled="disabled" selected="selected">select answer</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option></select></p>
        <br>
        
        <button name="add" type="submit">Add question</button>
        <?php
              
                 require 'db_connection.php';
                 if (isset($_POST['add'])) 
                  {
                    $pn = $_POST['paper_name'];
                    $des = $_POST['description'];
                    $qn = $_POST['question_name'];
                    $op1= $_POST['option1'];
                    $op2= $_POST['option2'];
                    $op3= $_POST['option3'];
                    $op4= $_POST['option4'];
                    $cor= $_POST['correct_answer']; 
                      
                    mysql_query(" INSERT INTO `MydB`.`question_bank` (`question_bank_id`, `question_master_id` , `description` , `question_name` , `option1` , `option2` , `option3` , `option4` , `correct_answer`) VALUES ('', '$pn' , '$des' , '$qn' , '$op1' , '$op2' , '$op3' , '$op4' , '$cor') ");
                     
                 if(mysql_affected_rows())

                  {
                    echo "<script>alert('Updated Successfully');</script>";
                  }

                  } 
                  ?>
        
     </form>
  </center>
  
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
	     
        
           
            
            
         