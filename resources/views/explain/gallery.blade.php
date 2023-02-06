@extends('layout.app')
@section('title','Nuestro Club')

@section('content')

    <div id="carouselExampleFade" class="carousel slide carousel-fade" style="width: 30%; height: 30%;margin-left: auto;
            margin-right: auto;margin-top: 60px ;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/logo-padel.jpg" class="d-block w-100" >
            </div>
            <div class="carousel-item">
                <img src="images/pistas.jpg" class="d-block w-100" >
            </div>
            <div class="carousel-item">
                <img src="images/pistas-2.jpg" class="d-block w-100" >
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

@endsection


