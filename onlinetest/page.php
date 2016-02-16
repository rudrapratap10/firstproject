<!DOCTYPE HTML>
<html>
<body onload="changeText();">
   <?php include 'inc/home2.php' ?>
   <style>
     body{background-image: url("http://www.sashipublications.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/c/o/code_-_spparaomt.jpg");
             background-size: 1200px 800px;
           }
   </style>

   <div id="textRange"></div><br>

<script type=text/javascript>
var delay="10";
var count='0';
var Texts=new Array();
Texts[0]="Always do your best. What you plant now, <br>you will harvest later...";
Texts[1]="In order to succeed, <br>we must first believe that we can...";
Texts[2]="A creative man is motivated by the desire to achieve,<br> not by the desire to beat others...";
Texts[3]="The will to win, the desire to succeed,<br> the urge to reach your full potential...<br> these are the keys that will unlock the door to personal excellence...";
Texts[4]="Knowing is not enough, we must apply. Willing is not enough, we must do....";
Texts[5]="Believe in yourself! Have faith in your abilities! Without a humble but reasonable confidence in your own powers you cannot be successful or happy....";
Texts[6]="If you want to shine like a sun...<br> First burn like a sun..!!";
Texts[7]="All of us do not have equal talent. But , all of us have an equal opportunity to develop our talents...";

function changeText(){
document.getElementById('textRange').innerHTML="<center style='padding-top:90px;text-shadow: 2px 2px 2px blue; font-size: 400%;'><font color='blue'><i>"+Texts[count].bold()+"</i></font></center>";
count++;
if(count==Texts.length){count='0';}
setTimeout("changeText()",delay*400);
}

</script>


</body>
</html>