<style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }

    th,
    td {
        text-align: center;
        padding: 8px;
    }

    .red {
        color: red;
    }
</style>

<div>
    <table>
        <tr>
            <th>
                {{-- <img src="{{ public_path('\storage\logo\logo-salvietti.png') }}" alt="" width="100px"> --}}
            </th>
            <th>
                <h1>Listado de los procesos de Cocimiento</h1>
            </th>
        </tr>
    </table>
</div>

@php
    $limites = [[51, 53], [63, 65], [66, 67], [70, 71], [70, 72]];
@endphp

@foreach ($cocimientos as $cocimiento)
    <table border="1" cellspacing="0">
        <tr>
            <th colspan="3">Fecha: {{ $cocimiento->fecha }}</th>
        </tr>
        <tr>
            <td>Temperatura</td>
            <td>Fecha</td>
            <td>Hora</td>
        </tr>
        @if ($cocimiento->temperaturas->isEmpty())
            <tr>
                <td colspan="3">No hay registros</td>
            </tr>
        @else
            @php $index = 1; @endphp
            @foreach ($cocimiento->temperaturas as $temperatura)
                @php
                    $color =
                        $temperatura->temperatura >= $limites[$index - 1][0] &&
                        $temperatura->temperatura <= $limites[$index - 1][1]
                            ? ''
                            : 'red';
                @endphp
                <tr>
                    <td class={{ $color }}>
                        {{ $temperatura->temperatura }}</td>
                    <td>{{ $temperatura->fecha }}</td>
                    <td>{{ $temperatura->hora }}</td>
                </tr>
                @php $index++; @endphp
            @endforeach
        @endif
    </table>
@endforeach
