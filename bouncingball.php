<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Gamedev Canvas Workshop : Bouncing Ball</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
    	* { padding: 0; margin: 0; }
    	canvas { background: #fff; display: block; margin: 0 auto; border: 1px solid #eee;}
    </style>
</head>
<body>
<h1 class="text-center">Bouncing Ball</h1>
<canvas id="myCanvas" width="480" height="320"></canvas>
<script>

	// Initialisations
    var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    var ballRadius = 10;

    // Points de départ des objets
    var balleX = canvas.width/2;
    var balleY = canvas.height-30;
    
    // Incrémentation de la position x/y
    var posX = -2;
    var posY = -2;

    function drawBall()
    {
        ctx.beginPath();
            ctx.arc(balleX, balleY, ballRadius, 0, Math.PI*2);
            ctx.fillStyle = "#0095DD";
            ctx.fill();
        ctx.closePath();
    }

    function draw()
    {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        drawBall();
        balleX += posX;
        balleY += posY;

        // Limitation gauche/droite de la balle
         if(balleX + posX > canvas.width || balleX + posX < 0) {
            posX = -posX;
        }
        // Limitation Bas/haut de la balle
        if(balleY + posY > canvas.height || balleY + posY < 0) {
            posY = -posY;
        }

    }

    setInterval(draw, 5);

</script>
<footer class="text-center font-weight-light">U 2020-11-23 22:01</footer>
</body>
</html>