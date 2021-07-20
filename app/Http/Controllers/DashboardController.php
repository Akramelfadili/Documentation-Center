<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
         if(Auth::user()->hasRole('Admin')){
             return view("Admin.adminDashboard");
         }elseif (Auth::user()->hasRole('user')) {
            return view("User_Extern.UserDashboard");
         }elseif(Auth::user()->hasRole("Editeur")){
             return view("User_Editeur.EditeurDashboard");
         }
    }

    public function profile(){
        return view("myprofil");
    }

    public function Admin_Role(){
        return "Hello here you add New Editeur Role";
    }
}
