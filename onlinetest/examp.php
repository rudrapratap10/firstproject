<html>
<body>



<script language="JavaScript" type="text/javascript">

var sec = 00;   // set the seconds
var min = 02;   // set the minutes

function countDown() {
   sec--;
  if (sec == -01) {
   sec = 59;
   min = min - 1; }
  else {
   min = min; }

if (sec<=9) { sec = "0" + sec; }

  time = (min<=9 ? "0" + min : min) + " min and " + sec + " sec ";

if (document.getElementById) { document.getElementById('theTime').innerHTML = time.bold(); }

SD=window.setTimeout("countDown();", 1000);
if (min == '00' && sec == '00') { sec = "00"; window.clearTimeout(SD); }
}
window.onload = countDown;
// -->
</script>

<style type="text/css">
<!--
 .timeClass {
  font-family:arial,verdana,helvetica,sans-serif;
  font-weight:normal;
  font-size:10pt;
  }
-->
</style>



<table width="100%">
 <tr><td width="100%" align="center"><span id="theTime" class="timeClass"></span></td></tr>
</table>



</body>
</html>