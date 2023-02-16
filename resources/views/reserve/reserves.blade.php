@extends('layout.app')
@section('title','Ver Reservas')

@section('content')

    <style>
        #table-reserve{
            background-color: #fff;
            color: #333;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 50px;
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


        <div style="margin-top: 80px; text-align: center; ">
            @if(!is_null(Auth::user()->profile_image))
                <img src="{{ asset('storage/'.Auth::user()->profile_image) }}" alt="Profile Image" width="150" height="150" style="border: 3px solid gray;border-radius: 80%;">
            @endif
        </div>


    <table class="table" id="table-reserve">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">Day</th>
            <th scope="col">Shift</th>
            <th scope="col">Court</th>
            <th scope="col">Cancel Reserve</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($reservations_fe as $row)
            <tr>
                <td scope="row">{{ $row->id }}</td>
                <td> {{ $row->email }}</td>
                <td> {{ $row->day }}</td>
                <td> {{$row->shift->description}} </td>
                <td>  {{$row->pista->numero}}  </td>
                <td >
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" >
                        <i class="fa-solid fa-trash" ></i>
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
                                    Are you sure you want to cancel the reservation?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{route('reserves.destroy',$row->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</i> </button>
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
