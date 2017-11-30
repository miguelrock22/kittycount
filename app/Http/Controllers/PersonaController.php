<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;
use App\Repositories\PersonaRepository;
use App\Repositories\ReferenciaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PersonaController extends AppBaseController
{
    /** @var  PersonaRepository */
    private $personaRepository;
    private $referenciaRepository;

    public function __construct(PersonaRepository $personaRepo,ReferenciaRepository $refRepo)
    {
        $this->personaRepository = $personaRepo;
        $this->referenciaRepository = $refRepo;
    }

    /**
     * Display a listing of the Persona.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->personaRepository->pushCriteria(new RequestCriteria($request));
        $personas = $this->personaRepository->all();

        return view('personas.index')
            ->with('personas', $personas);
    }

    /**
     * Show the form for creating a new Persona.
     *
     * @return Response
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Store a newly created Persona in storage.
     *
     * @param CreatePersonaRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonaRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $refs = array();
        $persona = $this->personaRepository->create($input);
        
        if($persona){
            for($i = 1; $i < 3; $i++){
                $this->referenciaRepository->create(array(
                    'nombres' => $input['nombres_pers_'.$i],
                    'telefonos' => $input['telefonos_pers_'.$i],
                    'parentesco' => $input['parentesco_pers_'.$i],
                    'personas_id' => $persona->id,
                    'codeudores_id' => null
                ));
            }
            for($i = 1; $i < 3; $i++){
                $this->referenciaRepository->create(array(
                    'nombres' => $input['nombres_fam_'.$i],
                    'telefonos' => $input['telefonos_fam_'.$i],
                    'parentesco' => $input['parentesco_fam_'.$i],
                    'personas_id' => $persona->id,
                    'codeudores_id' => null
                ));
            }
        }
            
        Flash::success('Persona saved successfully.');

        return redirect(route('personas.index'));
    }

    /**
     * Display the specified Persona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('Persona not found');

            return redirect(route('personas.index'));
        }

        return view('personas.show')->with('persona', $persona);
    }

    /**
     * Show the form for editing the specified Persona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('Persona not found');

            return redirect(route('personas.index'));
        }

        return view('personas.edit')->with('persona', $persona);
    }

    /**
     * Update the specified Persona in storage.
     *
     * @param  int              $id
     * @param UpdatePersonaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonaRequest $request)
    {
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('Persona not found');

            return redirect(route('personas.index'));
        }

        $persona = $this->personaRepository->update($request->all(), $id);

        Flash::success('Persona updated successfully.');

        return redirect(route('personas.index'));
    }

    /**
     * Remove the specified Persona from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('Persona not found');

            return redirect(route('personas.index'));
        }

        $this->personaRepository->delete($id);

        Flash::success('Persona deleted successfully.');

        return redirect(route('personas.index'));
    }
}
