<html>
<body>


<p id="demo1" style="float:right;padding-right:20px;padding-top:5px;color:blue;"></p>




 <script type="text/javascript">
var myVar = setInterval(function(){ myTimer() }, 1);

function myTimer() {
    var d = new Date();
    <?php $_SESSION['d']=d; ?>
    var t = d.toLocaleTimeString();
        
    document.getElementById("demo1").innerHTML ="<b>Running Time:</b>"+ t.bold() ;
    
      

}
   
   


 
/*var d1 = new Date(); 
var d2 = new Date();
d1.setHours(+d2.getHours()+(1) ); 
d1.setMinutes(new Date().getMinutes()); 
var t1=d1.toLocaleTimeString();
 document.getElementById("demo").innerHTML = "<b>Ending time: </b>"+ d1.toLocaleTimeString();*/
 
</script>

</body>
</html>