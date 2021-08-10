<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Roles;
use App\Permiso;
use App\Parametrizacion;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class permisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
            DB::table('roles_user')->truncate();
            DB::table('permiso_roles')->truncate();
            Permiso::truncate();
            Roles::truncate();
        DB::statement("SET foreign_key_checks=1");

        //admin
        $useradmin=User::where('email','altorres1292@gmail.com')->first();
        if($useradmin)
        {
            $useradmin->delete();
        }else{
            $useradmin= User::create([
                'name' =>'admin',
                'email' => 'altorres1292@gmail.com',
                'password' =>Hash::make('admin')
            ]);
        }

        //$rolAdmin=Roles::where('name','Admin')->first();
        $rolAdmin= Roles::create([
            'name'=>'Admin',
            'slug'=>'admin',
            'descripcion'=>'Administrador',
            'full-access'=>'si',
        ]);

        $useradmin->roles()->sync([$rolAdmin->id]);

       Roles::create([
            'name'=>'Invitado',
            'slug'=>'invitado',
            'descripcion'=>'invitado',
            'full-access'=>'no',
        ]);
       Parametrizacion::create([
            'id'=>1,
            'imagenP'=>"imagenes/imagenP.png",
            'nameL'=>'DEFAULT',
            'imagenS'=>"imagenes/imagenS.png",
            "mostrarS"=>'no',
            'logoI'=>"imagenes/logoI.png",
        ]);

        $permiso_all =[];

        $permiso=Permiso::create([
            'name'=>'Lista rol',
            'slug'=>'roles.index',
            'descripcion'=>'Ver lista de roles',]
        );

        $permiso_all[]=$permiso->id;

        $permiso=Permiso::create([
                'name'=>'Editar rol',
                'slug'=>'roles.edit',
                'descripcion'=>'Editar roles',]
        );

        $permiso_all[]=$permiso->id;
        $permiso=Permiso::create([
                'name'=>'Mostrar roles',
                'slug'=>'roles.show',
                'descripcion'=>'mostrar roles',]
        );

        $permiso_all[]=$permiso->id;
        $permiso=Permiso::create([
                'name'=>'Crear rol',
                'slug'=>'roles.create',
                'descripcion'=>'crear roles roles',]
        );

        $permiso_all[]=$permiso->id;

        $permiso=Permiso::create([
                'name'=>'Eliminar rol',
                'slug'=>'roles.destroy',
                'descripcion'=>'eliminar roles',]
        );
        $permiso_all[]=$permiso->id;

        $permiso=Permiso::create([
                'name'=>'Lista usuarios',
                'slug'=>'user.index',
                'descripcion'=>'Ver lista de user',]
        );

        $permiso_all[]=$permiso->id;

        $permiso=Permiso::create([
                'name'=>'Editar usuario',
                'slug'=>'user.edit',
                'descripcion'=>'Editar user',]
        );

        $permiso_all[]=$permiso->id;

        $permiso=Permiso::create([
                'name'=>'Mostrar usuario',
                'slug'=>'user.show',
                'descripcion'=>'mostrar user',]
        );

        $permiso_all[]=$permiso->id;
        $permiso=Permiso::create([
                'name'=>'Crear usuario',
                'slug'=>'user.create',
                'descripcion'=>'crear usuario',]
        );

        $permiso_all[]=$permiso->id;
        $permiso=Permiso::create([
                'name'=>'Eliminar usuario',
                'slug'=>'user.destroy',
                'descripcion'=>'eliminar usuario',]
        );

        $permiso_all[]=$permiso->id;


        $permiso=Permiso::create([
                'name'=>'Mostrar usuario propio',
                'slug'=>'userown.show',
                'descripcion'=>'mostrar usuario',]
        );

        $permiso_all[]=$permiso->id;

        $permiso=Permiso::create([
                'name'=>'Editar usuario propio',
                'slug'=>'userown.edit',
                'descripcion'=>'Editar usuario propio',]
        );

        $permiso_all[]=$permiso->id;
        $permiso=Permiso::create([
                'name'=>'Lista Parametros',
                'slug'=>'parametrizacion.index',
                'descripcion'=>'Muestra las parametrizaciones del programa',]
        );

        $permiso_all[]=$permiso->id;

        $rolAdmin->permisos()->sync($permiso_all);

    }
}
