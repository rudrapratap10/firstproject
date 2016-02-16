<html>
<body>
<div id="content">
<?php
 $a=$_REQUEST['id'];
$q=$_SESSION['qmi'];
require 'db_connection.php';
$start=0;
$limit=1;

if($off= $_REQUEST['id2'])
{
   $id=$_REQUEST['id2'];
   $start=($id-1)*$limit;
}

$query=mysql_query("SELECT * FROM question_bank WHERE question_master_id='" .$a."' LIMIT $limit , $start ");
echo "<ul>";
while($query2=mysql_fetch_array($query))
{
                                     $x =$query2['question_bank_id'];

                                   echo "<div style='border:2px solid darkblue; margin-top:130px;background-color: white;  margin:40 20 20 50;' >";
                                   
                                   echo  $l; echo ")";
                                   echo "&nbsp";
                                   echo "&nbsp";
                                   echo "<b>".$query2['description']."</b>";
                                   echo"<br>";
                                   echo"<br>";
                                   echo "Q)";
                                   echo "<b>&nbsp;". $query2['question_name']."</b>";
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left; padding-left:20px;'>Option1:</b>&nbsp;&nbsp;&nbsp;".$query2['option1'];
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left;padding-left:20px;'>Option2:</b>&nbsp;&nbsp;&nbsp;".$query2['option2'];
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left;padding-left:20px;'>Option3:</b>&nbsp;&nbsp;&nbsp;".$query2['option3'];
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left;padding-left:20px;'>Option4:</b>&nbsp;&nbsp;&nbsp;".$query2['option4'];
                                   echo"<br>";
                                   echo"<br>";
                                   echo "<b style='float:left;padding-left:20px;'>Correct Option:</b>&nbsp;&nbsp;&nbsp;".$query2['correct_answer'];
                                   echo"<br>";
                                   echo"<br>";
                               
                                   
                                   echo "</td><center><button type='submit' name='delete' value='".$x."'>Delete</button></center></td>";
                                   echo"</div>";
                                   $l++;
                                   
}
echo "</ul>";


$rows=mysql_num_rows(mysql_query("SELECT * FROM question_bank"));
$total=ceil($rows/$limit);


echo "<ul class='page'>";
      for($i=1;$i<=$total;$i++)
      {
         if($i==$id) { echo "<li class='current'>".$i."</li>"; }
         
         else { echo "<li><a href='?id2=".$i."'>".$i."</a></li>"; }
      }
echo "</ul>";
?>
</div>
</body>
</html>