@extends('layout.app')
@section('title','Enviar Reserva ')
@section('content')

    <style>
        .bg-light-blue{
            background-color: #fff;
            color: #333;
            overflow: hidden;
            margin-top: 110px;
            text-align: center;
            border-radius: 5px;
        }
    </style>

    @php
        $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        parse_str(parse_url($url, PHP_URL_QUERY), $params);
        $date = DateTime::createFromFormat('Y-m-d', $params['fecha']);
        $datevalue = $date->format('Y-m-d');
        $turno = $params['turno'];
        $pista = urldecode(trim($params['pista']));
        echo $pista;
    @endphp


    <form action="{{route('reserves.store')}}" method="post" class="text-center">
        @csrf
        <input type="text" readonly  class="bg-light-blue text-center" value="{{ auth()->user()->email }}" name="email">
        <input type="date" class="bg-light-blue text-center" name="day" value="{{$datevalue}}">
        <select class="bg-light-blue text-center" name="shift_id" value="{{$turno}}">
            @foreach(\App\Models\Shift::all() as $shift)
                <option value="{{$shift->id}}">{{$shift->description}}</option>
            @endforeach
        </select>

        <select class="bg-light-blue text-center" name="pista_id">
            @foreach(\App\Models\Pista::all() as $pista)
                <option value="{{$pista->id}}" @if($pista->numero == $pista) selected="selected" @endif>{{$pista->numero}}</option>
            @endforeach
        </select>


        <button type="submit" class="btn btn-primary" > SEND</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger d-flex justify-content-center">
            <ul class="text-center">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection

