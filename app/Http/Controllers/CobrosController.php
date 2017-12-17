<?php

namespace App\Http\Controllers;

use Flash;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use App\Repositories\PrestamoRepository;
use App\Repositories\HistorialRepository;
use Prettus\Repository\Criteria\RequestCriteria;

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
            ->whereBetween('dia_cobro',$dateBewtween)
            ->orWhere(function ($query) {
                $query->whereBetween('dia_cobro_2', [date('Y-m-d',strtotime("-1 days")),date('Y-m-d',strtotime("+1 days"))]);
            })
            ->with('user')->get();
        return view('cobros.index')
            ->with('prestamos', $prestamos);
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

        $historial = $this->historialRepository->create($input);

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

        if (empty($prestamo)) {
            Flash::error('Prestamo not found');

            return redirect(route('cobros.index'));
        }

        return view('cobros.edit')->with('prestamo', $prestamo);

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
