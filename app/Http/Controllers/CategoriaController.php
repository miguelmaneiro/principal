<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{ 
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if (request('searchText'))
        {
            $query = trim(request('searchText'));
            return view('almacen/categorias/categorias_index', [
                'categorias' => Categoria::where('nombre', 'LIKE', '%'.$query.'%')->where('condicion', '=', '1')->paginate(7),
                "searchText" => $query
            ]);
        }
        else
        {
            return view('almacen/categorias/categorias_index', [
                'categorias' => Categoria::where('condicion', '=', '1')->paginate(7)
            ]);
        }
    }

    public function show(){

    }

    public function create(Categoria $categoria)
    {
        return view('almacen/categorias/crear', [ 'categorias' => new $categoria
        ]);    
    }

    public function store(CategoriaRequest $request)
    {
        $variable = $request->validated();
 
        $variable["condicion"] = 1;

        Categoria::create($variable);
        return redirect()->route('categorias.index')->with('status', 'La categoría fue creada con éxito!');
    }

    public function edit(Categoria $categoria)
    {
        return view('almacen/categorias/edit', [ 'categorias' => $categoria
        ]);
    }
    
    public function update(Categoria $categoria, CategoriaRequest $request)
    {
        $variable = $request->validated();
 
        $categoria->update($variable);
        return redirect()->route('categorias.index')->with('status', 'La categoría fue modificada con éxito!');
    }

    public function destroy(Categoria $categoria)
    {
        $var1["condicion"] = 0;
  
        $categoria->update($var1);
        return redirect()->route('categorias.index')->with('status', 'La categoría fue eliminada con éxito!');
    }

}
