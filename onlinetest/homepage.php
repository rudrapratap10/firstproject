<!Doctype html>
<html>
  <head>
   <style type="text/css">

      body{
	            margin: 0;
          }
      .land{
           background-color: #00ffff;
      }
      .yellow{
        background-color: #00ff00; 
         width: 400px;
         height:100px;
       }
       .cand{
        background-color: #00ff00; 
         width: 400px;
         height:100px;
      }
        
      #container{
        width: 100%;margin: 0 auto;
      }
       
      }
      #header{
        width: 100% ;height: 200px;border-bottom: 1px solid #c7c7c7;
      }

      #logo img{
        width:100px;height:100px;border-radius:50px;margin:10px;line-height:100px;
      }
      #mot{
        background-color: #00ff00;
      }  

      #nav{
      	height: 40px; width:100%; clear: both;
      }

      #con_area{
      	width: 100%;margin: 0 ;
      }
      
      #left_col{
      	float: left;width: 46.72%; height: 500px; color: #fff;  padding: 20px;
      }
      #right_col{
      	float: right;width: 46.72%; height: 500px; color: #fff;  padding: 20px;
      }


    </style>
  </head>
  <body>
    <?php include 'inc/menu.php' ?>
    <div id="container" width="100%" border="1">
	    <div id="header">
          <div id="logo"><marquee direction="left" scrollamount="10" behaviour="scroll"><font color="black" size="6">WELCOME ONLINE TEST 
          </font></marquee>
          </div>

      
          <div class="land">
          <div class='container'>
               <h1 id ="mot"><center>What motivates me? Take the Motivation Test</center></h1>
            
               <p><b>Understanding your underlying motivations can have a bigger impact on your life than providing a decent answer to a cliche interview question.</b></p>
               <p><b> Motivations are highly individual so how exactly do you determine what it is that motivates you? Our motivation test analyze your existing behaviors so you can understand exactly what will set your motivation on fire.</b> </p>
                
          </div> 
          </div>

       
      </div>
          <div id="con_area">
               <div id="left_col"><font color="black" size="8" style="font-family:Arial;"><center>I WANT TO GO TO...</center></font>
                  <br>
                  <p><center><a href="office_user_login.html"><button class="yellow" style= "margin-left:auto;margin-right:auto;"><font color="black" size="8" style="font-family:Arial;">OFFICE USER</font></button></a></center></p>
               </div>
               <div id="right_col">
                  <br><br><br><br><br><br>
                  <p><center><a href="candidate_login.html"><button class="cand" style= "margin-left:auto;margin-right:auto;"><font color="black" size="8" style="font-family:Arial;">CANDIDATE</font></button></a></center></p> 
               </div>
          </div>
     
       
   
    </div>
  </body>
</html>