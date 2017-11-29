<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHistorialRequest;
use App\Http\Requests\UpdateHistorialRequest;
use App\Repositories\HistorialRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class HistorialController extends AppBaseController
{
    /** @var  HistorialRepository */
    private $historialRepository;

    public function __construct(HistorialRepository $historialRepo)
    {
        $this->historialRepository = $historialRepo;
    }

    /**
     * Display a listing of the Historial.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->historialRepository->pushCriteria(new RequestCriteria($request));
        $historiales = $this->historialRepository->all();

        return view('historiales.index')
            ->with('historiales', $historiales);
    }

    /**
     * Show the form for creating a new Historial.
     *
     * @return Response
     */
    public function create()
    {
        return view('historiales.create');
    }

    /**
     * Store a newly created Historial in storage.
     *
     * @param CreateHistorialRequest $request
     *
     * @return Response
     */
    public function store(CreateHistorialRequest $request)
    {
        $input = $request->all();

        $historial = $this->historialRepository->create($input);

        Flash::success('Historial saved successfully.');

        return redirect(route('historiales.index'));
    }

    /**
     * Display the specified Historial.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $historial = $this->historialRepository->findWithoutFail($id);

        if (empty($historial)) {
            Flash::error('Historial not found');

            return redirect(route('historiales.index'));
        }

        return view('historiales.show')->with('historial', $historial);
    }

    /**
     * Show the form for editing the specified Historial.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $historial = $this->historialRepository->findWithoutFail($id);

        if (empty($historial)) {
            Flash::error('Historial not found');

            return redirect(route('historiales.index'));
        }

        return view('historiales.edit')->with('historial', $historial);
    }

    /**
     * Update the specified Historial in storage.
     *
     * @param  int              $id
     * @param UpdateHistorialRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHistorialRequest $request)
    {
        $historial = $this->historialRepository->findWithoutFail($id);

        if (empty($historial)) {
            Flash::error('Historial not found');

            return redirect(route('historiales.index'));
        }

        $historial = $this->historialRepository->update($request->all(), $id);

        Flash::success('Historial updated successfully.');

        return redirect(route('historiales.index'));
    }

    /**
     * Remove the specified Historial from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $historial = $this->historialRepository->findWithoutFail($id);

        if (empty($historial)) {
            Flash::error('Historial not found');

            return redirect(route('historiales.index'));
        }

        $this->historialRepository->delete($id);

        Flash::success('Historial deleted successfully.');

        return redirect(route('historiales.index'));
    }
}
