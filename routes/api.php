<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistroTorneoController;
use App\Http\Controllers\TorneoController;
use App\Models\RegistroTorneo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = $request->user();
    $dbUser = User::with("roles.permissions")->find($user->id);
    return $dbUser;
});

//ruta publica
//Route::post('/login',[User::class,'login']);

// proteger las rutas
Route::group(['middleware'=>['auth:sanctum']], function () {
    /*Route::get('/test', function (){
        return 'token';
    });*/

    Route::post("/torneo/",[TorneoController::class,'store']);
    Route::get("/torneo/",[TorneoController::class,'index']);
    Route::match(['PUT','PATCH'],"/torneo/{id}",[TorneoController::class,'update']);
    Route::delete("/torneo/{id}",[TorneoController::class,'destroy']);
    Route::get("/torneo/{id}",[TorneoController::class,'show']);

    Route::post("/registroTorneo/",[RegistroTorneoController::class,'store']);
    Route::get("/registroTorneo/",[RegistroTorneoController::class,'index']);
    Route::match(['PUT','PATCH'],"/registroTorneo/{id}",[RegistroTorneoController::class,'update']);
    Route::delete("/registroTorneo/{id}",[RegistroTorneoController::class,'destroy']);
    Route::get("/registroTorneo/{id}",[RegistroTorneoController::class,'show']);
});


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');



