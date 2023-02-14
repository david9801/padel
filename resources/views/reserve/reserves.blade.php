@extends('layout.app')
@section('title','Ver Reservas')

@section('content')

    <style>
        #table-reserve{
            background-color: #fff;
            color: #333;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 90px;
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



    <table class="table" id="table-reserve">
        <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Shift</th>
                        <th scope="col">Day</th>
                    </tr>
        </thead>
        <tbody>
            @foreach ($reservations_fe as $row)
                    <tr>
                        <td scope="row">  {{ $row->id  }}  </td>
                        <td>  {{ $row->email  }}  </td>
                        <td>{{ $row->shift_id }}</td>
                        <td>  {{ $row->day  }}  </td>
                    </tr>
            @endforeach
        </tbody>
    </table>

@endsection
