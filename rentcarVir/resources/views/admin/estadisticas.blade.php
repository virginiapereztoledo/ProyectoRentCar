@extends("admin.layout.admin-layout")
@section("title", "Estadísticas")
@section("content")
<section class="management-section">
    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <h2>Resumen de Alquileres {{ \Carbon\Carbon::today()->year }}</h2>
        </div>

        <div class="row">
            <!-- Columna de la tabla -->
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Mes</th>
                            <th>Vehículos Alquilados</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Enero</td>
                                <td>{{ $value[0] }}</td>
                            </tr>
                            <tr>
                                <td>Febrero</td>
                                <td>{{ $value[1] }}</td>
                            </tr>
                            <tr>
                                <td>Marzo</td>
                                <td>{{ $value[2] }}</td>
                            </tr>
                            <tr>
                                <td>Abril</td>
                                <td>{{ $value[3] }}</td>
                            </tr>
                            <tr>
                                <td>Mayo</td>
                                <td>{{ $value[4] }}</td>
                            </tr>
                            <tr>
                                <td>Junio</td>
                                <td>{{ $value[5] }}</td>
                            </tr>
                            <tr>
                                <td>Julio</td>
                                <td>{{ $value[6] }}</td>
                            </tr>
                            <tr>
                                <td>Agosto</td>
                                <td>{{ $value[7] }}</td>
                            </tr>
                            <tr>
                                <td>Septiembre</td>
                                <td>{{ $value[8] }}</td>
                            </tr>
                            <tr>
                                <td>Octubre</td>
                                <td>{{ $value[9] }}</td>
                            </tr>
                            <tr>
                                <td>Noviembre</td>
                                <td>{{ $value[10] }}</td>
                            </tr>
                            <tr>
                                <td>Diciembre</td>
                                <td>{{ $value[11] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Columna para el gráfico -->
            <div class="col-md-6">
                <canvas id="estadisticasChart" width="400" height="400"></canvas>
            </div>
        </div>



    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById('estadisticasChart').getContext('2d');
        const estadisticasChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                datasets: [{
                    label: 'Vehículos Alquilados',
                    data: @json($value),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    });
</script>
@endpush
