<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página en Construcción</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(84,9,121,1) 35%, rgba(0,212,255,1) 100%);
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            text-align: center;
            position: relative;
        }

        h1 {
            font-size: 2.5rem;
            color: white;
            margin: 20px 0;
        }

        p {
            font-size: 1rem;
            color: white;
            margin: 0;
        }

        .construction {
            position: relative;
            width: 300px;
            height: 300px;
            margin: 0 auto;
        }

        .elephant {
            position: absolute;
            bottom: 20px;
            left: 50%;
            width: 150px;
            height: 150px;
            background-image: url(''); /*Cambia este enlace por la URL de tu imagen*/
            background-size: contain;
            background-repeat: no-repeat;
            transform: translateX(-50%);
            animation: bounce 2s infinite ease-in-out;
        }

        .beam {
            position: absolute;
            bottom: 60px;
            left: 50%;
            width: 120px;
            height: 20px;
            background: #666;
            border-radius: 5px;
            transform-origin: left;
            transform: translateX(-50%) rotate(0deg);
            animation: swing 2s infinite ease-in-out;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateX(-50%) translateY(0);
            }
            50% {
                transform: translateX(-50%) translateY(-10px);
            }
        }

        @keyframes swing {
            0%, 100% {
                transform: translateX(-50%) rotate(-10deg);
            }
            50% {
                transform: translateX(-50%) rotate(10deg);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="construction">
            <div class="beam"></div>
            <div class="elephant"></div>
            <iframe src="https://lottie.host/embed/5231f886-31a2-43b6-af7f-7c7fea1362d5/zMBp0wVVLB.json"></iframe>
        </div>
        <h1>Página en Construcción</h1>
        <p>Estamos trabajando para traerte algo increíble. Vuelve pronto.</p>
    </div>
</body>
</html>
