@extends("public.layout.public-layout")
@section("title", "Catálogo")
@push('javascript')
<script src="{{asset("js/catalogo.js")}}"></script>
@endpush
@section("content")
<div class="container mt-5">
    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center" style="margin-top: 100px;">
            {{ $message }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger text-center" style="margin-top: 100px;">
            <p><strong>¡ATENCIÓN!</strong> Ocurrieron los siguientes errores:</p>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <section class="container seccion-catalogo pt-4">
        <div class="text-center mb-4">
            <h1>Explora nuestro Catálogo de Coches</h1>
            <p>
                Descubre nuestra amplia gama de vehículos disponibles para alquiler.
                Desde turismos hasta furgonetas, tenemos algo para cada necesidad con los mejores precios.
                Encuentra el coche perfecto para tu próximo viaje y realiza una reserva fácil y rápida.
            </p>
        </div>

        <section class="search-section my-5">
            <form action="{{ route('catalogo') }}" method="GET" class="form-catalogo">
                <div class="row g-5 align-items-end">
                    <div class="col-md-5">
                        <label for="search" class="form-label">Buscar vehículo</label>
                        <div class="input-group" style="width: 100%;">
                            <input type="search" id="search" name="search" class="form-control" placeholder="Marca o modelo" value="{{ request()->input('search') }}">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Rango de precios</label>
                        <div class="d-flex align-items-center">
                            <input type="number" id="priceMin" name="priceMin" class="form-control me-2" style="min-width: 90px;" placeholder="Mín" min="1" max="500" value="{{ request()->input('priceMin', 1) }}">
                            <span class="mx-1">-</span>
                            <input type="number" id="priceMax" name="priceMax" class="form-control" style="min-width: 90px;" placeholder="Máx" min="1" max="500" value="{{ request()->input('priceMax', 500) }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="asientos" class="form-label">Asientos</label>
                        <select name="asientos" id="asientos" class="form-select">
                            <option value="">Todos</option>
                            @for ($i = 2; $i <= 7; $i++)
                                <option value="{{ $i }}" {{ request()->input('asientos') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    @can('isClient')
                    <div class="col-md-4">
                        <label class="form-label">Recogida y entrega</label>
                        <div class="row g-2">
                            <div class="col-6">
                                <select name="lugarRecogida" class="form-select">
                                    <option value="Fuengirola" {{ request()->input('lugarRecogida') == 'Fuengirola' ? 'selected' : '' }}>Fuengirola</option>
                                </select>
                                <input type="date" name="fechaRecogida" class="form-control mt-1" value="{{ request()->input('fechaRecogida') }}">
                                <select name="horaRecogida" class="form-select mt-1">
                                    <option value="08:00" {{ request()->input('horaRecogida') == '08:00' ? 'selected' : '' }}>08:00</option>
                                    <option value="08:30" {{ request()->input('horaRecogida') == '08:30' ? 'selected' : '' }}>08:30</option>
                                    <option value="09:00" {{ request()->input('horaRecogida') == '09:00' ? 'selected' : '' }}>09:00</option>
                                    <option value="09:30" {{ request()->input('horaRecogida') == '09:30' ? 'selected' : '' }}>09:30</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select name="lugarEntrega" class="form-select">
                                    <option value="Fuengirola" {{ request()->input('lugarEntrega') == 'Fuengirola' ? 'selected' : '' }}>Fuengirola</option>
                                </select>
                                <input type="date" name="fechaEntrega" class="form-control mt-1" value="{{ request()->input('fechaEntrega') }}">
                                <select name="horaEntrega" class="form-select mt-1">
                                    <option value="08:00" {{ request()->input('horaEntrega') == '08:00' ? 'selected' : '' }}>08:00</option>
                                    <option value="08:30" {{ request()->input('horaEntrega') == '08:30' ? 'selected' : '' }}>08:30</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    @endcan
                </div>
            </form>
        </section>

        @if ($message = Session::get('empty'))
        <div class="alert alert-info text-center">{{ $message }}</div>
        @endif

        <section class="result-section">
            <div class="row">
                @foreach($result as $alquiler)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 {{ $alquiler->disponible}}">
                        <img src="{{ asset($alquiler->foto) }}" class="card-img-top" alt="Imagen del vehículo">

                        {{-- MODIFICADO EL CARD BODY PARA TENER ALTURA FIJA Y SCROLL --}}
                        <div class="card-body" style="max-height: 655px; overflow-y: auto;">
                            <h5 class="card-title1">{{ $alquiler->modelo }}</h5>
                            <p class="card-text1">{{ $alquiler->marca }}</p>
                            <p class="card-text1"><strong>Precio diario:</strong> {{ $alquiler->costoDiario }} €</p>
                            <a href="{{ route('vehiculo.mostrar', $alquiler->id) }}" class="btn btn-info">Ver más</a>

                            <ul class="list-group list-group-flush mt-3">
                                <li class="list-group-item"><strong>Motor:</strong> {{ $alquiler->motor }}</li>
                                <li class="list-group-item"><strong>Puertas:</strong> {{ $alquiler->puertas }}</li>
                                <li class="list-group-item"><strong>Equipamiento:</strong> {{ $alquiler->equipamiento }}</li>
                                <li class="list-group-item"><strong>Cambio:</strong> {{ $alquiler->cambio }}</li>
                                <li class="list-group-item"><strong>Asientos:</strong> {{ $alquiler->asientos }}</li>
                            </ul>

                            @can("isClient")
                            @if ($alquiler->disponible)
                                @php
                                    $fechaRecogida = request()->input('fechaRecogida');
                                    $fechaEntrega = request()->input('fechaEntrega');
                                    $horaRecogida = request()->input('horaRecogida');
                                    $horaEntrega = request()->input('horaEntrega');
                                @endphp

                                @if ($fechaRecogida && $fechaEntrega && $horaRecogida && $horaEntrega)
                                    <form action="{{ route('reservar') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ Crypt::encrypt($alquiler->id) }}">
                                        <input type="hidden" name="fechaRecogida" value="{{ Crypt::encrypt($fechaRecogida) }}">
                                        <input type="hidden" name="lugarRecogida" value="{{ Crypt::encrypt(request()->input('lugarRecogida')) }}">
                                        <input type="hidden" name="horaRecogida" value="{{ Crypt::encrypt($horaRecogida) }}">
                                        <input type="hidden" name="fechaEntrega" value="{{ Crypt::encrypt($fechaEntrega) }}">
                                        <input type="hidden" name="lugarEntrega" value="{{ Crypt::encrypt(request()->input('lugarEntrega')) }}">
                                        <input type="hidden" name="horaEntrega" value="{{ Crypt::encrypt($horaEntrega) }}">
                                        <button class="btn btn-primary mt-2" type="submit">Reservar</button>
                                    </form>
                                @else
                                    <p class="text-warning mt-3">⚠️ Para reservar, primero completa la búsqueda con fecha y hora.</p>
                                @endif
                            @else
                                <p class="text-danger mt-4">No disponible</p>
                            @endif
                            @endcan
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if ($result != [])
            <div class="d-flex justify-content-center">
                {{ $result->withQueryString()->links('components.pagination') }}
            </div>
            @endif
        </section>
</div>
@endsection
