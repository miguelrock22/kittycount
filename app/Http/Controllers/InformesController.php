<?php

namespace App\Http\Controllers;

use Flash,DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformesController extends Controller
{
    public function index(Request $request)
    {
        return view('informes.index');
    }

    public function datatable(){
        
        $reporte = Db::table('prestamos')
            ->join('historiales','prestamos.id','=','historiales.prestamos_id')
            ->join('personas','personas.id','=','prestamos.personas_id')
            ->selectRaw('personas.nombres,prestamos.prestamo,sum(historiales.total_cobrado) as intereses,prestamos.created_at as dia_solicitado')
            ->where('prestamos.estado',1)
            ->groupby('prestamos.id')->get();
        return DataTables::collection($reporte)->editColumn('dia_solicitado', function ($reporte) {
            return with(new Carbon($reporte->dia_solicitado))->format('d-m-Y');
        })->make(true);
    }
}
