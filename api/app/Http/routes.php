<?php
const API_PREFIX = '/1.0';
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

use App\Task;
use Illuminate\Http\Request;

/**
 * Вывести список всех задач
 */
Route::get(API_PREFIX.'/test/{x}/res/{y}', function ($t, $r) {
    $tmp = (object)['a'=>'April', 'o'=>"O'Neil", 't'=>$t, 'r'=>$r];

    return response()->json($tmp);
});

Route::get(API_PREFIX.'/auth_fb/{t}', 'AuthFacebookController@debugAuthFB');

/**
 * Удалить существующую задачу
 */
Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/');
});