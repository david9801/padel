@extends('layout.app')
@section('title','Administrar Cuenta')

@section('content')


    <style>
        .container {
            display: flex;
            justify-content: space-around;
            margin-top: 90px;
        }
        #change, #change2, #change3, #change4 {
            height: 400px;
            width: 500px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 50px 20px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        #change {
            background-color: #4a5568;
        }

        #change2,#change4 {
            background-color: rgba(189, 9, 9, 0.92);
        }

        #change3 {
            background-color: #4a5568;
        }

        #but {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: deepskyblue;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }
        #but:hover {
            background-color: skyblue;
        }

        input[type=file] {
            margin-top: 10px;
        }

    </style>
    <div class="container">
        <form action="{{ route('edit-user', ['id' => Auth::user()->id]) }}" method="POST" id="change">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nueva contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" style="background-color:deepskyblue;" name="password">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Confirmar contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword2" style="background-color:deepskyblue;" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary" id="but">Cambiar contraseña</button>
            @if ($errors->any())
                <div class="alert alert-danger d-flex justify-content-center">
                    <ul class="text-center">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </form>

        <form id="change2">
            <p>Eliminar Usuario</p>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                <i class="bi bi-trash3-fill"> Delete </i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete your user?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" form="deleteForm" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form action="{{route('delete', ['id' => Auth::user()->id])}}" method="POST" >
            @method('DELETE')
            @csrf
        </form>

        <form action="{{ route('up', ['id' => Auth::user()->id]) }}" method="POST" id="change3" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="profile_image">Foto de perfil</label>
            <input type="file" name="profile_image" id="profile_image">
            <button type="submit" class="btn btn-primary" id="but">Enviar imagen</button>
        </form>

        <form id="change4">
            <p>Eliminar foto de perfil</p>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                <i class="bi bi-trash3-fill"> Delete </i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Photo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete the profile image?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" form="deleteForm" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form id="deleteForm" action="{{route('delete-image', ['id' => Auth::user()->id])}}" method="POST">
            @method('DELETE')
            @csrf
        </form>

    </div>
@endsection


