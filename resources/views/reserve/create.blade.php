@extends('layout.app')
@section('title', 'Crear Reservas')
@section('content')

    <style>
        body {
            background-color: black;
            margin-top: 90px;
        }
        #table-reserve{
            background-color: #fff;
            color: #333;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 70px;
        }

        #table-reserve thead th{
            background-color: #333;
            color: #fff;
            border-bottom: 2px solid #333;
        }

        #table-reserve tbody td{
            border-bottom: 1px solid #ddd;
        }

        #table-reserve tbody tr:nth-child(even){
            background-color: #f2f2f2;
        }
    </style>

    <div class="text-center">
        <a href="{{ route('sending') }}" method="get">
            @csrf
            <button class="btn btn-primary" style="color: white; background-color: black;">
                <i class="bi bi-alarm-fill"></i> Reserva una PISTA!
            </button>
        </a>
        <table class="table" id="table-reserve">
            <thead>
                <tr>
                    <th scope="col">Day</th>
                    <th scope="col">Shift</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations_f as $row)
                    <tr>
                        <td> {{ $row->day }}</td>
                        <td> {{$row->shift->description}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

