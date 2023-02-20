@extends('layout.app')
@section('title', 'Calendar')
@section('content')

    <div class="text-center">
        <select id="pista-selector" onchange="changePista(this.value)" style="margin-top: 90px;">
            @for ($i = 1; $i <= 4; $i++)
                <option value="{{ $i }}" {{ $i == 1 ? 'selected' : '' }}>Pista {{ $i }}</option>
            @endfor
        </select>


        @for ($pista = 1; $pista <= 4; $pista++)
            <h2 style="color:blue; display: {{ $pista == 1 ? 'block' : 'none' }}">Pista {{ $pista }}</h2>
            <table class="table" id="table-calendar-{{ $pista }}" style="margin-top: 90px;color:blue; display: {{ $pista == 1 ? 'table' : 'none' }}">
                <thead>
                <tr>
                    <th scope="col">Day</th>
                    <th scope="col">Shift</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($dates as $row)
                    @if($row->pista->id == $pista)
                        <tr>
                            <td> {{ $row->day }}</td>
                            <td> {{$row->shift->description}} </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        @endfor
    </div>

    <script>
        var pistaActual = document.getElementById('pista-selector').value;

        function changePista(nuevaPista) {
            if (nuevaPista < 1 || nuevaPista > 4) {
                location.reload();
                return;
            }

            document.getElementById('table-calendar-' + pistaActual).style.display = 'none';
            document.getElementById('table-calendar-' + nuevaPista).style.display = 'table';

            document.querySelector('h2[style="color:blue; display: block;"]').style.display = 'none';
            document.querySelector('h2:nth-of-type(' + nuevaPista + ')').style.display = 'block';

            pistaActual = nuevaPista;
            location.reload();
        }

    </script>


@endsection
