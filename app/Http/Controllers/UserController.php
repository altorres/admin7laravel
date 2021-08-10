<?php

namespace App\Http\Controllers;

use App\Permiso;
use App\Roles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $this->authorize('haveaccess',['user.index','user.password']);
        $users=User::with('roles')->orderBy('id','desc')->paginate(6);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess','user.create');
        $roles= Roles::orderby('name','asc')->get();
        return view('user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:100',
            'email'=>'required|max:50|unique:users,email',
            'password'=>'required|max:50|confirmed',

        ]);

        //$user=User::create($request->all());
        $user= User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($request->roles){

            $user->roles()->sync($request->roles);


        }

        return redirect()->route('user.index')->with('status_success','Usuario Agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view',[$user,['user.show','userown.show']]);
        $roles= Roles::orderby('name','asc')->get();

        return view('user.view',compact('roles','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update',[$user,['user.edit','userown.edit']]);
        $roles= Roles::orderby('name','asc')->get();

        return view('user.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $request->validate([
            'name'=>'required|max:50|unique:users,name,'.$user->id,
            'email'=>'required|max:50|unique:users,email,'.$user->id,

        ]);


        $user->update($request->all());

        $user->roles()->sync($request->roles);


        return redirect()->route('user.index')->with('status_success','Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('haveaccess','user.destroy');

        $user->delete();

        return redirect()->route('user.index')->with('status_success','Usuario eliminado con exito');
        //
    }
    public function password($id, Request $request){

        $request->validate([
            'password'=>'required|max:50|confirmed',

        ]);
        User::where('id',$id)->update(['password' => Hash::make($request->password),]);

        return redirect()->route('user.index')->with('status_success','Cambio de Contraseña exitoso');
    }
}
