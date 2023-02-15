@extends('layout.app')
@section('title','About Us')

@section('content')
    <style>
        #tabl1{
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 90vh;
            text-align: center;

        }
    </style>

    <div id="tabl1">
        <table class="table table-dark table-striped-columns">
            <thead>
            <tr>
                <th scope="col">Mañana</th>
                <th scope="col">Tarde</th>
                <th scope="col">Tipo pista</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>5 €</td>
                <td>6 €</td>
                <td>Outdoor</td>
            </tr>
            <tr>
                <td>6 €</td>
                <td>7 €</td>
                <td>Indoor</td>
            </tr>

            </tbody>
            <thead>
            <tr>
                <th scope="col">Bolas padel pro</th>
                <th scope="col">Bolas padel pro premium</th>
                <th scope="col">Bolas goma-espuma</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>7 €</td>
                <td>9 €</td>
                <td>3 €</td>
            </tr>
            </tbody>
        </table>

    </div>
@endsection
