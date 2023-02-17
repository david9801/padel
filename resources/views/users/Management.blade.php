@extends('layout.app')
@section('title','Admin Manage Page')
@section('content')


    <table class="table" >
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col"> Name </th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($allusers as $row)
            <tr>
                <td scope="row">{{ $row->id }}</td>
                <td> {{ $row->name }}</td>
                <td> {{ $row->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
