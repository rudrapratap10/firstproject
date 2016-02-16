<!DOCTYPE html>
<html>
<b><font color="red" size="10px" id="countdown" class="timer" style="float:right;"></font></b>

</body>
<?php 
session_start();
echo "<script> ";?> 

var upgradeTime =3600;
var seconds = upgradeTime;

function timer() {
    var days        = Math.floor(seconds/24/60/60);
    var hoursLeft   = Math.floor((seconds) - (days*86400));
    var hours       = Math.floor(hoursLeft/3600);
    var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
    var minutes     = Math.floor(minutesLeft/60);
    var remainingSeconds = seconds % 60;
    <?php $_SESSION['t']=   hours; $_SESSION['t']=   hours; $_SESSION['t1']=   minutes; $_SESSION['t2']= remainingSeconds;?>
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    <?php $t= $_SESSION['t']; $t1= $_SESSION['t1']; $t2= $_SESSION['t2']; ?>
    document.getElementById('countdown').innerHTML = <?php echo $t;?> + ":" +<?php echo $t1;?> + ":" + <?php echo $t2;?>;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Completed";
    } else {
        seconds--;
        
    }
        <?php $_SESSION['sec']= seconds;?>
        
}
var countdownTimer = setInterval('timer()', 1000);



 <?php  echo "  </script>";
?>
<a href="timer1.php">okkkkkkkkkkkkkkk</a>
</html>
