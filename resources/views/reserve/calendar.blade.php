@extends('layout.app')
@section('title', 'Calendario de pistas')
@section('content')

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
            margin-bottom: 30px;
            background-color: #f9f9f9;
            font-size: 12px;
        }

        th, td {
            text-align: center;
            padding: 10px;
        }

        th {
            background-color: #e6e6e6;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #fff;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .table-wrapper {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .table-wrapper table {
            width: 100%;
            background-color: #f2f2f2;
        }

        .table-wrapper h3 {
            text-align: center;
            margin-bottom: 10px;
        }

        .text-center {
            text-align: center;
        }
    </style>

    <div class="text-center" style="margin-top: 110px;">
            <h2 style="color: #93a3a9">Calendario de pistas</h2>
            <div class="text-center">
                <a href="{{ url('/calendar-reserves?date=' . $date->copy()->subDay()->format('Y-m-d')) }}" class="btn btn-secondary" style="background: green;">  <i class="bi bi-arrow-bar-left"></i>  Día anterior</a>
                <span style="color: #9ca8b9;font-weight: bold; ">{{ $date->format('l, j F Y') }}</span>
                <a href="{{ url('/calendar-reserves?date=' . $date->copy()->addDay()->format('Y-m-d')) }}" class="btn btn-secondary" style="background: green;">Día siguiente  <i class="bi bi-arrow-bar-right"></i>  </a>
            </div>
        <div class="table-wrapper">

                    @foreach($pistas as $pista)

                        <table class="table">

                            <thead>
                            <tr>
                                <th colspan="2" style="background-color: #e6e6e6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 16px; text-align: center; color: #333; text-transform: uppercase; letter-spacing: 2px;">
                                     {{ $pista->numero }}
                                </th>
                            </tr>
                            <tr>
                                <th scope="col">Horario</th>
                                <th scope="col">Estado</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($turnos as $turno)
                                <tr>
                                    <td>{{ $turno->description }}</td>
                                    <td>
                                        @if($reservas->where('pista_id', $pista->id)->where('shift_id', $turno->id)->count() > 0)
                                            Ocupado
                                        @else
                                            <a href="{{ route('sending', ['turno' => $turno->id, 'fecha' => $date->format('Y-m-d'),'pista'=>$pista->numero]) }}" class="btn btn-sm btn-secondary">Reservar</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endforeach

        </div>
    </div>

@endsection
