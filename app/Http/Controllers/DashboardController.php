<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;



class DashboardController extends Controller
{
    public function index(){
         if(Auth::user()->hasRole('Admin')){
             return view("Admin.adminDashboard");
         }elseif (Auth::user()->hasRole('Utilisateur_externe')) {
            return view("Utilisateur_externe.UserDashboard");
         }elseif(Auth::user()->hasRole("Editeur")){
             return view("Editeur.EditeurDashboard");
         }
    }

    public function profile(){
        return view("myprofil");
    }

}
