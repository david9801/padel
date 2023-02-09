@extends('layout.app')
@section('title','Crear Reservas')
@section('content')
    <style>
        #table-create {
            background-color: #fff;
            color: #333;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 110px;
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
        #court-selector{

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
                    <form action="{{route('go-reserve')}}" method="post">
                        @csrf
                        <td><button class="btn btn-primary"><i class="bi bi-alarm-fill"></i></button></td>
                        <td><button class="btn btn-primary" ><i class="bi bi-alarm-fill"></i></button></td>
                        <td><button class="btn btn-primary" ><i class="bi bi-alarm-fill"></i></button></td>
                        <td><button class="btn btn-primary" ><i class="bi bi-alarm-fill"></i></button></td>
                        <td><button class="btn btn-primary" ><i class="bi bi-alarm-fill"></i></button></td>
                        <td><button class="btn btn-primary" ><i class="bi bi-alarm-fill"></i></button></td>
                        <td><button class="btn btn-primary" ><i class="bi bi-alarm-fill"></i></button></td>
                    </form>
                </tr>
            @endfor
        </tbody>
@endsection


