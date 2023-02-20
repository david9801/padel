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
            <th colspan="4" style="background-color: #e6e6e6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 16px; text-align: center; color: #333; text-transform: uppercase; letter-spacing: 2px;">
                Administrar usuarios
            </th>
        </tr>
            <th scope="col"> ID </th>
            <th scope="col"> Nombre </th>
            <th scope="col"> Email </th>
            <th scope="col"> Eliminar </th>

        </tr>
        </thead>
        <tbody>
        @foreach ($allusers as $row)
            <tr>
                        <td scope="row">{{ $row->id }}</td>
                        <td> {{ $row->name }}</td>
                        <td> {{ $row->email }}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="fa-solid fa-trash"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Reserve</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que quieres borrar este usuario?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <form action="{{route('delete-all', ['id' => $row->id])}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
