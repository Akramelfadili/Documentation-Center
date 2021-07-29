<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClasseDocumentController;


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
require __DIR__.'/auth.php';   

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middlware' => ['auth']],function(){
    Route::get("/dashboard","App\Http\Controllers\DashboardController@index")->name("dashboard");
}); 
                 // User Routes
Route::group(["middleware"=>["auth","role:user"]],function(){
    Route::get("/dashboard/myprofil","App\Http\Controllers\DashboardController@profile")->name("dashboard.myprofil");
});


                // Admin Routes
Route::group(["middleware"=>["auth","role:Admin"]],function(){
    Route::get("/dashboard/admin/editeurs","App\Http\Controllers\UserController@index")->name("dashboard.admin.editeurs");
    Route::get("/admin/editeurs/add",[UserController::class,"create"])->name("admin.add");    //creer editeur
    Route::post("/admin/editeurs/add",[UserController::class,"store"])->name("admin.add");   //ajouter editeur
    Route::get("/delete/{id}",[UserController::class,"destroy"])->name("admin.delete");  //delete editeur
    Route::get("/admin/classDocument",[ClasseDocumentController::class,"index"])->name("admin.classDocument");
    Route::post("/admin/classDocument",[ClasseDocumentController::class,"addClassDocument"])->name("admin.classDocument");
    Route::get("/admin/classDocument/delete/{id}",[ClasseDocumentController::class,"deleteClassDocument"]);
    //Modele
    Route::get("/admin/modele",[ModeleController::class,"index"])->name('admin.modele.index');
    Route::post("/admin/modele",[ModeleController::class,"store"])->name('admin.modele.index');
    
});


