<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('/person',function (Request $request){

    try{
        $data=$request->all();
        $api_key=$data['api_key'];
        $confKey=env('APP_KEY');

        if($confKey==$api_key){
            $dataReturn=  DB::table('users')->select('id','name', 'email','password')->get();
            return $dataReturn;
        }
        abort(404);
    }catch (Exception $e) {
        abort(404);
    }
});