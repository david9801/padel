@extends('layout.app')
@section('title', 'Crear Reservas')
@section('content')

    <style>
        body {
            background-color: black;
            margin-top: 110px;
        }
    </style>

    <div class="text-center">
        <a href="{{ route('sending') }}" method="get">
            @csrf
            <button class="btn btn-primary" style="color: white; background-color: black;">
                <i class="bi bi-alarm-fill"></i> Reservas
            </button>
        </a>
    </div>
@endsection

