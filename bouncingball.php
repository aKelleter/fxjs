<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Gamedev Canvas Workshop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
    	* { padding: 0; margin: 0; }
    	canvas { background: #eee; display: block; margin: 0 auto; }
    </style>
</head>
<body>

<canvas id="myCanvas" width="480" height="320"></canvas>

<script>

	
    var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    var ballRadius = 10;

    // Point de départ de la balle
    var x = canvas.width/2;
    var y = canvas.height-30;
    
    // Incrémentation de la position x/y
    var dx = -2;
    var dy = -2;

    function drawBall()
    {
        ctx.beginPath();
        ctx.arc(x, y, ballRadius, 0, Math.PI*2);
        ctx.fillStyle = "#0095DD";
        ctx.fill();
        ctx.closePath();
    }

    function draw()
    {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        drawBall();
        x += dx;
        y += dy;

        // Limite gauche/droite
        if(x + dx > canvas.width || x + dx < 0) {
            dx = -dx;
        }
        // Limite Bas/haut
        if(y + dy > canvas.height || y + dy < 0) {
            dy = -dy;
        }

    }

    setInterval(draw, 5);

</script>
<footer class="text-center font-weight-light">v 23112020 14:04</footer>
</body>
</html>