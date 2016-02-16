<html>
<head>
<meta charset="utf-8">

<style type="text/css">
body {
background-color:  #0059b3;
color: #5a5656;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
font-size: 16px;
line-height: 1.5em;
}
a { text-decoration: none; }
h1 { font-size: 1em; }
h1, p {
margin-bottom: 10px;
}
strong {
font-weight: bold;
}
.uppercase { text-transform: uppercase; }

/* ---------- LOGIN ---------- */
#login {
margin: 50px auto;
width: 500px;
}
form fieldset input[type="text"], input[type="password"] {
background-color: #e5e5e5;
border: none;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
color: #5a5656;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
font-size: 14px;
height: 50px;
outline: none;
padding: 0px 10px;
width: 280px;
-webkit-appearance:none;
}
form fieldset input[type="submit"] {
background-color: #008dde;
border: none;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
color: #f4f4f4;
cursor: pointer;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
height: 50px;
text-transform: uppercase;
width: 230px;
-webkit-appearance:none;
}
form fieldset a {
color: #5a5656;
font-size: 10px;
}
form fieldset a:hover { text-decoration: underline; }
.btn-round {
background-color: #5a5656;
border-radius: 50%;
-moz-border-radius: 50%;
-webkit-border-radius: 50%;
color: #f4f4f4;
display: block;
font-size: 12px;
height: 50px;
line-height: 50px;
margin: 30px 125px;
text-align: center;
text-transform: uppercase;
width: 50px;
}
#field{
  background-color: black;
}

</style>
</head>
<body>
 
<div id="login">

<form  method="post">
<fieldset id="field">
  <center>
  <div style="background-color:#00b300;height:30px"><h1><font color="#ffffff" size="6"><u><b>CHANGE PASSWORD</b></u></font></h1></div>

<p><input type="text"  name="key" placeholder="key" required ></p><br>

<p><input type="password"   name="newpassword" placeholder="new password" required></p>

<p ><input type="submit" name="submit" value="Submit"></p>

</fieldset>
</form>
</center>
</div> <!-- end login -->
<?php
require 'db_connection.php';
 if(isset($_POST['submit']))
 {
  $k = $_POST['key'];
   
  $pass = $_POST['newpassword'];
  $sql = mysql_query("SELECT * FROM admin");
  $row = mysql_fetch_assoc($sql);
  $ke = $row['key'];
  echo $ke;
   if($k == $ke)
   {
    mysql_query("UPDATE `MydB`.`admin` SET `password`='$pass'");
    echo "<script>alert('Sucessfully Changed.!!');</script>";
    echo "<script>window.location='admin.php';</script>";
   }
   else
   {
    echo "<script>alert('Wrong Key.!!');</script>";
    
   }
 }

?>
</body>
</html>
