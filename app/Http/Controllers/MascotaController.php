<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Mascota;
use Illuminate\Http\Request;


class MascotaController extends Controller
{
    public function index(Request $request)
    { $search = $request->input('search');
        $mascotas = Mascota::where('nombre', 'like', '%'.$search.'%')->get();
        return view('mascotas.index', compact('mascotas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('mascotas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $mascota = new Mascota();
        $mascota->fill($request->all());
        $mascota->save();
        return redirect()->route('mascotas.index');
    }

    public function edit($id)
    {
        $mascota = Mascota::find($id);
        $clientes = Cliente::all();
        return view('mascotas.edit', compact('mascota', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $mascota = Mascota::find($id);
        $mascota->fill($request->all());
        $mascota->save();
        return redirect()->route('mascotas.index');
    }

    public function destroy($id)
    {
        $mascota = Mascota::find($id);
        $mascota->delete();
        return redirect()->route('mascotas.index');
    }
}