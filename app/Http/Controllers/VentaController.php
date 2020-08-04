<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Venta;
use App\Articulo; 
use App\Persona;
use App\detalleVenta;
use App\Http\Requests\VentaRequest;
use Carbon\Carbon;


class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $ventas = Venta::with('detalle_ventas', 'personas')->get();
         $busc = ""; $busc2 = "";
        if (request('searchText'))
        {
            $busc = request('searchText');
            if (is_numeric($busc))
            {
                $ventas = Venta::with('detalle_ventas','personas')->where('num_comprobante','LIKE',$busc)->paginate(7);
            }
            else
            {
                $ventas = Venta::with('personas', 'detalle_ventas')->whereHas('personas', function($q) use ($busc){$q->where('nombre','LIKE','%'.$busc.'%');
                })->paginate(7);
            }
        }
        
        return view('ventas/ventas/ventas_index', ['ventas' => $ventas, 'searchText' => $busc, ]);

    }

    public function show($id)
    {
        $ing = Venta::find($id);
        
        $ventas = $ing->with('detalle_ventas.articulos','personas')->where('idventa','=', $id)->get();
        
        return view('ventas/ventas/ventas_show', ['ventas' => $ventas,]);

    }

    public function create(Venta $ventas)
    {
        $articulos = Articulo::select('idarticulo', \DB::raw('CONCAT(codigo, "-", nombre) AS articulo'))->where('estado','=','Activo')->get();
        $personas = Persona::where('tipo_persona', '=', 'Cliente')->get();
        $preciosArticulos = \DB::table('V_detalle_ventas')->get();
        return view('ventas/ventas/create', ['ventas' => new $ventas, 'articulos' => $articulos, 'idarticulo' => "", 'personas' => $personas, 'idcliente' => "", 'preciosArticulos' => $preciosArticulos]);
    }

    public function store(VentaRequest $request, Venta $venta, detalleVenta $detalle)
    {
        try{
            \DB::beginTransaction();
            $request->validated();
            $fecha = Carbon::now('America/Caracas');

            $venta = new Venta;
            $venta->idcliente = request('idcliente');
            $venta->tipo_comprobante  = request('tipo_comprobante');
            $venta->serie_comprobante  = request('serie_comprobante');
            $venta->num_comprobante  = request('num_comprobante');
            $venta->impuesto = 12;
            $venta->estado = "Aceptado";
            $venta->fecha_hora = $fecha->toDateTimeString();
            $venta->save();

            $idarticulo = request('idarticulo');
            $cantidad = request('cantidad');
            $descuento = request('descuento');
            $precio_venta = request('precio_venta');
            $cont = 0;

            while($cont < count($idarticulo))
            {
                $detalle = new detalleVenta;
                $detalle->idventa = $venta->idventa;
                $detalle->idarticulo = $idarticulo[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->precio_venta = $precio_venta[$cont];
                $detalle->descuento = $descuento[$cont];
                $detalle->save();
                $cont = $cont+1;
            }
            \DB::commit();
        }
        catch(\Exception $e)
        {
            \DB::rollback();
        }

        return redirect()->route('ventas.index')->with('status', 'La venta fue registrada con éxito!');
    }

}
