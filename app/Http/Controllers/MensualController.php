<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historiales;
use App\Models\Prestamos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MensualController extends Controller
{
    public function index(Request $request){
        $dates = $request->all();
        
        $reporteNoPago = $this->getNoPago($dates);
        $pagos = $this->getPagos($dates);
        //dd($pagos);
        return view('mensual.index')->with(['reporteNoPago' => $reporteNoPago,'pagos'=>$pagos]);
    }

    private function getNoPago($dates){
        $reporteNoPago = Db::table('prestamos')
        ->LeftJoin('historiales','prestamos.id','=','historiales.prestamos_id')
        ->join('personas','personas.id','=','prestamos.personas_id')
        ->selectRaw('personas.nombres,prestamos.prestamo,prestamos.dia_cobro,prestamos.dia_cobro_2,prestamos.valor_cuota,prestamos.valor_cuota_2')
        ->where('personas.user_id',Auth::id())
        ->whereNull('historiales.prestamos_id');
        if(!empty($dates)){
            $reporteNoPago = $reporteNoPago->whereBetween('prestamos.dia_cobro',[$dates['dia_ini'],$dates['dia_fin']])
            ->orWhereBetween('prestamos.dia_cobro_2',[$dates['dia_ini'],$dates['dia_fin']]);
        }
        $reporteNoPago = $reporteNoPago->get();
        if(!empty($dates)){
            foreach($reporteNoPago as $rep){
                if($rep->dia_cobro_2 != null  && $rep->dia_cobro_2 >= $dates['dia_fin']){
                    $rep->dia_cobro_2 = null;
                    $rep->valor_cuota_2 = null;
                }
            }
        }
        return $reporteNoPago;
    }

    private function getPagos($dates){
       $pagos = Db::table('prestamos')
            ->join('historiales','prestamos.id','=','historiales.prestamos_id')
            ->join('personas','personas.id','=','prestamos.personas_id')
            ->selectRaw('personas.nombres,historiales.total_cobrado,historiales.created_at')
            ->where('personas.user_id',Auth::id());
        if(!empty($dates)){
            $pagos = $pagos->whereBetween('historiales.created_at',[$dates['dia_ini'],$dates['dia_fin']]);
        }
        return $pagos->get();
    }
}
