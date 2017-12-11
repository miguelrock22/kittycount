<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PrestamoRepository;
use App\Repositories\HistorialRepository;

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
        $this->prestamoRepository->pushCriteria(new RequestCriteria($request));
        $prestamos = $this->prestamoRepository->with('user')->get();
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
