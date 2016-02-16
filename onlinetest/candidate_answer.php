<!DOCTYPE HTML>
<html>
<head>
           <link href="info.css" rel="stylesheet" type="text/css"></link>
         <style>
               #office{
                       background-color: #00ffff;
                  }
       </style>
     </head>

<body>
    <?php include 'inc/home.php' ?>
	<center><div id="candidate_job_info" style="margin-top:200px;">
     <h2 id = "office"><b>Candidate Answers<b></h2>
     <form class="candidate_job_info"><p align="left">
        <label for ="name"> Candidate Name:</label>&nbsp;</b><select id="period_dropdown" name="name" onchange="updateButton()">
        <option value="nill" disabled="disabled" selected="selected">select Code</option>
        <option value="rahul">Rahul sahu</option>
        </option></select><br><br>
        <label for ="Question_name">Question Name</label>&nbsp;</b><select id="period_dropdown" name="question_name" onchange="updateButton()">
        <option value="nill" disabled="disabled" selected="selected">select Code</option>
        <option value="php">What do you do?</option>
        </option></select><br><br>
        <label for ="candidate_answer">Candidate Answer:</label>&nbsp;</b><select id="period_dropdown" name="candidate_answer" onchange="updateButton()">
        <option value="nill" disabled="disabled" selected="selected">select</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        </option></select><br><br>
        Remarks:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="remarks"><br><br>
        </p>
        
        
        <input type="submit" name="submit" value="Submit"></td></tr>
        
        
    </form>
</div></center>
</body>
</html>