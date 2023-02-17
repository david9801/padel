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
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                {{ $errors->first('password') }}
            </span>
                @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Confirmar contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword2" style="background-color:deepskyblue;" name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback">
                {{ $errors->first('password_confirmation') }}
            </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary" id="but">Cambiar contraseña</button>
        </form>

        <form action="{{route('delete', ['id' => Auth::user()->id])}}" method="POST" id="change2">
            @method('DELETE')
            @csrf
            <p>Eliminar user</p>
            <button type="submit" class="btn btn-danger"> <i class="bi bi-trash3-fill"></i> Usuario {{Auth::user()->name}}</i> </button>
        </form>
        <form action="{{ route('up', ['id' => Auth::user()->id]) }}" method="POST" id="change3" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="profile_image">Foto de perfil</label>
            <input type="file" name="profile_image" id="profile_image">
            <button type="submit" class="btn btn-primary" id="but">Enviar imagen</button>
        </form>
        <form action="{{route('delete-image', ['id' => Auth::user()->id])}}" method="POST" id="change4">
            @method('DELETE')
            @csrf
            <p>Eliminar foto de perfil</p>
            <button type="submit" class="btn btn-danger"> <i class="bi bi-trash3-fill"></i> Usuario {{Auth::user()->name}}</i> </button>
        </form>
    </div>
@endsection
