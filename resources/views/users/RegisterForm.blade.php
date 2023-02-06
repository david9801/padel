@extends('layout.app')
@section('title','Register')

@section('content')
    <div id="div2">
        <form id="form2" action="{{route('do-register')}}" method="POST">
            @csrf
            <div class="mb-3">
            <label for="exampleInputNick" class="form-label">Nick user</label>
            <input type="text" class="form-control" id="exampleInputNick"  name="name">
            </div>
                <div class="mb-3" >
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="background-color:deepskyblue;" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3 form-check" id="izq2" >
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label"  for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
@endsection
