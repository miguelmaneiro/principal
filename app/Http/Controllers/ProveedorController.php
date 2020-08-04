<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Http\Requests\ProveedorRequest;
use DB;

class ProveedorController extends Controller
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
                        ->where('tipo_persona', '=', 'Proveedor')
                        ->orwhere('num_documento', '=', $busc)
                        ->where('tipo_persona', '=', 'Proveedor')
                        ->paginate(7);

            return view('almacen/proveedores/proveedores_index', [
                'proveedores' => $personas,
                "searchText" => $busc
            ]);
        }
        else
        {
            return view('almacen/proveedores/proveedores_index', [
                'proveedores' => Persona::where('tipo_persona', '=', 'Proveedor')->paginate(7)
            ]);
        }
    }

    public function show(){

    }

    public function create(Persona $proveedor)
    {
        return view('almacen/proveedores/crear', [ 'proveedor' => new $proveedor
        ]);    
    }

    public function store(ProveedorRequest $request)
    {
        $variable = $request->validated();
 
        $variable["tipo_persona"] = 'Proveedor';

        Persona::create($variable);
        return redirect()->route('proveedores.index')->with('status', 'El proveedor fue creado con éxito!');
    }

    public function edit(Persona $proveedor)
    {
        return view('almacen/proveedores/edit', [ 'proveedor' => $proveedor ]);
    }
    
    public function update(Persona $proveedor, ProveedorRequest $request)
    {
        $variable = $request->validated();
 
        $proveedor->update($variable);
        return redirect()->route('proveedores.index')->with('status', 'El proveedor fue actualizado con éxito!');
    }

    public function destroy(Persona $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index')->with('status', 'El proveedor fue eliminado con éxito!');
    }
}
 