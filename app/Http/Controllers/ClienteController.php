<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (request('searchText'))
        {
            $busc = trim(request('searchText'));
            $personas = Persona::where('nombre', 'LIKE', '%'.$busc.'%')  ///where (nombre and tipo_persona) OR (num_documento and tipo_persona)
                        ->where('nombre', 'LIKE', '%'.$busc.'%')
                        ->where('tipo_persona', '=', 'Cliente')
                        ->orwhere('num_documento', '=', $busc)
                        ->where('tipo_persona', '=', 'Cliente')
                        ->paginate(7);

            return view('ventas/clientes/clientes_index', [
                'clientes' => $personas,
                "searchText" => $busc
            ]);
        }
        else
        {
            return view('ventas/clientes/clientes_index', [
                'clientes' => Persona::where('tipo_persona', '=', 'Cliente')->paginate(7)
            ]);
        }
    }

    public function show(){

    }

    public function create(Persona $cliente)
    {
        return view('ventas/clientes/crear', [ 'cliente' => new $cliente
        ]);    
    }

    public function store(ClienteRequest $request)
    {
        $variable = $request->validated();
 
        $variable["tipo_persona"] = 'Cliente';

        Persona::create($variable);
        return redirect()->route('clientes.index')->with('status', 'El cliente fue creado con éxito!');
    }

    public function edit(Persona $cliente)
    {
        return view('ventas/clientes/edit', 
        [ 'cliente' => $cliente ]);
    }
    
    public function update(Persona $cliente, ClienteRequest $request)
    {
        $variable = $request->validated();
 
        $cliente->update($variable);
        return redirect()->route('clientes.index')->with('status', 'El cliente fue actualizado con éxito!');
    }

    public function destroy(Persona $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('status', 'El cliente fue eliminado con éxito!');
    }
}
