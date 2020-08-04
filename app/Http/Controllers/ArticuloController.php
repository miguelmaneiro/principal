<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Articulo;
use App\Categoria;
use App\Http\Requests\ArticuloRequest;

//use Illuminate\Support\Facades\Input;  //para permitir subir archivos al servidor


class ArticuloController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $busc = 0;
        $busc2 = "";
        $articulos = Articulo::all();
        $categorias = Categoria::where('condicion', '=', '1')->get();



        if (request('idcategoria'))
        {
            $busc = request('idcategoria');
            $articulos = Articulo::where('idcategoria','=', $busc)->with('categoria')->paginate(7);
        }
        if (request('searchText'))
        {
            $busc2 = request('searchText');
            echo "busc2: ".$busc2;
            $articulos = Articulo::where('nombre', 'LIKE', '%'.$busc2.'%')->orwhere('codigo','LIKE','%'.$busc2.'%')->paginate(7);
        }

        return view('almacen/articulos/articulos_index', [
            'categorias' => $categorias,
            'articulos' => $articulos,
            'searchTxt' => $busc2,
            'idcategoria' => $busc,
        ]);
    }

    public function show(){

    }

    public function create(Articulo $articulos)
    {
        $categorias = Categoria::where('condicion', '=', '1')->get();
        
        return view('almacen/articulos/crear', [ 
            'categorias'  =>  $categorias,
            'articulos' => new $articulos,
            'idcategoria' => 0,
        ]); 
    }

    public function store(ArticuloRequest $request)
    {
        $request->validated();
        $datos['imagen'] = "";
        if($request->imagenInput)
        {
            $file = $request->imagenInput;
            $file->move('img/articulos/',$file->getClientOriginalName());
            $datos['imagen'] = $file->getClientOriginalName();
        }

        $datos['idcategoria'] = $request->idcategoria;
        $datos['codigo'] = $request->codigo;
        $datos['nombre'] = $request->nombre;
        $datos['stock'] = $request->stock;
        $datos['descripcion'] = $request->descripcion;
        $datos['estado'] = "Activo";
        
        Articulo::create($datos);
       
        return redirect()->route('articulos.index')->with('status', 'El artículo fue agregado con éxito!');
    }

    public function edit(Articulo $articulo)
    {       
        $categorias = Categoria::where('condicion', '=', '1')->get();

        return view('almacen/articulos/edit', [ 
            'articulos' => $articulo,
            'categorias' => $categorias,
            'idcategoria' => $articulo->idcategoria,
        ]);
    }
    
    public function update(ArticuloRequest $request, Articulo $articulo)
    {
        $datos['idarticulo'] = $request->idarticulo;
        $request->validated();
        $datos['imagen'] = $request->imagen;
        if($request->imagenInput)
        {   
            $file = $request->imagenInput;
            $file->move('img/articulos/',$file->getClientOriginalName());
            $datos['imagen'] = $file->getClientOriginalName();
        }

        $datos['idcategoria'] = $request->idcategoria;
        $datos['codigo'] = $request->codigo;
        $datos['nombre'] = $request->nombre;
        $datos['stock'] = $request->stock;
        $datos['descripcion'] = $request->descripcion;
        $datos['estado'] = "Activo";
        
        $articulo->update($datos);
       
        return redirect()->route('articulos.index')->with('status', 'El artículo fue modificado con éxito!');

    }

    public function destroy(Articulo $articulo)
    {
        $datos['estado'] = "Inactivo";

        $articulo->update($datos);
        
       return redirect()->route('articulos.index')->with('status', 'El artículo fue eliminado con éxito!');
    }


}
