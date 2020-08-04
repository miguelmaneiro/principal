<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ingreso;
use App\Articulo; 
use App\Persona;
use App\detalleIngreso;
use App\Http\Requests\IngresoRequest;
use Carbon\Carbon;

class IngresoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ingresos = Ingreso::with('detalle_ingresos', 'personas')->get();
         $busc = ""; $busc2 = "";
        if (request('searchText'))
        {
            $busc = request('searchText');
            if (is_numeric($busc))
            {
                $ingresos = Ingreso::with('detalle_ingresos','personas')->where('num_comprobante','LIKE',$busc)->paginate(7);
            }
            else
            {
                $ingresos = Ingreso::with('personas', 'detalle_ingresos')->whereHas('personas', function($q) use ($busc){$q->where('nombre','LIKE','%'.$busc.'%');
                })->paginate(7);
            }
        }
        
        return view('almacen/ingresos/ingresos_index', ['ingresos' => $ingresos, 'searchText' => $busc,]);

    }

    public function show($id)
    {
        $ing = Ingreso::find($id);
        
        $ingresos = $ing->with('detalle_ingresos.articulos','personas')->where('idingreso','=', $id)->get();
        
        return view('almacen/ingresos/ingresos_show', ['ingresos' => $ingresos,]);

    }

    public function create(Ingreso $ingresos)
    {
        $articulos = Articulo::select('idarticulo', \DB::raw('CONCAT(codigo, "-", nombre) AS articulo'))->where('estado','=','Activo')->get();
        $personas = Persona::where('tipo_persona', '=', 'Proveedor')->get();
        return view('almacen/ingresos/create', ['ingresos' => new $ingresos, 'articulos' => $articulos, 'idarticulo' => "", 'personas' => $personas, 'idproveedor' => "",]);
    }

    public function store(IngresoRequest $request, Ingreso $ingreso, detalleIngreso $detalle)
    {
        try{
            \DB::beginTransaction();

            $request->validated();
            $fecha = Carbon::now('America/Caracas');

            $ingreso = new Ingreso;
            $ingreso->idproveedor = request('idproveedor');
            $ingreso->tipo_comprobante  = request('tipo_comprobante');
            $ingreso->serie_comprobante  = request('serie_comprobante');
            $ingreso->num_comprobante  = request('num_comprobante');
            $ingreso->impuesto = 12;
            $ingreso->estado = "Aceptado";
            $ingreso->fecha_hora = $fecha->toDateTimeString();
            $ingreso->save();

            $idarticulo = request('idarticulo');
            $cantidad = request('cantidad');
            $precio_compra = request('precio_compra');
            $precio_venta = request('precio_venta');
            $cont = 0;

            while($cont < count($idarticulo))
            {
                $detalle = new detalleIngreso;
                $detalle->idingreso = $ingreso->idingreso;
                $detalle->idarticulo = $idarticulo[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->precio_compra = $precio_compra[$cont];
                $detalle->precio_venta = $precio_venta[$cont];
                $detalle->save();
                $cont = $cont+1;
            }
            \DB::commit();
        }
        catch(\Exception $e)
        {
            \DB::rollback();
        }

        return redirect()->route('ingresos.index')->with('status', 'El ingreso al almacen fue registrado con éxito!');
    }
}
