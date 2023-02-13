

@extends('layout.app')
@section('title','Crear Reservas')
@section('content')


    <style>
        #table-create {
            background-color: #fff;
            color: #333;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 30px;
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
        #but{
            margin-top: 80px;
            margin-left: auto;
            margin-right: auto;
            display: block;
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
                @php
                    $selectedDate = $i . ':00';
                @endphp
                @for($j = 1; $j <= 7; $j++)
                    <td>
                        @php
                            $currentDate = new \DateTime();
                            $formattedDate = $currentDate->format('d-m-Y');
                            $url = '/goto-reserve/' . $formattedDate . '-' . $selectedDate;
                        @endphp
                        <a href="{{ $url }}" method="get">
                            @csrf
                            <button class="btn btn-primary"><i class="bi bi-alarm-fill"></i></button>
                        </a>
                    </td>
                @endfor
            </tr>
        @endfor
        </tbody>

        <script>
            function previousWeek() {
                var date = new Date();
                date.setDate(date.getDate() - 7);
                window.location.href = '/reserves/create/' + formatDate(date);
            }

            function nextWeek() {
                var date = new Date();
                date.setDate(date.getDate() + 7);
                window.location.href = '/reserves/create/' + formatDate(date);
            }

            function formatDate(date) {
                var dd = date.getDate();
                var mm = date.getMonth() + 1;
                var yyyy = date.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd;
                }
                if (mm < 10) {
                    mm = '0' + mm;
                }
                return dd + '/' + mm + '/' + yyyy;
            }

        </script>

        <div id="but" >
            <button class="btn btn-primary center-block" onclick="previousWeek()">Semana anterior</button>
            <button class="btn btn-primary center-block" onclick="nextWeek()">Semana siguiente</button>
        </div>



@endsection
