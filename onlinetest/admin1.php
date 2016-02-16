
<?php
session_start();
if($_SESSION['adm'] == session_id())
{?>



<html>
<head>
  <style>
  body {
    background-color: #d1e0e0;
}

    #wrapper { 
height: 250px;
width: 700px; 
padding:20px;
background-color: white; 
margin-top: 100px;
/* outer shadows  (note the rgba is red, green, blue, alpha) */
-webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
-moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);

/* rounded corners */
-webkit-border-radius: 12px;
-moz-border-radius: 7px; 
border-radius: 7px;

/* gradients */
background: -webkit-gradient(linear, left top, left bottom, 
color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); 
}
.op{
  font-size: 20px;
}
.btn
{
  width:18%;
  height: 18%;
  font-size: 20px;
  background-color: #b3e5ff;

}

  </style>
</head>
 <body>
<button type="submit" name="logout" style="float:right; font-size:20px;"><a href="admin_logout.php">Logout</a></button>

<center>
 <div id="wrapper">
 <h1 ><font size="7" color="#0098e6"><u>WELCOME ADMIN!!</u></font></h1><br>
 <form method="post" id="frm">

 <ul>
   <label for ="account_type"><font size="6"><b>Account Type:&nbsp;</b></font><select id="period_dropdown" name="account_type" onchange="updateButton()" class="op">
                <option value="nill" disabled="disabled" selected="selected">Select type</option>
                <option value="1" class="op">HR</option>
                <option value="2" class="op">Teamlead</option></select><br>
  
 </ul>
 <button type="submit" name="submit" class="btn">Submit</button>

     <?php
        $i=0;
      require 'db_connection.php';
      if(isset($_POST['submit']))
      {
        
        $a=$_POST['account_type'];
        $sql=mysql_query("SELECT * FROM office_user_login WHERE account_type=".$a);
          while($row=mysql_fetch_assoc($sql))
          {
              $c=$row['user_name'];
              $d=$row['password'];
          }  



        
        
      }

     ?>
 </form>
 </div>
</center><br>
<table  border="1px" style="width:100%; height:50px;">
  <tr  valign="top"><td>
<table border= "1px" style="width:100%">
    
  <tr>
    <h1><font color='#4d1300'>LISTS</font></h1>
    <button name="add" type="submit" style="float:right;"><a href ="add_office.php" ><font  size="5" style="font-family:Arial;">Add</font></a></button>
    <td>Sl No.</td>
    <td>Account Type</td> 
    <td>UserName</td> 
    <td>Password</td>   
    <td>Delete</td>
    
  </tr>

  <form method = "post">
   <?php
              
                 require 'db_connection.php';
               $i=1;

               $sql = mysql_query("SELECT * FROM  office_user_login WHERE account_type=".$a);
              while( $row = mysql_fetch_assoc($sql))
              {
                
                echo "<td><b><font color='#000066'>".$i."</font></b></td>";
                if($a=1)
                {
                echo "<td><b><font color='#000066'>HR</font></b></td>";
              }
              else
              {
                echo "<td><b><font color='#000066'>Team Lead</font></b></td>";
              }
                 echo "<td><b><font color='#000066'>".$row['user_name']."</font></b></td>";
                 echo "<td><b><font color='#000066'>".$row['password']."</font></b></td>";
                   
                $p=$row['office_user_login_id'];
                
                echo "<td><button type='submit' name='delete' value='".$p."'>Delete</button></td>";
                  
                  echo"</tr>";
                 $i++;
              }

                   if(isset($_POST['delete']))
                   {
                     
                    $sql2 =  "DELETE FROM office_user_login WHERE office_user_login_id =".$_POST['delete'];
                    if(mysql_query($sql2))
                    {
                      echo "<script>alert('Deleted Successfully');</script>";
                    }
                      echo "<script>window.location='';</script>";
                   }

                   
            ?>
  </form>
  
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
  echo "<script>window.location='admin.php';</script>";
}
?>