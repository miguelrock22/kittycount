<?php

namespace App\Http\Controllers;

use Flash, Carbon\Carbon;
use App\Models\Prestamo;
use App\Models\Historial;
use Illuminate\Http\Request;
use App\Repositories\PrestamoRepository;
use App\Repositories\HistorialRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Support\Facades\Auth;

class CobrosController extends Controller
{

    /** @var  PrestamoRepository */
    private $prestamoRepository;
    /** @var  HistorialRepository */
    private $historialRepository;

    public function __construct(PrestamoRepository $prestamoRepo,HistorialRepository $historialRepo)
    {
        $this->prestamoRepository = $prestamoRepo;
        $this->historialRepository = $historialRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dateBewtween = [date('Y-m-d',strtotime("-1 days")),date('Y-m-d',strtotime("+1 days"))];
        $this->prestamoRepository->pushCriteria(new RequestCriteria($request));
        $prestamos = Prestamo::where('estado',1)
            ->where('users_id',Auth::id())
            ->whereBetween('dia_cobro',$dateBewtween)
            ->orWhere(function ($query) {
                $query->whereBetween('dia_cobro_2', [date('Y-m-d',strtotime("-1 days")),date('Y-m-d',strtotime("+1 days"))]);
            })->get();
        $abonos = Historial::where('abono',1)
            ->whereBetween('dia_cobro_abono',$dateBewtween)->get();
        return view('cobros.index')
            ->with(['prestamos'=> $prestamos,'abonos'=>$abonos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function liquidacion(){
        $historial = Historial::where('users_id',Auth::id())->whereDate('created_at',Carbon::now()->format('Y-m-d'))->get();
        return view('cobros.liquidacion')->with('historial', $historial);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $prestamo = $this->prestamoRepository->findWithoutFail($input['prestamos_id']);
        $prestamo->dia_cobro = $prestamo->dia_cobro->addMonths(1);
        $prestamo->save();

        if(isset($input['abono']))
            $input['deuda_abono'] = $prestamo->valor_cuota - $input['total_cobrado'];
        else
            $input['deuda_abono'] = 0;

            
        $historial = $this->historialRepository->create($input);
        if(isset($input['historial_id'])){
            $his = $this->historialRepository->findWithoutFail($input['historial_id']);
            $his->dia_cobro_abono = null;
            $his->save();
        }

        $prestamo = $this->prestamoRepository->findWithoutFail($input['prestamos_id']);

        Flash::success('Historial saved successfully.');

        return redirect(route('cobros.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestamo = $this->prestamoRepository->findWithoutFail($id);
        $historial = Historial::where('prestamos_id',$id)->get();
        $his_id = null;
        foreach($historial as $h){
            $prestamo->valor_cuota -= $h->total_cobrado;
            $his_id = $h->id; 
        }

        if (empty($prestamo)) {
            Flash::error('Prestamo not found');

            return redirect(route('cobros.index'));
        }

        return view('cobros.edit')->with(['prestamo'=> $prestamo,'historial_id'=>$his_id]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
