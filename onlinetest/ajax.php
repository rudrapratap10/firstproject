<?php
require 'db_connection.php';
?>
<html >
<head>

<script type="text/javascript" src="jquery-1.11.1.min.js"></script>


</head>
 
<body>

<form method="post">
<center>
<div>
<label>Candidate Name:</label> 
<select name="name" id="name" onchange="get()">
<option selected="selected">--Select Code--</option>
<?php

   require 'db_connection.php';
    $result = mysql_query("SELECT * FROM candidate_profile");
    while($row = mysql_fetch_assoc($result))
  {
   
      echo "  <option value='". $row['candidate_profile_id']."'>". $row['name']."</option>";
      
  } 
?>
</select>
<br><br><br>
<label>Job Code :</label> <select name="job_code" id="job_code">
<option disabled="disabled" selected="selected">--Select Code--</option>
</select>
<img  id="loding1"></img>
<br><br><br>


</div>
<br />
</center>
</form>
<script type="text/javascript">
function get()
{
var id = $('#name').val();
    var datastring  = 'getid='+id;
    $.ajax({
      type: "POST",
      data: datastring,
      url: "ajax1.php",
      success: function(data)
      {
       
         
          $('#job_code').html(data);

      },
        
    });

}
</script>
</body>
</html>