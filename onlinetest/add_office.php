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
  font-size:15px;
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
<button type="submit" name="back" style="float:right; font-size:20px;"><a href="admin1.php">Go Back </a></button>
<center>
 <div id="wrapper">
  <form method="post"><p align="left">
   <h2><font size="6" color="#0098e6"><u><b>ADD<b></u></font></h2>
   <ul>
   <label for ="account_type"><font size="4"><b>Account Type:&nbsp;</b></font><select id="period_dropdown" name="account_type" onchange="updateButton()" class="op">
                <option value="nill" disabled="disabled" selected="selected">Select type</option>
                <option value="1" class="op">HR</option>
                <option value="2" class="op">Teamlead</option></select><br><br>
  
     
          &nbsp;&nbsp;&nbsp;&nbsp;<label for="username"><font size="4"><b>Username:&nbsp;</b></font></label>
                <input type="text" name="username" placeholder="Username" required>
                <br><br>
          &nbsp;&nbsp;&nbsp;&nbsp; <label for="password"><font size="4"><b>Password:&nbsp;</b></font></label>
                <input type="password" name="password" placeholder="password" required>
                <br><br>
                <button type="submit" name="submit" class="btn">Add</button>
 </ul>
</form>
</div>
       <?php 
       require 'db_connection.php';
       if(isset($_POST['submit']))
       {
        $a=$_POST['username'];
        $b=$_POST['password'];
        $c=$_POST['account_type'];

       mysql_query(" INSERT INTO `MydB`.`office_user_login` (`office_user_login_id`, `account_type`, `user_name`, `password` ) VALUES ('', '$c' , '$a', '$b') ");
                     
                 if(mysql_affected_rows())

                  {
                    echo "<script>alert('Updated Successfully');</script>";
                    echo "<script>window.location='admin1.php';</script>";
                  }

                  } 

         
          ?>
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