<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Vehiculo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;

class AlquilerController extends Controller
{
    public function mostrar()
    {
        $alquiler = Alquiler::where("clienteID", Auth::user()->utenteable->id)
            ->where("activo", true)
            ->first();

        return view("cliente.cliente-alquiler", ["alquiler" => $alquiler]);
    }

    public function store(Request $request)
    {
        if (Gate::denies('doesntHaveAlquiler')) {
            return redirect()->route('catalogo')->withErrors(['error' => '¡Ya tienes un alquiler activo!']);
        }

        if (
            $request->has('id') && $request->has('fechaRecogida') && $request->has('lugarRecogida') &&
            $request->has('horaRecogida') && $request->has('fechaEntrega') && $request->has('lugarEntrega') &&
            $request->has('horaEntrega')
        ) {
            $request['id'] = Crypt::decrypt($request['id']);
            $request['fechaRecogida'] = Crypt::decrypt($request['fechaRecogida']);
            $request['lugarRecogida'] = Crypt::decrypt($request['lugarRecogida']);
            $request['horaRecogida'] = Crypt::decrypt($request['horaRecogida']);
            $request['fechaEntrega'] = Crypt::decrypt($request['fechaEntrega']);
            $request['lugarEntrega'] = Crypt::decrypt($request['lugarEntrega']);
            $request['horaEntrega'] = Crypt::decrypt($request['horaEntrega']);

            $vehiculo = Vehiculo::find($request->id);

            if ($vehiculo) {
                $importe = $vehiculo->costoDiario * date_diff(
                    date_create($request->fechaRecogida),
                    date_create($request->fechaEntrega)
                )->days;

                $vehiculo->alquiler()->create([
                    "clienteID" => Auth::user()->utenteable->id,
                    "fechaRecogida" => $request->fechaRecogida,
                    "lugarRecogida" => $request->lugarRecogida,
                    "horaRecogida" => $request->horaRecogida,
                    "fechaEntrega" => $request->fechaEntrega,
                    "lugarEntrega" => $request->lugarEntrega,
                    "horaEntrega" => $request->horaEntrega,
                    "importe" => $importe,
                    "activo" => true
                ]);

                // Marcar vehículo como no disponible
                $vehiculo->disponible = false;
                $vehiculo->save();

                return redirect()->route("cliente.alquiler")->with("reserva_confirmada", [
                    'vehiculo' => $vehiculo->modelo,
                    'fechaInicio' => $request->fechaRecogida,
                    'fechaFin' => $request->fechaEntrega,
                    'importe' => $importe,
                ]);


            } else {
                return redirect()->route("catalogo")->withErrors("error", "Vehículo no encontrado");
            }
        } else {
            return redirect()->route("catalogo")->withErrors("error", "Datos de solicitud incompletos");
        }
    }

    public function eliminar($id)
    {
        $alquiler = Alquiler::where('id', $id)
            ->where('clienteID', Auth::user()->utenteable->id)
            ->where('activo', true)
            ->firstOrFail();

        // Cancelar el alquiler
        $alquiler->activo = false;
        $alquiler->save();

        // Marcar vehículo como disponible
        $vehiculo = $alquiler->vehiculo;
        if ($vehiculo) {
            $vehiculo->disponible = true;
            $vehiculo->save();
        }

        return redirect()->route('cliente.alquiler')->with('success', 'Reserva eliminada correctamente.');
    }

    public function mostrarAlquilerdelaño()
    {
        $alquileres = Alquiler::where('activo', true)->get();
        return view('empleado.alquiler-index', ['alquileres' => $alquileres]);
    }

    public function obtenerAlquilerMensual($month)
    {
        $year = Carbon::today()->year;
        $startDate = Carbon::parse($year . "-" . $month)->startOfMonth()->format("Y-m-d");
        $endDate = Carbon::parse($year . "-" . $month)->endOfMonth()->format("Y-m-d");

        return Alquiler::where('activo', true)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween("fechaRecogida", [$startDate, $endDate])
                    ->orWhereBetween("fechaEntrega", [$startDate, $endDate])
                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where("fechaRecogida", "<", $startDate)
                              ->where("fechaEntrega", ">", $endDate);
                    });
            })
            ->get();
    }

    public function mostrarAlquileresMensual(Request $request)
    {
        $mes = $request->input('mes');

        $alquileres = Alquiler::with(['vehiculo', 'cliente.usuario']) // Asegura las relaciones
            ->when($mes > 0, function ($query) use ($mes) {
                return $query->whereMonth('fechaRecogida', $mes)
                             ->orWhereMonth('fechaEntrega', $mes);
            })
            ->orderBy('fechaRecogida', 'asc')
            ->get();

        return view('empleado.alquiler-index', ['alquileres' => $alquileres]);
    }


   public function getEstadisticas()
{
    // Obtener los alquileres mensuales
    $array = [];
    for ($month = 1; $month <= 12; $month++) {
        $array[$month - 1] = count($this->obtenerAlquilerMensual($month));
    }

    // Obtener los vehículos activos (disponibles)
    $vehiculosActivos = Vehiculo::where('disponible', 1)->get();

    // Pasar los datos a la vista
    return view("admin.estadisticas", [
        "value" => $array,
        "vehiculosActivos" => $vehiculosActivos  // Asegúrate de pasar esta variable
    ]);
}

    public function devolverAlquiler(Request $request, $id)
{
    $alquiler = Alquiler::findOrFail($id);

    // Verificar si ya se ha registrado la devolución
    if ($alquiler->fechaDevolucion) {
        return redirect()->back()->with('success', 'La devolución ya ha sido registrada.');
    }

    // Validar la fecha de devolución
    $request->validate([
        'fecha_devolucion' => 'required|date|after_or_equal:fechaRecogida',
    ]);

    // Guardar la fecha de devolución
    $alquiler->fechaDevolucion = $request->input('fecha_devolucion');
    $alquiler->activo = false;  // Marcar el alquiler como no activo
    $alquiler->save();

    // Marcar el vehículo como disponible nuevamente
    $vehiculo = $alquiler->vehiculo;
    if ($vehiculo) {
        $vehiculo->disponible = true;  // Cambiar la disponibilidad del vehículo
        $vehiculo->save();
    }

    // Redirigir con mensaje de éxito
    return redirect()->route('alquiler.index')->with('success', 'Devolución registrada correctamente y vehículo disponible para alquiler.');
}

public function registrarRecogidaReal(Request $request, $id)
{
    $alquiler = Alquiler::findOrFail($id);

    if ($alquiler->fechaRecogidaReal) {
        return redirect()->back()->with('success', 'La recogida real ya ha sido registrada.');
    }

    $request->validate([
        'fecha_hora_recogida_real' => 'required|date',
    ]);

    $alquiler->fechaRecogidaReal = $request->input('fecha_hora_recogida_real');
    $alquiler->save();

    return redirect()->route('alquiler.index')->with('success', 'Recogida real registrada correctamente el ' . \Carbon\Carbon::parse($alquiler->fechaRecogidaReal)->format('d-m-Y H:i'));

}


}
