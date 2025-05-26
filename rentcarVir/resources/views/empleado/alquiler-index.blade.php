@extends(Auth::user()->utenteable_type == "Admin" ? "admin.layout.admin-layout" : "empleado.layout.empleado-layout")
@section("title", "Alquiler - Estadísticas")

@section("content")
    @if ($errors->any())
        <div class="alert alert-danger text-center">
            <p>¡ATENCIÓN! Se han producido los siguientes errores:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <section class="management-section">
        <div class="container">
            <div class="d-flex justify-content-between mb-3">
                <h2>Alquileres</h2>
            </div>

            <form action="{{ route('alquiler.month') }}" method="POST" class="d-flex justify-content-center align-items-center mb-4 gap-2">
                @csrf
                <label for="mes" class="form-label mb-0">Mes:</label>
                <select name="mes" id="mes" class="form-select form-select-sm select-mes-custom" onchange="this.form.submit()">
                    <option value="0" {{ app('request')->input('mes') == 0 ? 'selected' : '' }}>Cualquiera</option>
                    @foreach (range(1, 12) as $month)
                        <option value="{{ $month }}" {{ app('request')->input('mes') == $month ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::create()->locale('es')->month($month)->monthName }}
                        </option>
                    @endforeach
                </select>
            </form>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha de Retiro</th>
                        <th>Fecha de Entrega</th>
                        <th>Matrícula del Coche</th>
                        <th>Modelo del Coche</th>
                        <th>Usuario</th>
                        <th>Fecha y Hora de Devolución</th>
                        <th>Fecha y Hora de Recogida Real</th>
                    </tr>
                </thead>
                <tbody>
    @forelse($alquileres as $alquiler)
        @php
            $esActivo = is_null($alquiler->fechaDevolucion);
        @endphp
        <tr class="{{ $esActivo ? 'table-success' : 'table-secondary' }}">
            <td>{{ \Carbon\Carbon::parse($alquiler->fechaRecogida)->format("d-m-Y") }}</td>
            <td>{{ \Carbon\Carbon::parse($alquiler->fechaEntrega)->format("d-m-Y") }}</td>
            <td>{{ $alquiler->vehiculo->matricula }}</td>
            <td>{{ $alquiler->vehiculo->modelo }}</td>
            <td>
                @if ($alquiler->cliente && $alquiler->cliente->usuario)
                    {{ $alquiler->cliente->usuario->username }}
                @else
                    Cliente no disponible
                @endif
            </td>
            <td>
                @if (!$alquiler->fechaDevolucion)
                    <form action="{{ route('alquiler.devolver', $alquiler->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="datetime-local" name="fecha_devolucion" class="form-control">
                        <button type="submit" class="btn btn-devolucion mt-2">Registrar Devolución</button>
                    </form>
                @else
                    <span class="text-success">
                        {{ \Carbon\Carbon::parse($alquiler->fechaDevolucion)->format('d-m-Y H:i') }}
                    </span>
                @endif
            </td>
            <td>
                @if (!$alquiler->fechaRecogidaReal)
                    <form action="{{ route('alquiler.recogerReal', $alquiler->id) }}" method="POST">
                        @csrf
                        <input type="datetime-local" name="fecha_hora_recogida_real" class="form-control" required>
                        <button type="submit" class="btn btn-primary mt-2">Registrar Recogida Real</button>
                    </form>
                @else
                    <span class="text-muted">
                        {{ \Carbon\Carbon::parse($alquiler->fechaRecogidaReal)->format('d-m-Y H:i') }}
                    </span>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7">No hay Resultados</td>
        </tr>
    @endforelse
</tbody>

            </table>
        </div>
    </section>
@endsection
