<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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
        // main page for log in or Registration
Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */
    
 Route::group(['middlware' => ['auth']],function(){
    Route::get("/dashboard","App\Http\Controllers\DashboardController@index")->name("dashboard");
}); 
        // Profil for Users
Route::group(["middleware"=>["auth","role:user"]],function(){
    Route::get("/dashboard/myprofil","App\Http\Controllers\DashboardController@profile")->name("dashboard.myprofil");
});

/* Route::get("/dashboard/Roles",[DashboardController::class,'Affection_Role'])->middlware(["auth"])->name("dashboard.roles"); */

Route::group(["middleware"=>["auth","role:Admin"]],function(){
    Route::get("/dashboard/roles","App\Http\Controllers\DashboardController@Admin_Role")->name("dashboard.roles");
});

require __DIR__.'/auth.php';
