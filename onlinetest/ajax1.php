

<?php
require 'db_connection.php';
if($_POST['getid'])
{
	$bid=$_POST['getid'];
		
	 
           $result = mysql_query("SELECT * FROM candidate_profile WHERE candidate_profile_id=".$bid);
            $row=mysql_fetch_assoc($result);
            $a=$row['job_code_master_id'];
            $result1 = mysql_query("SELECT * FROM job_code_master WHERE job_code_master_id=".$a);        
	  echo "<option selected='selected' disabled='disabled' value='0' >Select Paper </option>";
	  while($row1=mysql_fetch_assoc($result1))
	{
		
        	echo "<option value='".$row1['job_code_master_id']."'> ".$row1['job_code']."</option>";
      
	}
}
?>
