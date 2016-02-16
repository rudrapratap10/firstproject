<!DOCTYPE html >
<html>

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  
</head>

<body>

<canvas id="canvas" width="150" height="150" style="float:right;"></canvas>

<script type="text/javascript" src="clock.js"></script>
<script type="text/javascript">
function render(canvas) {
    var ctx = canvas.getContext('2d');
    renderClock(ctx);
}
var canvas = document.getElementById('canvas');
if(canvas.getContext) {
    render(canvas);
    setInterval(function() { render(canvas); }, 1000);
} else {
    alert('This browser doesn\'t support the canvas element :(');
}
</script>
</body>
</html>