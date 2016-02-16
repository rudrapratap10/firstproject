<!doctype html>
<html>
     <head>
    
          <link href="info.css" rel="stylesheet" type="text/css"></link>

	   <style>
		   #office{
	                  background-color: #00ffff;
                  }
                   #wrapper { 
height: 250px;
width: 420px; 
padding:20px;
background-color: white; 
margin-top: 60px;
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
.btn
                        {
                          width:19%;
                          height: 18%;
                          font-size: 18px;
                          background-color: #b3e5ff;

                        }
        </style>
     </head>

     <body>
<?php include 'inc/home1.php' ?>
	    <center><div id="wrapper">
    
            <form  method="post">
                <div id = "result">
    	        <h1 id = "office"><b> CANDIDATE LOGIN </b></h1><br>
                       <p align="left" style="padding-left:90px;">
                    <label for="id" ><font size="4"><b>UserID:</b></font></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="id" placeholder="ex:-9090180497" required>
                    <br><br>
                    <label for="password" ><font size="4"><b>Password:&nbsp;</b></font></label>
                    <input type="password" name="password" placeholder="password" required>
                    <br><br></p>
                    <button type="submit" class="btn" name="submit">Login</button></div></form>
                   <form method="post">
                    <?php
                    session_start();
                     require 'db_connection.php';
                    if(isset($_POST['submit']))
                    {
                        
                        $id = $_POST['id'];

                       $result = mysql_query("SELECT * FROM candidate_job_info WHERE candidate_login_id='" . $_POST['id']. "' ");
                       $count  = mysql_num_rows($result);
                       if($count==0) {
                        echo "<script>alert('Invalid UserId...');</script>";
                        } else {
                            $_SESSION["num"] = $id;

                              $sql = mysql_query("SELECT * FROM candidate_job_info WHERE candidate_login_id=" .$id);
                               $row = mysql_fetch_assoc($sql);
                                $a = $row['candidate_profile_id'];

                              $sql1 = mysql_query("SELECT * FROM candidate_answer WHERE candidate_profile_id=".$a);
                             if($row1 = mysql_fetch_assoc($sql1))
                             {
                             
                           
                                echo "<script>alert('Sorry you have already given test..!!');</script>";
                              }
                              else{
                                 $u=1;
                                 mysql_query(" UPDATE `MydB`.`candidate_job_info` SET test_start_date_time =now() WHERE candidate_login_id=" .$id );
                                echo "<script>alert('Sucessfully Authenticated...');</script>";
                                echo "<script>window.location='practise.php?id=$u';</script>";
                                 //$_SESSION['start']=now();
                                 //$_SESSION['end']=$_SESSION['start']+(60*60);
                                 //$r =  $_SESSION['end'];
                                 //echo $r;
                                  //}
                                  $timestamp = strtotime(date('h:i:sa')) + 60*60;
                                    $time = date('h:i:sa', $timestamp);
                                       $_SESSION['time']=$time;
                                       $_SESSION['time1']= time() + (60 * 60);
                                       
                                       
                         }     
                       }
                     }
                          
                         

                            

                       
                        
                    
                   ?>
                        
        
                
            </form>
        </div></center>
     
     </body>
</html>
        


    
        