@extends('layout.app')
@section('title','Welcome')

@section('content')
    <style>
        #card-welcome {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background-color: #666d70;
            margin-top: 160px ;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 20px;
        }
        @media (max-width: 768px) {
            #card-welcome {
                width: 70%;
                border-radius: 10px;
            }
        }
    </style>
    <div class="card" id="card-welcome" >
        <img src="images/logo-padel.jpg" class="card-img-top" style="width: 15%; height: 15%;" >
        <div class="card-body">
            <h5 class="card-title">Contacto</h5>
            <p class="card-text">Enlace a nuestro número de teléfono para consultas</p>
            <a href="tel:+34678567876" class="btn btn-primary">Llámanos</a>
            <p class="card-text">Enlace a nuestro correo electrónico para peticiones</p>
            <a href=»mailto:padelexample@admin.com» class="btn btn-primary" >E-mail</a>
            <p class="card-text">Nos puedes encontrar aquí ...</p>
            <a href="https://goo.gl/maps/hMjqRMtHQjX7ZkFy7" class="btn btn-primary" >Google Maps</a>
        </div>
    </div>

@endsection
