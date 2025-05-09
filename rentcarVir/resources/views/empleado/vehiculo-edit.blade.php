@extends(Auth::user()->utenteable_type == "Admin" ? "admin.layout.admin-layout" : "empleado.layout.empleado-layout")
@section("title", "Vehículo - Modificar")

@push('javascript')
    <script src="{{ asset('js/image-edit.js') }}"></script>
@endpush

@section("content")
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <p>¡ATENCIÓN! Se han producido los siguientes errores:</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card shadow-lg" style="border-radius: 15px; overflow: hidden; transition: transform 0.3s ease-in-out;">
                    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #1e3d58; color: white;">
                        <h2 class="mb-0">Modificar Vehículo</h2>
                        <a href="{{ route('vehiculo.index') }}" class="btn btn-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-arrow-left-circle-fill me-1" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                            </svg>
                            Regresar
                        </a>
                    </div>

                    <div class="card-body" style="background-color: #f9f9f9;">
                        <form action="{{ route('vehiculo.update', $vehiculo) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="matricula" class="form-label" style="color: #4CAF50;">Matrícula:</label>
                                <input type="text" id="matricula" name="matricula" class="form-control w-50" value="{{ $vehiculo->matricula }}" style="transition: border-color 0.3s;">
                            </div>

                            <div class="mb-3">
                                <label for="modelo" class="form-label" style="color: #4CAF50;">Modelo:</label>
                                <input type="text" id="modelo" name="modelo" class="form-control w-50" value="{{ $vehiculo->modelo }}" style="transition: border-color 0.3s;">
                            </div>

                            <div class="mb-3">
                                <label for="marca" class="form-label" style="color: #4CAF50;">Marca:</label>
                                <input type="text" id="marca" name="marca" class="form-control w-50" value="{{ $vehiculo->marca }}" style="transition: border-color 0.3s;">
                            </div>

                            <div class="mb-3">
                                <label for="motor" class="form-label" style="color: #4CAF50;">Motor:</label>
                                <input type="text" id="motor" name="motor" class="form-control w-50" value="{{ $vehiculo->motor }}" readonly style="background-color: #e9ecef;">
                            </div>

                            <div class="mb-3">
                                <label for="cambio" class="form-label" style="color: #4CAF50;">Cambio:</label>
                                <select id="cambio" name="cambio" class="form-select w-50">
                                    <option value="Automatico" {{ $vehiculo->cambio == 'Automatico' ? 'selected' : '' }}>Automático</option>
                                    <option value="Manual" {{ $vehiculo->cambio == 'Manual' ? 'selected' : '' }}>Manual</option>
                                </select>
                            </div>

                            <!-- Añadir efectos de hover a las entradas y botones -->
                            <div class="mb-3">
                                <label for="equipamiento" class="form-label" style="color: #4CAF50;">Equipamiento:</label>
                                <input type="text" id="equipamiento" name="equipamiento" class="form-control w-50" value="{{ $vehiculo->equipamiento }}" style="transition: border-color 0.3s;">
                            </div>

                            <div class="mb-3">
                                <label for="puertas" class="form-label" style="color: #4CAF50;">Puertas:</label>
                                <select id="puertas" name="puertas" class="form-select w-50">
                                    <option value="4" {{ $vehiculo->puertas == '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ $vehiculo->puertas == '5' ? 'selected' : '' }}>5</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="asientos" class="form-label" style="color: #4CAF50;">Asientos:</label>
                                <select id="asientos" name="asientos" class="form-select w-50">
                                    @for ($i = 2; $i <= 9; $i++)
                                        <option value="{{ $i }}" {{ $vehiculo->asientos == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="autonomia" class="form-label" style="color: #4CAF50;">Autonomía:</label>
                                <div class="input-group w-50 mx-auto">
                                    <input type="number" id="autonomia" name="autonomia" class="form-control" step="0.01" value="{{ $vehiculo->autonomia }}">
                                    <span class="input-group-text">km</span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="color" class="form-label" style="color: #4CAF50;">Color:</label>
                                <input type="text" id="color" name="color" class="form-control w-50" value="{{ $vehiculo->color }}" style="transition: border-color 0.3s;">
                            </div>

                            <div class="mb-3">
                                <label for="emision" class="form-label" style="color: #4CAF50;">Disponibilidad desde:</label>
                                <input type="date" id="emision" name="emision" class="form-control w-50" value="{{ $vehiculo->emision }}">
                            </div>

                            <div class="mb-3">
                                <label for="vencimiento" class="form-label" style="color: #4CAF50;">Disponibilidad hasta:</label>
                                <input type="date" id="vencimiento" name="vencimiento" class="form-control w-50" value="{{ $vehiculo->vencimiento }}">
                            </div>

                            <div class="mb-3">
                                <label for="costoDiario" class="form-label" style="color: #4CAF50;">Costo diario:</label>
                                <div class="input-group w-50 mx-auto">
                                    <input type="number" id="costoDiario" name="costoDiario" class="form-control" step="0.01" value="{{ $vehiculo->costoDiario }}">
                                    <span class="input-group-text">€</span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label" style="color: #4CAF50;">Descripción: (opcional)</label>
                                <textarea id="descripcion" name="descripcion" class="form-control w-100">{{ $vehiculo->descripcion }}</textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="reset" class="btn btn-secondary" style="transition: background-color 0.3s;">Reiniciar</button>
                                <button type="submit" class="btn btn-primary" style="transition: background-color 0.3s;">Modificar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
