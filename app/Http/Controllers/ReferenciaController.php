<?php

namespace App\Http\Controllers;

use Response;
use Flash, DataTables;
use App\Models\Referencia;
use Illuminate\Http\Request;
use App\Repositories\ReferenciaRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateReferenciaRequest;
use App\Http\Requests\UpdateReferenciaRequest;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Support\Facades\Auth;

class ReferenciaController extends AppBaseController
{
    /** @var  ReferenciaRepository */
    private $referenciaRepository;

    public function __construct(ReferenciaRepository $referenciaRepo)
    {
        $this->referenciaRepository = $referenciaRepo;
    }

    /**
     * Display a listing of the Referencia.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->referenciaRepository->pushCriteria(new RequestCriteria($request));
        
        return view('referencias.index');
    }

    /**
     * Show the form for creating a new Referencia.
     *
     * @return Response
     */
    public function create()
    {
        return view('referencias.create');
    }

    public function datatable(Request $request) {
        $u_id = Auth::id();
        $referencias = Referencia::with(['persona','codeudor'])->whereHas('persona',function($query) use ($u_id){
            $query->where('user_id',$u_id);
        })->orWhereHas('codeudor',function($query) use ($u_id){
            $query->where('user_id',$u_id);
        })->get();
        $referencias->each(function($referencia) {
            $referencia->action = route("referencias.destroy", [$referencia->id]);
            $referencia->token = csrf_token();
            $referencia->edit = route("referencias.edit", [$referencia->id]);
            $referencia->show = route("referencias.show", [$referencia->id]);
        });
        return DataTables::collection($referencias)->make(true);
    }

    /**
     * Store a newly created Referencia in storage.
     *
     * @param CreateReferenciaRequest $request
     *
     * @return Response
     */
    public function store(CreateReferenciaRequest $request)
    {
        $input = $request->all();

        $referencia = $this->referenciaRepository->create($input);

        Flash::success('Referencia saved successfully.');

        return redirect(route('referencias.index'));
    }

    /**
     * Display the specified Referencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $referencia = $this->referenciaRepository->findWithoutFail($id);

        if (empty($referencia)) {
            Flash::error('Referencia not found');

            return redirect(route('referencias.index'));
        }

        return view('referencias.show')->with('referencia', $referencia);
    }

    /**
     * Show the form for editing the specified Referencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $referencia = $this->referenciaRepository->findWithoutFail($id);

        if (empty($referencia)) {
            Flash::error('Referencia not found');

            return redirect(route('referencias.index'));
        }

        return view('referencias.edit')->with('referencia', $referencia);
    }

    /**
     * Update the specified Referencia in storage.
     *
     * @param  int              $id
     * @param UpdateReferenciaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReferenciaRequest $request)
    {
        $referencia = $this->referenciaRepository->findWithoutFail($id);

        if (empty($referencia)) {
            Flash::error('Referencia not found');

            return redirect(route('referencias.index'));
        }

        $referencia = $this->referenciaRepository->update($request->all(), $id);

        Flash::success('Referencia updated successfully.');

        return redirect(route('referencias.index'));
    }

    /**
     * Remove the specified Referencia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $referencia = $this->referenciaRepository->findWithoutFail($id);

        if (empty($referencia)) {
            Flash::error('Referencia not found');

            return redirect(route('referencias.index'));
        }

        $this->referenciaRepository->delete($id);

        Flash::success('Referencia deleted successfully.');

        return redirect(route('referencias.index'));
    }
}
