<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database con los datos del volcado SQL.
     */
    public function run(): void
    {
        // --- CLIENTES ---
        DB::table('cliente')->insert([
            ['id' => 1, 'nombre' => 'cliente', 'apellidos' => 'cliente', 'domicilio' => 'calle fuengirola', 'ocupacion' => 'Estudiante', 'fechaNacimiento' => '1995-01-01', 'foto' => 'storage/cliente/1.png'],
            ['id' => 4946, 'nombre' => 'clienteuno', 'apellidos' => 'clienteuno', 'domicilio' => 'sin', 'ocupacion' => 'No especificado', 'fechaNacimiento' => '2000-10-10', 'foto' => 'storage/cliente/4946.png'],
            ['id' => 4947, 'nombre' => 'prueba', 'apellidos' => 'prueba', 'domicilio' => 'prueba', 'ocupacion' => 'Empleado', 'fechaNacimiento' => '2000-10-10', 'foto' => 'storage/cliente/4947.png'],
            ['id' => 4948, 'nombre' => 'Estrella', 'apellidos' => 'Estella', 'domicilio' => 'fuengirola', 'ocupacion' => 'Estudiante', 'fechaNacimiento' => '1990-08-19', 'foto' => 'storage/cliente/4948.png'],
            ['id' => 4949, 'nombre' => 'Virginia', 'apellidos' => 'Virginia', 'domicilio' => 'Malaga', 'ocupacion' => 'No especificado', 'fechaNacimiento' => '1992-05-16', 'foto' => 'storage/cliente/4949.png'],
            ['id' => 4950, 'nombre' => 'estrella', 'apellidos' => 'M a', 'domicilio' => 'rio tinto', 'ocupacion' => 'No especificado', 'fechaNacimiento' => '1990-08-19', 'foto' => '../storage/persona.png'],
        ]);

        // --- EMPLEADOS ---
        DB::table('empleado')->insert([
            ['id' => 1, 'nombre' => 'empleado', 'apellidos' => 'empleado', 'foto' => 'storage/empleado/1.png'],
            ['id' => 4885, 'nombre' => 'virginia', 'apellidos' => 'perez', 'foto' => 'storage/empleado/4885.png'],
            ['id' => 4886, 'nombre' => 'TestdosTestdos', 'apellidos' => 'TestdosTestdos', 'foto' => 'storage/empleado/4886.png'],
        ]);

        DB::table('usuario')->insert([
            [
                'id' => 1,
                'username' => 'clientecliente',
                'password' => '$2y$12$5RvB7MQf.DorHHpHYbFfBOIINt.mdUscvK7cxufr5T9UpDVQqk.ry',
                'remember_token' => Str::random(10),
                'utenteable_id' => 1,
                'utenteable_type' => 'App\Models\Cliente'
            ],
            [
                'id' => 2,
                'username' => 'empleadoempleado',
                'password' => '$2y$12$uN9JBXy3D2P9xW/m8uRHIOUUjG882u3qRMWgPnCzhhVX33cvMKqgO',
                'remember_token' => Str::random(10),
                'utenteable_id' => 1,
                'utenteable_type' => 'App\Models\Empleado'
            ],
            [
                'id' => 3,
                'username' => 'adminadmin',
                'password' => '$2y$12$wP95JGorgZsdJlct7ppPB.3q4K/BrxhJmf5rk6fzgnSlSDMPTmMi.',
                'remember_token' => Str::random(10),
                'utenteable_id' => null,
                'utenteable_type' => 'Admin'
            ],
            [
                'id' => 4981,
                'username' => 'Virginia1',
                'password' => '$2y$12$BiCI4DuvN7zoeBumJLeUx.rAVzbYIKp2c0svhTPhPbztyoSIyL7rm',
                'remember_token' => Str::random(10),
                'utenteable_id' => 4885,
                'utenteable_type' => 'App\Models\Empleado'
            ],
            [
                'id' => 4982,
                'username' => 'TestdosTestdos',
                'password' => '$2y$12$Sg57rN4884WaFgq44wOOZuOsX/uV6TCXuAXFESBRrUZTZysvVRyu6',
                'remember_token' => Str::random(10),
                'utenteable_id' => 4886,
                'utenteable_type' => 'App\Models\Empleado'
            ],
            [
                'id' => 4983,
                'username' => 'Clienteuno',
                'password' => '$2y$12$xg2RDLrCdwWqt6AH2J8lk.MvfO2C8al41LUT8nz65kR1BIZa4YAQS',
                'remember_token' => Str::random(10),
                'utenteable_id' => 4946,
                'utenteable_type' => 'App\Models\Cliente'
            ],
            [
                'id' => 4984,
                'username' => 'Prueba2025',
                'password' => '$2y$12$i5tl4YdARpN9TSGmtXQa4O0Ji4wSZ3vf.dWEUBYWsXK/cqxN5n3zm',
                'remember_token' => Str::random(10),
                'utenteable_id' => 4947,
                'utenteable_type' => 'App\Models\Cliente'
            ],
            [
                'id' => 4985,
                'username' => 'Estrella1',
                'password' => '$2y$12$Z88JL3IjWtUrK5er3NCUb.V8UK0z5Gc75HpwZKKgWaKvTI9DAAZL6',
                'remember_token' => Str::random(10),
                'utenteable_id' => 4948,
                'utenteable_type' => 'App\Models\Cliente'
            ],
            [
                'id' => 4986,
                'username' => 'Virginia12',
                'password' => '$2y$12$2Kk.e.X9xkrFkFvA3JEucuSWx761r6VomlnC.3H5iWi6BTZFTeL1a',
                'remember_token' => Str::random(10),
                'utenteable_id' => 4949,
                'utenteable_type' => 'App\Models\Cliente'
            ],
            [
                'id' => 4987,
                'username' => 'emalors90',
                'password' => '$2y$12$K82SOq9YPBQGOi/U33c7ceRP2r19piqRrY/ri8c.Cj7dLVEtp5jVO',
                'remember_token' => Str::random(10),
                'utenteable_id' => 4950,
                'utenteable_type' => 'App\Models\Cliente'
            ],
        ]);



        DB::table('vehiculo')->insert([
            [
                'id' => 10,
                'matricula' => '2222AAA',
                'modelo' => 'Yaris Hybrid',
                'marca' => 'Toyota',
                'motor' => 'Hibrido',
                'cambio' => 'Automatico',
                'equipamiento' => 'Navegador',
                'puertas' => '4',
                'asientos' => '5',
                'autonomia' => 600.00,
                'color' => 'Blanco',
                'foto' => 'storage/vehiculo/10.png',
                'descripcion' => 'El Toyota Yaris Hybrid es un coche compacto ideal para ciudad, gracias a su tamaño reducido y su eficiencia energética. Perfecto para quienes buscan comodidad, sostenibilidad y tecnología en sus desplazamientos diarios o vacaciones.',
                'disponible' => 1,
                'emision' => '2025-04-15',
                'vencimiento' => '2026-04-15',
                'costoDiario' => 90.00,
                'created_at' => '2025-04-15 18:48:43',
                'updated_at' => '2025-04-15 18:48:43',
                'lat' => null,
                'lng' => null
            ],
            [
                'id' => 11,
                'matricula' => '2222BBB',
                'modelo' => 'Ioniq Hybrid',
                'marca' => 'Hyundai',
                'motor' => 'Hibrido',
                'cambio' => 'Automatico',
                'equipamiento' => 'Control crucero adaptativo, pantalla táctil, sensores',
                'puertas' => '5',
                'asientos' => '5',
                'autonomia' => 900.00,
                'color' => 'Gris plata',
                'foto' => 'storage/vehiculo/11.png',
                'descripcion' => 'El Hyundai Ioniq Hybrid destaca por su eficiencia y confort, ideal para viajes largos o uso diario con bajo consumo y etiqueta ECO.',
                'disponible' => 1,
                'emision' => '2025-04-15',
                'vencimiento' => '2026-04-15',
                'costoDiario' => 85.00,
                'created_at' => '2025-04-15 18:56:07',
                'updated_at' => '2025-04-17 09:04:15',
                'lat' => null,
                'lng' => null
            ],
            [
                'id' => 12,
                'matricula' => '3333CCC',
                'modelo' => 'Clio E-Tech',
                'marca' => 'Renault',
                'motor' => 'Hibrido',
                'cambio' => 'Automatico',
                'equipamiento' => 'Pantalla táctil, modos de conducción, sensores de aparcamiento',
                'puertas' => '5',
                'asientos' => '5',
                'autonomia' => 800.00,
                'color' => 'Rojo',
                'foto' => 'storage/vehiculo/12.png',
                'descripcion' => 'El Renault Clio E-Tech Hybrid ofrece una conducción ágil y eficiente, ideal para quienes buscan un coche moderno, cómodo y económico.',
                'disponible' => 0,
                'emision' => '2025-04-15',
                'vencimiento' => '2026-04-15',
                'costoDiario' => 75.00,
                'created_at' => '2025-04-15 18:58:26',
                'updated_at' => '2025-04-17 09:09:11',
                'lat' => null,
                'lng' => null
            ],
            [
                'id' => 13,
                'matricula' => '4444DDD',
                'modelo' => 'Niro Hybrid',
                'marca' => 'Kia',
                'motor' => 'Hibrido',
                'cambio' => 'Automatico',
                'equipamiento' => 'Navegador, cámara trasera, control de crucero',
                'puertas' => '5',
                'asientos' => '5',
                'autonomia' => 999.00,
                'color' => 'Azul oscuro',
                'foto' => 'storage/vehiculo/13.png',
                'descripcion' => 'El Kia Niro Hybrid es un SUV compacto con tecnología híbrida eficiente, amplio espacio y excelente visibilidad.',
                'disponible' => 1,
                'emision' => '2025-04-15',
                'vencimiento' => '2026-04-15',
                'costoDiario' => 95.00,
                'created_at' => '2025-04-15 19:00:58',
                'updated_at' => '2025-04-16 12:12:32',
                'lat' => null,
                'lng' => null
            ],
            [
                'id' => 14,
                'matricula' => '5555EEE',
                'modelo' => 'C-HR Hybrid',
                'marca' => 'Toyota',
                'motor' => 'Hibrido',
                'cambio' => 'Automatico',
                'equipamiento' => 'Climatizador, sensores traseros',
                'puertas' => '5',
                'asientos' => '5',
                'autonomia' => 700.00,
                'color' => 'Negro',
                'foto' => 'storage/vehiculo/14.png',
                'descripcion' => 'El Toyota C-HR Hybrid combina diseño vanguardista con rendimiento eficiente, ideal para conductores urbanos que valoran el estilo y la tecnología.',
                'disponible' => 1,
                'emision' => '2025-05-01',
                'vencimiento' => '2026-05-01',
                'costoDiario' => 88.00,
                'created_at' => now(),
                'updated_at' => now(),
                'lat' => 36.5328,
                'lng' => -4.6240
            ],
            [
                'id' => 15,
                'matricula' => '6666FFF',
                'modelo' => 'Jazz Hybrid',
                'marca' => 'Honda',
                'motor' => 'Hibrido',
                'cambio' => 'Automatico',
                'equipamiento' => 'Pantalla multimedia, cámara trasera',
                'puertas' => '5',
                'asientos' => '5',
                'autonomia' => 650.00,
                'color' => 'Gris oscuro',
                'foto' => 'storage/vehiculo/15.png',
                'descripcion' => 'El Honda Jazz Hybrid ofrece versatilidad, consumo eficiente y amplitud, perfecto para uso diario en ciudad con etiqueta ECO.',
                'disponible' => 1,
                'emision' => '2025-05-01',
                'vencimiento' => '2026-05-01',
                'costoDiario' => 78.00,
                'created_at' => now(),
                'updated_at' => now(),
                'lat' => 36.5331,
                'lng' => -4.6225
            ],
            [
                'id' => 16,
                'matricula' => '7777GGG',
                'modelo' => 'Corolla Hybrid',
                'marca' => 'Toyota',
                'motor' => 'Hibrido',
                'cambio' => 'Automatico',
                'equipamiento' => 'Asistente de carril, climatizador, pantalla táctil',
                'puertas' => '5',
                'asientos' => '5',
                'autonomia' => 750.00,
                'color' => 'Plata',
                'foto' => 'storage/vehiculo/16.png',
                'descripcion' => 'El Toyota Corolla Hybrid ofrece un equilibrio perfecto entre eficiencia, confort y tecnología, ideal tanto para ciudad como para carretera.',
                'disponible' => 1,
                'emision' => '2025-05-01',
                'vencimiento' => '2026-05-01',
                'costoDiario' => 82.00,
                'created_at' => now(),
                'updated_at' => now(),
                'lat' => 36.5340,
                'lng' => -4.6250
            ]
        ]);


        // --- ALQUILERES ---
        DB::table('alquiler')->insert([
            ['id' => 7, 'fechaRecogida' => '2025-07-16', 'lugarRecogida' => 'Fuengirola', 'horaRecogida' => '08:00', 'fechaEntrega' => '2025-07-18', 'lugarEntrega' => 'Fuengirola', 'horaEntrega' => '08:00', 'importe' => 95.00, 'activo' => 0, 'clienteID' => 1, 'vehiculoID' => 13],
            ['id' => 8, 'fechaRecogida' => '2025-06-25', 'lugarRecogida' => 'Fuengirola', 'horaRecogida' => '08:00', 'fechaEntrega' => '2025-06-28', 'lugarEntrega' => 'Fuengirola', 'horaEntrega' => '08:00', 'importe' => 75.00, 'activo' => 1, 'clienteID' => 4948, 'vehiculoID' => 12],

        ]);
    }
}
