<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Confirmación de reserva de pista de pádel</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
            color: #2196f3;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            margin: 0 0 20px 0;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        img {
            max-width: 100%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="{{ asset('images/logo-padel.jpg') }}" alt="Logo Pádel">
    </div>
    <h1>Confirmación de reserva de pista de pádel</h1>
    <p>Estimado/a {{ $reservation->user->name }},</p>
    <p>Le confirmamos su reserva de la pista de pádel número AÚN NO IMPLEMENTADO el {{ $reservation->day }} en el turno {{$reservation->shift->description}}  .</p>
    <p>Si tiene alguna pregunta o desea cambiar su reserva, por favor no dude en contactarnos.</p>
    <p>Gracias por utilizar nuestro servicio de reserva de pistas de pádel.</p>
    <p>Atentamente,<br>El equipo de reserva de pistas de pádel</p>
</div>
</body>
</html>
