<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Gamedev Canvas Workshop : Boucing Ball On Paddle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
    	* { padding: 0; margin: 0; }
    	canvas { background: #fff; display: block; margin: 0 auto; border: 1px solid #eee;}
    </style>
</head>
<body>
<h1 class="text-center">Boucing Ball On Paddle</h1>
<canvas id="myCanvas" width="480" height="320"></canvas>
<script>

    // Initialisations
	var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    var ballRadius = 10;
    var paddleHeight = 10;
    var paddleWidth = 75;
    var rightPressed = false;
    var leftPressed = false;
    

    // Points de départ des objets
    var balleX = canvas.width/2;
    var balleY = canvas.height-30;
    var paddleX = (canvas.width-paddleWidth)/2;
    
    // Incrémentation de la position x/y
    var posX = -2;
    var posY = -2;

    function drawBall() {
        ctx.beginPath();
            ctx.arc(balleX, balleY, ballRadius, 0, Math.PI*2);
            ctx.fillStyle = "#0095DD";
            ctx.fill();
        ctx.closePath();
    }

    function drawPaddle() {
        ctx.beginPath();
            ctx.rect(paddleX, canvas.height-paddleHeight, paddleWidth, paddleHeight);
            ctx.fillStyle = "#0095DD";
            ctx.fill();
        ctx.closePath();
    }

    function draw()
    {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        drawBall();
        drawPaddle();
        balleX += posX;
        balleY += posY;

        // Limitation gauche/droite de la balle
        if(balleX + posX > canvas.width || balleX + posX < 0) {
            posX = -posX;
        }
        // Limitation Bas/haut de la balle
        if(balleY + posY < ballRadius) {
            posY = -posY;
        } else if(balleY + posY > canvas.height-ballRadius) {
            if(balleX > paddleX && balleX < paddleX + paddleWidth) {
                posY = -posY;
            }
            else {
                alert("GAME OVER");
                document.location.reload();
                clearInterval(interval);
            }
        }

        // Gestion du déplacement du paddle
        if(rightPressed) {
            paddleX += 7;
            if (paddleX + paddleWidth > canvas.width){
                paddleX = canvas.width - paddleWidth;
            }
        }else if(leftPressed) {
            paddleX -= 7;
            if (paddleX < 0){
                paddleX = 0;
            }
        }

    }

    document.addEventListener("keydown", keyDownHandler, false);
    document.addEventListener("keyup", keyUpHandler, false);
    function keyDownHandler(e) {
        if(e.key == "Right" || e.key == "ArrowRight") {
            rightPressed = true;
        }
        else if(e.key == "Left" || e.key == "ArrowLeft") {
            leftPressed = true;
        }
    }

    function keyUpHandler(e) {
        if(e.key == "Right" || e.key == "ArrowRight") {
            rightPressed = false;
        }
        else if(e.key == "Left" || e.key == "ArrowLeft") {
            leftPressed = false;
        }
    }

    var interval = setInterval(draw, 10);

</script>
<footer class="text-center font-weight-light">U 2020-11-23 22:26</footer>
</body>
</html>