<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: center;
        padding: 8px;
    }
</style>

<div>
    <table>
        <tr>
            <th>
                {{-- <img src="{{ public_path('\storage\logo\logo-salvietti.png') }}" alt="" width="100px"> --}}
            </th>
            <th>
                <h1>Listado de Fermentaciones</h1>
            </th>
        </tr>
    </table>
</div>

<table border="1" cellspacing="0">
    <th>Cantidad de entrada</th>
    <th>Cantidad de levadura</th>
    <th>Temperatura</th>
    <th>Fecha</th>
    @foreach ($fermentaciones as $fermentacion)
        <tr>
            <td>{{ $fermentacion->cantidadEntrada }}</td>
            <td>{{ $fermentacion->cantidadLevadura }}</td>
            <td>{{ $fermentacion->temperatura }}</td>
            <td>{{ $fermentacion->created_at }}</td>
        </tr>
    @endforeach
</table>
