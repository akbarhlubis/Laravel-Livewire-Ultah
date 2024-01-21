<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Sacramento');

        body {
            background-color: #1e1934;
        }

        h1 {
            position: fixed;
            margin: 0 auto;
            bottom: 5%;
            left: 0;
            right: 0;
            width: 12em;
            text-align: center;
            font-size: 2em;
            font-weight: 100;
            font-family: 'Sacramento';
            letter-spacing: 0.1em;
            color: white;
            text-shadow: 0 0 20px black;
            opacity: 0.8;
        }

        #glow {
            position: absolute;
            left: calc(50% - .1em);
            bottom: calc(35% + 9em);
            width: 0.2em;
            height: 0.2em;
            border-radius: 100%;
            opacity: 0.15;
        }

        #candle {
            position: absolute;
            left: calc(50% - .75em);
            bottom: 35%;
            width: 1.5em;
            height: 10em;
            overflow: hidden;
        }

        #candle::before {
            position: absolute;
            bottom: 0;
            left: 8%;
            content: '';
            width: 84%;
            height: 80%;
            background: linear-gradient(whitesmoke 0, #1e1934 125%);
            border-radius: 0.25em;
            box-sizing: border-box;
            border: 1px solid #333;
        }

        #top {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 2em;
            background-color: transparent;
        }

        #top #knot {
            position: absolute;
            bottom: 0;
            left: calc(50% - .05em);
            height: 0.5em;
            width: 0.1em;
            background-color: #0f3146;
        }

        #top .smoke {
            position: absolute;
            opacity: 0;
            border-radius: 100%;
        }

        #top .smoke:nth-child(1) {
            bottom: 0.1em;
            left: calc(50% - .5em);
            height: 0.5em;
            width: 0.5em;
            background-color: silver;
        }

        #top .smoke:nth-child(2) {
            bottom: 0.6em;
            left: 50%;
            height: 0.6em;
            width: 0.6em;
            background-color: lightgray;
            animation-delay: 0.2s;
        }

        #top .smoke:nth-child(3) {
            bottom: 1.1em;
            left: 20%;
            height: 0.3em;
            width: 0.3em;
            background-color: whitesmoke;
            animation-delay: 0.3s;
        }

        #top #flame {
            position: absolute;
            bottom: 0.15em;
            width: 1.5em;
            height: 1.6em;
            background-color: #ffee86;
            border-radius: 100%;
            box-shadow: inset 0 0 0 0.1em #ffee86;
            transform: rotateY(30deg);
            cursor: pointer;
        }

        #top #flame::after {
            position: absolute;
            content: '';
            width: 0.7em;
            height: 0.9em;
            bottom: 10%;
            left: calc(50% - .35em);
            background-color: #ff3200;
            border-radius: 100%;
            animation: burnInner 1.5s ease-in-out infinite;
        }

        #top #flame:hover {
            transition: all 0.1s ease-in-out;
            background-color: yellow;
        }

        #top #flame:hover::after {
            background-color: red;
        }

        @keyframes glow {
            0% {
                box-shadow: 0 0 1.5em 2.2em rgba(255, 246, 162, .75);
            }

            50% {
                box-shadow: 0 0 1.5em 2em rgba(255, 246, 162, .6);
            }

            100% {
                box-shadow: 0 0 1.5em 2.2em rgba(255, 246, 162, .75);
            }
        }

        @keyframes burn {
            0% {
                height: 1.7em;
                transform: rotateY(30deg);
            }

            50% {
                height: 1.3em;
                transform: rotateY(0deg);
                opacity: 0.9;
            }

            100% {
                height: 1.7m;
                transform: rotateY(30deg);
            }
        }

        @keyframes burnInner {
            0% {
                height: 0.9em;
                transform: rotateX(0deg);
            }

            50% {
                height: 0.8em;
                transform: rotateX(30deg);
            }

            100% {
                height: 0.9em;
                transform: rotateX(0deg);
            }
        }

        @keyframes puff {
            100% {
                transform: rotateY(-30deg);
                opacity: 0;
            }
        }

        @keyframes puff-bubble {
            0% {
                opacity: 0;
                transform: scale(1, 1);
            }

            50% {
                opacity: 1;
                transform: scale(1.2, 1.2);
            }

            100% {
                opacity: 0;
                transform: scale(0.8, 0.8);
            }
        }

        .glow {
            animation: glow 3s ease-in-out infinite;
        }

        .burn {
            animation: burn 1.5s ease-in-out infinite;
        }

        .puff {
            animation: puff 0.3s ease-in-out forwards;
        }

        .puff-bubble {
            animation: puff-bubble 0.75s ease-in-out forwards;
        }

        .stripe {
            position: absolute;
            left: -0.25em;
            width: 2em;
            height: 0.25em;
            background-color: #ff4b6f;
            transform: rotate(25deg);
            border-radius: 100%;
            box-shadow: 1px 1px 0 1px rgba(0, 0, 0, .25);
        }

        .stripe:nth-child(1) {
            top: 2.7em;
            opacity: 1.4;
        }

        .stripe:nth-child(2) {
            top: 4.2em;
            opacity: 0.9;
        }

        .stripe:nth-child(3) {
            top: 5.7em;
            opacity: 0.7333333333;
        }

        .stripe:nth-child(4) {
            top: 7.2em;
            opacity: 0.65;
        }

        .stripe:nth-child(5) {
            top: 8.7em;
            opacity: 0.6;
        }
    </style>
</head>

<body class="antialiased">
    <h1> Make a wish..<br />.. and blow out the candle</h1>
    <div class="glow" id="glow"></div>
    <div id="candle">
        <div class="stripe"></div>
        <div class="stripe"></div>
        <div class="stripe"></div>
        <div class="stripe"></div>
        <div class="stripe"></div>
        <div id="top">
            <div class="smoke"></div>
            <div class="smoke"></div>
            <div class="smoke"></div>
            <div id="knot"></div>
            <div class="burn" id="flame"></div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(function() {

        var flame = $('#flame');
        var txt = $('h1');

        flame.on({
            click: function() {
                flame.removeClass('burn').addClass('puff');
                $('.smoke').each(function() {
                    $(this).addClass('puff-bubble');
                });
                $('#glow').remove();
                txt.hide().html("It <b>will</b> come true..").delay(750).fadeIn(300);
                $('#candle').animate({
                    'opacity': '.5'
                }, 100);
            }
        })
    });
</script>

</html>
