<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Mascota;
use Carbon\Carbon;
use Illuminate\Http\Request;


class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::all();
        $mascotas = Mascota::all(); 

        $eventos = [];

        foreach ($citas as $cita) {
            $evento = [
                'id' => $cita->id,
                'title' => $cita->mascota->nombre, // Mostrar el nombre de la mascota en lugar del título
                'start' => $cita->inicio,
                'end' => $cita->final
            ];

            array_push($eventos, $evento);
        }

        return view('citas.index', compact('eventos','mascotas'));
    }

    public function create()
    {
        $mascotas = Mascota::all();
        return view('citas.create', compact('mascotas'));
    }

    public function store(Request $request)
{
    // Verificar si la fecha de inicio es posterior a la fecha actual
    $fecha_actual = date('Y-m-d H:i:s');
    if ($request->inicio < $fecha_actual) {
        return redirect()->back()->withErrors(['message' => 'La fecha de inicio debe ser posterior a la fecha actual.']);
    }

    // Verificar si ya existe una cita en la misma fecha y hora
    $cita_existente = Cita::where('inicio', $request->inicio)
        ->where('final', $request->hora)
        ->first();

    if ($cita_existente) {
        return redirect()->back()->withErrors(['message' => 'Ya existe una cita programada para esa fecha y hora.']);
    }

    $cita = new Cita();
    $cita->fill($request->all());
    $cita->reserva = date('Y-m-d H:i:s'); // Guardar la hora de la reserva
    $cita->save();
    return redirect()->route('citas.index');
}


    public function edit(Cita $cita)
    {
        $mascotas = Mascota::all();
        return view('citas.edit', compact('cita', 'mascotas'));
    }

    public function update(Request $request, Cita $cita)
{
    // Verificar si la fecha de inicio es posterior a la fecha actual
    $fecha_actual = date('Y-m-d H:i:s');
    if ($request->inicio < $fecha_actual) {
        return redirect()->back()->withErrors(['message' => 'La fecha de inicio debe ser posterior a la fecha actual.']);
    }

    // Verificar si ya existe una cita en la misma fecha y hora, excepto la cita que se está actualizando
    $cita_existente = Cita::where('inicio', $request->inicio)
        ->where('inicio', $request->hora)
        ->where('id', '<>', $cita->id)
        ->first();

    if ($cita_existente) {
        return redirect()->back()->withErrors(['message' => 'Ya existe una cita programada para esa fecha y hora.']);
    }

    $cita->fill($request->all());
    $cita->reserva = date('Y-m-d H:i:s'); // Actualizar la hora de la reserva
    $cita->save();
    return redirect()->route('citas.index');
}

    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index');
    }
    public function show(Cita $cita)
{
    return view('citas.show', compact('cita'));
}

    public function fullcalendar()
{
    $citas = Cita::select('id', 'inicio as start', 'final as end', 'mascota_id')
                ->with('mascota:id,nombre')
                ->get();

    $eventos = [];

    foreach ($citas as $cita) {
        $eventos[] = [
            'id' => $cita->id,
            'title' => $cita->mascota->nombre,
            'start' => $cita->start,
            'end' => $cita->end,
            'url' => route('citas.show', $cita->id)
        ];
    }

    return response()->json($eventos);
}
public function checkAvailability(Request $request)
{
    $cita_existente = Cita::where('mascota_id', $request->mascota_id)
        ->where('inicio', $request->fecha . ' ' . $request->hora)
        ->first();

    if ($cita_existente) {
        return "false";
    } else {
        return "true";
    }
}
}