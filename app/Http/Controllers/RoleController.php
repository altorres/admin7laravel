<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use App\Permiso;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
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
    {
        Gate::authorize('haveaccess','roles.index');
        $roles=Roles::orderBy('id','desc')->paginate(2);
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess','roles.create');
        $permisos= Permiso::get();
        return view('role.create',compact('permisos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('haveaccess','roles.create');
         $request->validate([
             'name'=>'required|max:50|unique:roles,name',
             'slug'=>'required|max:50|unique:roles,slug',
             'full-access'=>'required|in:si,no',
         ]);


         $role =Roles::create($request->all());


         if($request->permiso){

             $role->permisos()->sync($request->permiso);
         }

        return redirect()->route('role.index')->with('status_success','Rol guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Roles $role)
    {
        Gate::authorize('haveaccess','roles.show');
        $permiso_role=[];

        foreach ($role->permisos as $permiso){
            $permiso_role[]=$permiso->id;
        }
        $permisos= Permiso::get();

        return view('role.view',compact('permisos','role','permiso_role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Roles $role)
    {
        Gate::authorize('haveaccess','roles.edit');
        $permiso_role=[];

        foreach ($role->permisos as $permiso){
            $permiso_role[]=$permiso->id;
        }
        $permisos= Permiso::get();

        return view('role.edit',compact('permisos','role','permiso_role'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $role)
    {
        Gate::authorize('haveaccess','roles.edit');
        $request->validate([
            'name'=>'required|max:50|unique:roles,name,'.$role->id,
            'slug'=>'required|max:50|unique:roles,slug,'.$role->id,
            'full-access'=>'required|in:si,no',
        ]);


        $role->update($request->all());


        if($request->permiso){

            $role->permisos()->sync($request->permiso);
        }

        return redirect()->route('role.index')->with('status_success','Rol actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $role)
    {
        Gate::authorize('haveaccess','roles.destroy');
        $role->delete();

        return redirect()->route('role.index')->with('status_success','Rol eliminado con exito');

    }
}
