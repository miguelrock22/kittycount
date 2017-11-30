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
        $personas = $this->personaRepository->with('user')->get();

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
        $validatedData = $request->validate([
            'cedula' => 'required|unique:personas',
            'nombres' => 'required',
            'direccion_casa' => 'required',
            'direccion_trabajo' => 'required',
            'oficio' => 'required',
            'telefono' => 'required',
            'celular' => 'required',
            'url_cedula' => 'required',
            'url_carta_laboral' => 'required',
        ]);

        $input = $request->all();
        $refs = array();
        $data = $this->setPersona($request);
        $persona = $this->personaRepository->create($data);

        if($persona){
            for($i = 1; $i < 3; $i++){
                $this->referenciaRepository->create(array(
                    'nombres' => $input['nombres_pers_'.$i],
                    'telefonos' => $input['telefonos_pers_'.$i],
                    'parentesco' => $input['parentesco_pers_'.$i],
                    'persona_id' => $persona->id,
                    'codeudores_id' => null
                ));
            }
            for($i = 1; $i < 3; $i++){
                $this->referenciaRepository->create(array(
                    'nombres' => $input['nombres_fam_'.$i],
                    'telefonos' => $input['telefonos_fam_'.$i],
                    'parentesco' => $input['parentesco_fam_'.$i],
                    'persona_id' => $persona->id,
                    'codeudores_id' => null
                ));
            }
        }
        Flash::success('Persona registrada correctamente.');
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

    private function setPersona($request) {

        $url_cedula = null;
        if ($request->hasFile('url_cedula')) {
            $url_cedula = $this->guardarArchivo($request->file('url_cedula'));
        }

        $url_carta_laboral = null;
        if ($request->hasFile('url_carta_laboral')) {
            $url_carta_laboral = $this->guardarArchivo($request->file('url_carta_laboral'));
        }

        return [
            'cedula' => $request->cedula,
            'nombres' => $request->nombres,
            'direccion_casa' => $request->direccion_casa,
            'direccion_trabajo' => $request->direccion_trabajo,
            'oficio' => $request->oficio,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'url_cedula' => $url_cedula,
            'url_carta_laboral' => $url_carta_laboral,
            'user_id' => Auth::id()
        ];
    }
}
