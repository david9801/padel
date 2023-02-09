@extends('layout.app')
@section('title','Enviar Reserva ')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('reserves.store')}}" method="POST" class="text-center">
        @csrf
        <input type="text" class="bg-light-blue text-center" placeholder="Title" name="title">
        <input type="datetime-local" class="bg-light-blue text-center" placeholder="Start time" name="start_time">
        <input type="datetime-local" class="bg-light-blue text-center" placeholder="End Time" name="end_time">
        <input type="text" class="bg-light-blue text-center" placeholder="Court number" name="court_number">
        <input type="text" class="bg-light-blue text-center" placeholder="Email" name="email">
        <button type="submit" class="btn btn-primary" > SEND</button>
    </form>
@endsection
