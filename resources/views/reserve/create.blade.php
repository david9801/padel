@extends('layout.app')
@section('title','Crear Reservas')
@section('content')
    <style>
        #table-create {
            background-color: #fff;
            color: #333;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 100px;
            text-align: center;
        }
        #table-create thead th {
            background-color: #333;
            color: #fff;
            border-bottom: 2px solid #333;
        }

        #table-create tbody td {
            border-bottom: 1px solid #ddd;
            padding: 5px;
        }

        #table-create tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table-create .btn {
            padding: 2px 5px;
            font-size: 9px;
        }

        #table-create .bi {
            font-size: 9px;
        }
        #weeks {
            margin-top: 90px;
            text-align: center;
        }
        #weeks .btn {
            padding: 10px 20px;
            font-size: 14px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 10px;
        }

        #weeks .btn:hover {
            background-color: #fff;
            color: #333;
        }


    </style>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="text-center" id="weeks">
        <button type="button" class="btn btn-primary" id="previous-week">Anterior Semana</button>
        <button type="button" class="btn btn-primary" id="next-week">Siguiente Semana</button>
    </div>
    <table class="table table-bordered" id="table-create">
        <thead>
        <tr>
            <th scope="col">Horario</th>
            @for($i=1; $i<=7; $i++)
                <th scope="col">{{ trans("days.$i") }}</th>
            @endfor
        </tr>
        </thead>
        <tbody>
        @for($i = 11; $i < 21; $i++)
            <tr>
                <td scope="row">{{ $i }}:00</td>
                @php
                    $selectedDate = $i . ':00';
                @endphp
                <td>
                    <a href="{{route('send', ['start_time' => $selectedDate])}}" method="get">
                        @csrf
                        <button class="btn btn-primary"><i class="bi bi-alarm-fill"></i></button>
                    </a>
                </td>
                <td>
                    <a href="{{route('send', ['start_time' => $selectedDate])}}" method="get">
                        @csrf
                        <button class="btn btn-primary"><i class="bi bi-alarm-fill"></i></button>
                    </a>
                </td>
                <td>
                    <a href="{{route('send', ['start_time' => $selectedDate])}}" method="get">
                        @csrf
                        <button class="btn btn-primary"><i class="bi bi-alarm-fill"></i></button>
                    </a>
                </td>
                <td>
                    <a href="{{route('send', ['start_time' => $selectedDate])}}" method="get">
                        @csrf
                        <button class="btn btn-primary"><i class="bi bi-alarm-fill"></i></button>
                    </a>
                </td>
                <td>
                    <a href="{{route('send', ['start_time' => $selectedDate])}}" method="get">
                        @csrf
                        <button class="btn btn-primary"><i class="bi bi-alarm-fill"></i></button>
                    </a>
                </td>
                <td>
                    <a href="{{route('send', ['start_time' => $selectedDate])}}" method="get">
                        @csrf
                        <button class="btn btn-primary"><i class="bi bi-alarm-fill"></i></button>
                    </a>
                </td>
                <td>
                    <a href="{{route('send', ['start_time' => $selectedDate])}}" method="get">
                        @csrf
                        <button class="btn btn-primary"><i class="bi bi-alarm-fill"></i></button>
                    </a>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection
