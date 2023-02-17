@extends('layout.app')
@section('title','Admin Manage Page')
@section('content')


    <style>

        .table {
            border-collapse: separate;
            border-spacing: 0 10px;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            margin: 10px 0;
            font-size: 14px;
        }

        .table thead th {
            background-color: #F7F7F7;
            color: #333;
            font-weight: bold;
            text-align: left;
            border-bottom: 1px solid #D1D1D1;
            padding: 10px;
        }

        .table tbody td {
            border-bottom: 1px solid #D1D1D1;
            color: #333;
            padding: 10px;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }


    </style>

    <table class="table" style="margin-top: 90px;" >
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
