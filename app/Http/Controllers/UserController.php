<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use Flash, DataTables;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuarios.index');
    }

    public function datatable(Request $request){
        $users = User::all();
        $users->each(function($user) {
            $user->token = csrf_token();
            $user->edit = route("usuarios.edit", [$user->id]);
            $user->show = route("usuarios.show", [$user->id]);
        });
        return DataTables::collection($users)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        if($data['rol_id'] == 1)
            $user->assignRole('Administrador');
        elseif($data['rol_id'] == 2)
            $user->assignRole('Cobrador');

        Flash::success('User saved successfully.');

        return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            Flash::error('user not found');

            return redirect(route('usuarios.index'));
        }

        return view('usuarios.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('roles')->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('usuarios.index'));
        }
        $user->rol_id = $user->roles;

        return view('usuarios.edit')->with('user', $user);
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
        $data = $request->all();
        $user = User::find($id);

        if (empty($user)) {
            Flash::error('Hubo un error guardando el usuario');

            return redirect(route('usuarios.index'));
        }

        $user->name = $data['name'];
        $user->email = $data['email'];

        if(isset($data['change_pass'])){
            $user->password = $data['con_password'];
        }
        $user->removeRole($user->getRoleNames()[0]);
        if($data['rol_id'] == 1)
            $user->assignRole('Administrador');
        elseif($data['rol_id'] == 2)
            $user->assignRole('Cobrador');
        
        $user->save();
        
        Flash::success('Usuario editado correctamente');

        return view('usuarios.index')->with('user', $user);
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
