<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCodeudorRequest;
use App\Http\Requests\UpdateCodeudorRequest;
use App\Repositories\CodeudorRepository;
use App\Repositories\ReferenciaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CodeudorController extends AppBaseController
{
    /** @var  CodeudorRepository */
    private $codeudorRepository;
    private $referenciaRepository;

    public function __construct(CodeudorRepository $codeudorRepo,ReferenciaRepository $refRepo)
    {
        $this->codeudorRepository = $codeudorRepo;
        $this->referenciaRepository = $refRepo;
    }

    /**
     * Display a listing of the Codeudor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->codeudorRepository->pushCriteria(new RequestCriteria($request));
        $codeudores = $this->codeudorRepository->with(['persona'])->get();

        return view('codeudores.index')
            ->with('codeudores', $codeudores);
    }

    /**
     * Show the form for creating a new Codeudor.
     *
     * @return Response
     */
    public function create()
    {
        return view('codeudores.create');
    }

    /**
     * Store a newly created Codeudor in storage.
     *
     * @param CreateCodeudorRequest $request
     *
     * @return Response
     */
    public function store(CreateCodeudorRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('url_cedula')) {
            $input['url_cedula'] = $request->url_cedula->store('images', 'public');
        }
        
        if ($request->hasFile('url_carta_laboral')) {
            $input['url_carta_laboral'] = $request->url_carta_laboral->store('images', 'public');
        }
        
        $codeudor = $this->codeudorRepository->create($input);
        if($codeudor){
            for($i = 1; $i < 3; $i++){
                $this->referenciaRepository->create(array(
                    'nombres' => $input['nombres_pers_'.$i],
                    'telefonos' => $input['telefonos_pers_'.$i],
                    'parentesco' => $input['parentesco_pers_'.$i],
                    'codeudores_id' => $codeudor->id,
                    'personas_id' => null
                ));
            }
            for($i = 1; $i < 3; $i++){
                $this->referenciaRepository->create(array(
                    'nombres' => $input['nombres_fam_'.$i],
                    'telefonos' => $input['telefonos_fam_'.$i],
                    'parentesco' => $input['parentesco_fam_'.$i],
                    'codeudores_id' => $codeudor->id,
                    'personas_id' => null
                ));
            }
        }

        Flash::success('Codeudor saved successfully.');

        return redirect(route('codeudores.index'));
    }

    /**
     * Display the specified Codeudor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $codeudor = $this->codeudorRepository->findWithoutFail($id);

        if (empty($codeudor)) {
            Flash::error('Codeudor not found');

            return redirect(route('codeudores.index'));
        }

        return view('codeudores.show')->with('codeudor', $codeudor);
    }

    /**
     * Show the form for editing the specified Codeudor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $codeudor = $this->codeudorRepository->findWithoutFail($id);

        if (empty($codeudor)) {
            Flash::error('Codeudor not found');

            return redirect(route('codeudores.index'));
        }

        return view('codeudores.edit')->with('codeudor', $codeudor);
    }

    /**
     * Update the specified Codeudor in storage.
     *
     * @param  int              $id
     * @param UpdateCodeudorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCodeudorRequest $request)
    {
        $codeudor = $this->codeudorRepository->findWithoutFail($id);

        if (empty($codeudor)) {
            Flash::error('Codeudor not found');

            return redirect(route('codeudores.index'));
        }

        $codeudor = $this->codeudorRepository->update($request->all(), $id);

        Flash::success('Codeudor updated successfully.');

        return redirect(route('codeudores.index'));
    }

    /**
     * Remove the specified Codeudor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $codeudor = $this->codeudorRepository->findWithoutFail($id);

        if (empty($codeudor)) {
            Flash::error('Codeudor not found');

            return redirect(route('codeudores.index'));
        }

        $this->codeudorRepository->delete($id);

        Flash::success('Codeudor deleted successfully.');

        return redirect(route('codeudores.index'));
    }
}
