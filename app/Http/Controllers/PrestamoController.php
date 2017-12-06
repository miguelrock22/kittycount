<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePrestamoRequest;
use App\Http\Requests\UpdatePrestamoRequest;
use App\Repositories\PrestamoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PrestamoController extends AppBaseController
{
    /** @var  PrestamoRepository */
    private $prestamoRepository;

    public function __construct(PrestamoRepository $prestamoRepo)
    {
        $this->prestamoRepository = $prestamoRepo;
    }

    /**
     * Display a listing of the Prestamo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->prestamoRepository->pushCriteria(new RequestCriteria($request));
        $prestamos = $this->prestamoRepository->with('user')->get();
        return view('prestamos.index')
            ->with('prestamos', $prestamos);
    }

    /**
     * Show the form for creating a new Prestamo.
     *
     * @return Response
     */
    public function create()
    {
        return view('prestamos.create');
    }

    /**
     * Store a newly created Prestamo in storage.
     *
     * @param CreatePrestamoRequest $request
     *
     * @return Response
     */
    public function store(CreatePrestamoRequest $request)
    {
        $input = $request->all();
        $input['porcentage'] = 10;
        $input['total_cobrar'] = $input['prestamo'] + ($input['prestamo'] * ($input['porcentage'] / 100 ));
        $input['valor_cuota'] = ($input['prestamo'] * ($input['porcentage'] / 100 ));

        $prestamo = $this->prestamoRepository->create($input);

        Flash::success('Prestamo saved successfully.');

        return redirect(route('prestamos.index'));
    }

    /**
     * Display the specified Prestamo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prestamo = $this->prestamoRepository->findWithoutFail($id);

        if (empty($prestamo)) {
            Flash::error('Prestamo not found');

            return redirect(route('prestamos.index'));
        }

        return view('prestamos.show')->with('prestamo', $prestamo);
    }

    /**
     * Show the form for editing the specified Prestamo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prestamo = $this->prestamoRepository->findWithoutFail($id);

        if (empty($prestamo)) {
            Flash::error('Prestamo not found');

            return redirect(route('prestamos.index'));
        }

        return view('prestamos.edit')->with('prestamo', $prestamo);
    }

    /**
     * Update the specified Prestamo in storage.
     *
     * @param  int              $id
     * @param UpdatePrestamoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePrestamoRequest $request)
    {
        $prestamo = $this->prestamoRepository->findWithoutFail($id);

        if (empty($prestamo)) {
            Flash::error('Prestamo not found');

            return redirect(route('prestamos.index'));
        }

        $prestamo = $this->prestamoRepository->update($request->all(), $id);

        Flash::success('Prestamo updated successfully.');

        return redirect(route('prestamos.index'));
    }

    /**
     * Remove the specified Prestamo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $prestamo = $this->prestamoRepository->findWithoutFail($id);

        if (empty($prestamo)) {
            Flash::error('Prestamo not found');

            return redirect(route('prestamos.index'));
        }

        $this->prestamoRepository->delete($id);

        Flash::success('Prestamo deleted successfully.');

        return redirect(route('prestamos.index'));
    }
}
