@extends('layout.app')
@section('title','Administrar Cuenta')

@section('content')


    <style>
        #change {
            display: flex;
            flex-direction: column;
            align-items: center;

            margin: 50px auto;
            padding: 30px;
            background-color: #4a5568;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            width: 500px;
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
        #change2 {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 50px auto;
            padding: 30px;
            background-color: rgba(189, 9, 9, 0.92);
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }
        #change3 {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 50px auto;
            padding: 30px;
            background-color: #4a5568;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }


    </style>
    <div style="margin-top: 45px ;text-align: center ">

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
            <button type="submit" class="btn btn-danger"> <i class="bi bi-trash3-fill"></i> Usuario {{Auth::user()->name}}</i> </button>
        </form>

        <form action="{{ route('up', ['id' => Auth::user()->id]) }}" method="POST" id="change3" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="profile_image">Foto de perfil</label>
            <input type="file" name="profile_image" id="profile_image">
            <button type="submit" class="btn btn-primary" id="but">Enviar imagen</button>
        </form>

    </div>
@endsection
