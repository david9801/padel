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


    <form action="{{route('reserves.store')}}" method="post" class="text-center">
        @csrf

        <input type="text" readonly  class="bg-light-blue text-center" value="{{ auth()->user()->email }}" name="email">
        <input type="date" class="bg-light-blue text-center" name="day">
        <select class="bg-light-blue text-center" name="shift_id">
            @foreach(\App\Models\Shift::all() as $shift)
                <option value="{{$shift->id}}">{{$shift->description}}</option>
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

