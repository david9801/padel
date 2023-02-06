@extends('layout.app')
@section('title','Administrar Cuenta')

@section('content')
    <div style="margin-top: 150px ;text-align: center ">
        <p>Administrar cuenta</p>


        <p>Editar Usuario</p>
                <form action="{{ route('edit-user', ['id' => Auth::user()->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>



        <p>Eliminar usuario</p>
                <form action="{{route('delete', ['id' => Auth::user()->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"> <i class="bi bi-trash3-fill"></i> Usuario {{Auth::user()->name}}</i> </button>
                </form>

    </div>
@endsection
