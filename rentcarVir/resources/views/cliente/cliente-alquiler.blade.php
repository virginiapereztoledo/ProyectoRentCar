@extends("cliente.layout.cliente-layout")
@section("title", "Cliente - Alquiler")

@section("content")
    <div class="container mt-4">
        <h1 class="mb-31">Alquiler</h1>

        <section>
            @if (session('reserva_confirmada'))
    @php
        $reserva = session('reserva_confirmada');
    @endphp
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        <h5 class="mb-2">¡Reserva confirmada!</h5>
        <p>
            Has reservado el vehículo <strong>{{ $reserva['vehiculo'] }}</strong><br>
            Desde el <strong>{{ \Carbon\Carbon::parse($reserva['fechaInicio'])->format('d/m/Y') }}</strong>
            hasta el <strong>{{ \Carbon\Carbon::parse($reserva['fechaFin'])->format('d/m/Y') }}</strong>.
        </p>
        <p><strong>Importe total: {{ number_format($reserva['importe'], 2, ',', '.') }} €</strong></p>
        <p>El pago se realiza en la oficina el día de recogida.</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>

@endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($alquiler != null)
                <!-- Diseño de la tarjeta -->
                <div class="card card-verde-agua shadow-sm p-4 mb-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset($alquiler->vehiculo->foto) }}" class="img-fluid rounded-start" alt="Foto del vehículo">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p><strong>Fecha y hora de recogida:</strong> {{ \Carbon\Carbon::parse($alquiler->fechaRecogida)->format("d-m-Y") . " " . $alquiler->horaRecogida }}</p>
                                <p><strong>Lugar de recogida:</strong> {{ $alquiler->lugarRecogida }}</p>
                                <p><strong>Fecha y hora de entrega:</strong> {{ \Carbon\Carbon::parse($alquiler->fechaEntrega)->format("d-m-Y") . " " . $alquiler->horaEntrega }}</p>
                                <p><strong>Lugar de entrega:</strong> {{ $alquiler->lugarEntrega }}</p>
                                <p><strong>Importe:</strong> {{ $alquiler->importe }} €</p>

                                <!-- Verificar si el alquiler ya ha finalizado -->
                                @if(Carbon\Carbon::parse($alquiler->fechaEntrega . ' ' . $alquiler->horaEntrega)->isPast())
                                    <div class="alert alert-info">
                                        Este alquiler ha finalizado. El vehículo ahora está disponible.
                                    </div>
                                @else
                                    <!-- Botón de eliminar reserva si el alquiler no ha finalizado -->
                                    <form action="{{ route('cliente.alquiler.eliminar', $alquiler->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta reserva?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mt-3">Eliminar reserva</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Mensaje informativo si no hay alquiler -->
                <div class="alert alert-info">
                    <h4>No hay ningún alquiler presente</h4>
                </div>
            @endif
        </section>
    </div>
@endsection
