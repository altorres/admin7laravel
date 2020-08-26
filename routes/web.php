<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Roles;
use App\Permiso;
use Illuminate\Support\Facades\Gate;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/parametrizacion/index', 'ParametrizacionController@index')->name('parametrizacion.index');
Route::post('/parametrizacion/update/{id}', 'ParametrizacionController@update')->name('parametrizacion.update');

Route::resource('/role', 'RoleController')->names('role');
Route::post('user/password/{id}','UserController@password')->name('user.password');
Route::resource('/user', 'UserController')->names('user');

Route::get('/test', function () {

    $user=User::find(2);

    //$user->roles()->sync([2]);
    Gate::authorize('haveaccess','roles.index');
   // return $user->havePermisos('roles.index');

    return $user;
});




