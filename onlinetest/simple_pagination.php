<html>
<head>
	<style type="text/css">

.page
{
float: right;
margin: 0;
padding: 0;
}
.page li
{
	list-style: none;
	display:inline-block;
}
.page li a, .current
{
display: block;
padding: 5px;
text-decoration: none;
color: #8A8A8A;
}
.current
{
	font-weight:bold;
	color:#000;
}
.button
{
padding: 5px 15px;
text-decoration: none;
background: #333;
color: #F3F3F3;
font-size: 13PX;
border-radius: 2PX;
margin: 0 4PX;
display: block;
float: left;
}
</style>
</head>
<body>
   <?php include 'tl_page.php' ?>

  <button style="float:right;"><a href ="question_master_list.php">Go back</a></button>
 <form method="post">
    <?php
 session_start();
 $a=$_REQUEST['id'];

 


require 'db_connection.php';

$start=0;
$limit=1;


if(isset($_REQUEST['id1']))
{
  $id=$_REQUEST['id1'];
  $start=($id-1)*$limit;
}


$query=mysql_query("SELECT * FROM question_bank  limit $limit offset $start");
echo "<ul>";
$l=1;
while($query2=mysql_fetch_assoc($query))
{
                                 $x =$query2['question_bank_id'];
	                               echo "<div style='border:2px solid darkblue; margin-top:130px;background-color: white;  margin:40 20 20 50; opacity:0.9;'>";
                                   
                                   echo  $id; echo ")";
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



$rows=mysql_num_rows(mysql_query("SELECT * FROM question_bank "));
$total=ceil($rows/$limit);



	if($id>1)
{
  echo "<a href='simple_pagination.php?id1=".($id-1)."' class='button'>PREVIOUS</a>";
}
if($id!=$total)
{
  echo "<a href='simple_pagination.php?id1=".($id+1)."' class='button'>NEXT</a>";
}

echo "<ul class='page'>";
    for($i=1;$i<=$total;$i++)
    {
      if($i==$id) { echo "<li class='current'>".$i."</li>"; }
      
      else { echo "<li><a href='simple_pagination.php?id1=".$i."'>".$i."</a></li>"; }
    }
    echo "</ul>";

?>
</div>
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