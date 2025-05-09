@extends("admin.layout.admin-layout")
@section("title", "Localización GPS")
@section("content")
<section class="management-section">
    <div class="container mt-4">
        <h2>Localización de Vehículos - {{ \Carbon\Carbon::now()->format('Y') }}</h2>
        <div id="map" style="height: 500px;" class="mt-3"></div>
    </div>
</section>

<!-- Leaflet CSS y JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
// Coordenadas de la oficina en Fuengirola para vehículos disponibles
const oficinaCoords = [36.533212, -4.624850];

// Crear el mapa
const map = L.map('map').setView(oficinaCoords, 14);

// Agregar capa de OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

// Array para almacenar los marcadores existentes
let vehiculosEnMapa = [];

// seteamos numero que vamos a asignar a la posición
var num = 0;

async function obtenerVehiculos() {
    // Actualizar la localización del vehículo alquilado
    updateVehiculoAlquilado(num);
    try {
        const response = await axios.get('/api/vehiculos');
        const vehiculos = response.data;

        console.log('Vehículos recibidos:', vehiculos); // Verifica si los datos son correctos

        // Eliminar marcadores existentes antes de actualizar el mapa
        vehiculosEnMapa.forEach(marker => map.removeLayer(marker));
        vehiculosEnMapa = [];

        // Procesar los vehículos
        vehiculos.forEach(vehiculo => {
            console.log('Procesando vehículo:', vehiculo);

            // Comprobar si las coordenadas existen
            let lat = parseFloat(vehiculo.posicion.lat);  // Asegúrate de que las coordenadas sean números
            let lng = parseFloat(vehiculo.posicion.lng);

            // Si el vehículo está disponible, ubicarse en la oficina
            let latLng = (vehiculo.estado === 'disponible')
                ? oficinaCoords  // Si está disponible, usar las coordenadas de la oficina
                : [lat, lng];     // Si es alquilado, usar las coordenadas del vehículo

            // Si el vehículo está alquilado, simula un cambio de ubicación
            if (vehiculo.estado === 'alquilado') {
                // Simulación de cambio de ubicación (por ejemplo, mover un poco las coordenadas)
                latLng = [lat , lng ];
            }

            // Comprobar si el vehículo está alquilado
            const estaAlquilado = vehiculo.estado === 'alquilado';
            const color = estaAlquilado ? 'red' : 'blue';  // Color rojo para vehículos alquilados

            // Crear el popup con la información del vehículo
            const popupContent = estaAlquilado
                ? `<b>Matrícula:</b> ${vehiculo.matricula}<br><b>Estado:</b> Alquilado`
                : `<b>Matrícula:</b> ${vehiculo.matricula}<br><b>Estado:</b> Disponible`;

            // Crear el marcador para el vehículo
            const newMarker = L.circleMarker(latLng, {
                color: color,
                radius: 10,
            }).addTo(map).bindPopup(popupContent);

            // Solo agregar vehículos alquilados al mapa
            if (estaAlquilado) {
                vehiculosEnMapa.push(newMarker);
            }
        });

        // Ajustar el mapa para mostrar todos los vehículos alquilados
        if (vehiculosEnMapa.length > 0) {
            const group = new L.featureGroup(vehiculosEnMapa);
            map.fitBounds(group.getBounds().pad(0.2)); // Ajustar el zoom para ver todos los vehículos alquilados
        }

    } catch (error) {
        console.error('Error al obtener vehículos:', error);
        alert('Error al cargar los vehículos.');
    }
}

// Ejecutar la función al cargar la página
obtenerVehiculos();



// Configurar un intervalo para actualizar los vehículos cada 30 segundos (30000 ms)
setInterval(obtenerVehiculos, 10000);



function updateVehiculoAlquilado(posicion) {
    // Mapa de la ruta del vehículo alquilado
    var rutaAlquilado = [
        {"lat":36.53323561295315, "lon":-4.624730319844311},
        {"lat":36.53321510924789, "lon":-4.62464738759529},
        {"lat":36.533002382985046, "lon":-4.624114707380428},
        {"lat":36.53289104150957, "lon":-4.623947208920594},
        {"lat":36.53222202298592, "lon":-4.624180491715471},
        {"lat":36.53173344866184, "lon":-4.62435215638915},
        {"lat":36.531249037763665, "lon":-4.624549917906045},
        {"lat":36.53158735680573, "lon":-4.625510018173553},
        {"lat":36.531882103249714, "lon":-4.625637606248969},
        {"lat":36.53262024593697, "lon":-4.625200617090668},
        {"lat":36.53323561295315, "lon":-4.624730319844311}
    ];
    url = '/management/vehiculo/12/actualizar-localizacion',
    '/management/vehiculo/10/actualizar-localizacion',
    '/management/vehiculo/11/actualizar-localizacion',
    '/management/vehiculo/13/actualizar-localizacion',
    '/management/vehiculo/14/actualizar-localizacion',
    '/management/vehiculo/15/actualizar-localizacion',
    '/management/vehiculo/16/actualizar-localizacion'

    // method = 'POST';
    axios.post(url, {
        lat: rutaAlquilado[posicion]["lat"],
        lng: rutaAlquilado[posicion]["lon"]
    }, {
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => {
        console.log('Localización actualizada:', response.data);
    })
    .catch(error => {
        console.error('Error al actualizar la localización:', error);
    });

    // Simular el movimiento del vehículo alquilado
    if(num >=9 ){
        num = 0;
    }else{
        num++;
    }
}

</script>
@endsection
