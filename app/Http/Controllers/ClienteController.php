<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index(Request $request)
{
    $query = $request->input('query');

    if ($query) {
        $clientes = Cliente::where('nombres', 'LIKE', "%$query%")
                            ->orWhere('documento_identidad', 'LIKE', "%$query%")
                            ->get();
    } else {
        $clientes = Cliente::all();
    }

    return view('clientes.index', compact('clientes', 'query'));
}

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $cliente = new Cliente([
            'documento_identidad' => $request->get('documento_identidad'),
            'nombres' => $request->get('nombres'),
            'apellidos' => $request->get('apellidos'),
            'numero_celular' => $request->get('numero_celular'),
            'email' => $request->get('email'),
        ]);

        $cliente->save();

        return redirect('/clientes')->with('success', 'Cliente creado!');
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);

        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        $cliente->documento_identidad = $request->get('documento_identidad');
        $cliente->nombres = $request->get('nombres');
        $cliente->apellidos = $request->get('apellidos');
        $cliente->numero_celular = $request->get('numero_celular');
        $cliente->email = $request->get('email');

        $cliente->save();   

        return redirect('/clientes')->with('success', 'Cliente actualizado!');
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();

        return redirect('/clientes')->with('success', 'Cliente eliminado!');
    }
}
