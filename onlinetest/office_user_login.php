<!doctype html>
<html>
    <head>
        
        <link href ="info.css" rel ="stylesheet" type="text/css"></link>
        
    	<style>
    		#office{
    	       background-color: #00ffff;
             }
             #office_user{
               background-color: white;
             }
              #wrapper { 
                    height: 250px;
                    width: 400px; 
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
      <?php include 'inc/home2.php' ?>
	  <center><div id="wrapper">
    
    	    <h1 id = "office"><b> OFFICE LOGIN </b></h1>
         <form class="office_user" method="post">
            <p align = "left">
        
                <label for ="account_type"><font size="4"><b>Account Type:&nbsp;</b></font><select id="period_dropdown" name="account_type" onchange="updateButton()" >
                <option value="nill" disabled="disabled" selected="selected">Select type</option>
                <option value="1">HR</option>
                <option value="2">Teamlead</option></select>
                <br><br>
                <label for="username"><font size="4"><b>Username:&nbsp;</b></font></label>
                <input type="text" name="username" placeholder="ex:-yourname.hr" required>
                <br><br>
                <label for="password"><font size="4"><b>Password:&nbsp;</b></font></label>
                <input type="password" name="password" placeholder="password" required>
                <br><br>
                <center style="padding-right:25px;"><button type="submit" name="submit" class="btn">Login</button></center>
            </p>
        
            
         </form>
         <form method="post">
                    <?php
                    session_start();
                     require 'db_connection.php';
                    if(isset($_POST['submit']))
                    {
                        
                        $id = $_POST['username'];
                        $pa = $_POST['password'];
                        $ac = $_POST['account_type'];
                         $_SESSION["idd"] = $ac;
                       $result = mysql_query("SELECT * FROM office_user_login WHERE user_name='" . $_POST['username']. "' AND password = '$pa' AND account_type='$ac' ");
                       $count  = mysql_num_rows($result);

                       if($count==0) {
                        echo "<script>alert('Invalid UserId...');</script>";
                        } else {
                                
                                    $_SESSION['hr1']=session_id();
                                    $_SESSION['tl']=session_id();
                                    
                                echo "<script>alert('Sucessfully Authenticated...');</script>";
                                if($ac == 1)
                                {
                                echo "<script>window.location='hr_page1.php';</script>";
                                }
                                else
                                {
                                    echo "<script>window.location='tl_page1.php';</script>";
                                }
                                    

                            
                                  
                              
                       }
                     }
                          
                         

                            

                       
                        
                    
                   ?>
                        
        
                
            </form>
      </div></center>

    </body>
</html>