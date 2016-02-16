<?php
$z=date('h:i:sa');
echo $z;
$timestamp = strtotime(date('h:i:sa')) + 60*60;

$time = date('H:i:sa', $timestamp);

echo $time;
?>