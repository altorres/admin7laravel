<?php

namespace App\Http\Controllers;

use App\Parametrizacion;
use App\Roles;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ParametrizacionController extends Controller
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
    {   $para=Parametrizacion::first();
        Gate::authorize('haveaccess','Parametrizacion.index');
        //$roles=Roles::orderBy('id','desc')->paginate(2);
        return view('parametrizacion.index',compact('para'));
    }
    public function update(Request $request, $id){

        $parametros=Parametrizacion::where('id',$id);

        $ver=$parametros->first();

        if($request->pp ==1)
        {       $image = $request->file('logoI');


                if($image== null)
                {
                    $ruta=$ver->logoI;
                }
                else{
                    $ruta='imagenes/'.$image->getClientOriginalName();
                    $image->move(public_path('imagenes'), $image->getClientOriginalName());
                }

                //Storage::disk('public')->put('imagenes',$request->file('logoI'));
            $datos=[
              'logoI'=>$ruta,
            ];

        }
        elseif ($request->pp==2)
        {
            $image = $request->file('imagenP');


            $nameL=$request->nameL;
            if($image== null)
            {
                $ruta=$ver->imagenP;
            }
            else{
                $ruta='imagenes/'.$image->getClientOriginalName();
                $image->move(public_path('imagenes'), $image->getClientOriginalName());
            }

            //Storage::disk('public')->put('imagenes',$request->file('logoI'));
            $datos=[
                'imagenP'=>$ruta,
                'nameL'=>$nameL,
            ];
        }
        elseif ($request->pp==3){
            $image = $request->file('imagenS');
            $permitir=$request->mostrarS;
            if($image== null)
            {
                $ruta=$ver->imagenS;
            }
            else{
                $ruta='imagenes/'.$image->getClientOriginalName();
                $image->move(public_path('imagenes'), $image->getClientOriginalName());
            }

            //Storage::disk('public')->put('imagenes',$request->file('logoI'));
            $datos=[
                'imagenP'=>$ruta,
                'nameL'=>$permitir,
            ];
        }


        $parametros->update($datos);
        return redirect()->route('parametrizacion.index')->with('status_success','Parametros Actualizados');;
    }
}
