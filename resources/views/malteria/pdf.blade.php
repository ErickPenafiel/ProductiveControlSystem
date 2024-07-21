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
                <h1>Listado de los procesos de Malteria</h1>
            </th>
        </tr>
    </table>
</div>

@foreach ($malterias as $malteria)
    <table border="1" cellspacing="0">
        <tr>
            <th>{{ $malteria->cancha->nombre }}</th>
            <th>Fecha Inicio: {{ $malteria->fecha_inicio }}</th>
            <th>Fecha Fin: {{ $malteria->fecha_fin }}</th>
        </tr>
        <tr>
            <td>Temperatura</td>
            <td>Fecha</td>
            <td>Hora</td>
        </tr>
        @if ($malteria->temperaturas->isEmpty())
            <tr>
                <td colspan="3">No hay registros</td>
            </tr>
        @else
            @foreach ($malteria->temperaturas as $temperatura)
                <tr>
                    <td class='{{ $temperatura->temperatura >= 16 && $temperatura->temperatura <= 18 ? '' : 'red' }}'>
                        {{ $temperatura->temperatura }}</td>
                    <td>{{ $temperatura->fecha }}</td>
                    <td>{{ $temperatura->hora }}</td>
                </tr>
            @endforeach
        @endif
    </table>
@endforeach
