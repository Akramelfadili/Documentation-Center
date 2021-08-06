<?php

namespace App\Http\Controllers;


use App\Models\Modele;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;


class ModeleController extends Controller
{
    public function index(){
        $meta = DB::select("select * from metadonnees ");
        return view("Admin.modeles",['meta' =>$meta]);
    }


   public function store(Request $request){
        if(Request::ajax()) {

            $request=Request::all();
            $name=$request["name"];
            $tableMod=$request["tableau"];
            $tailleTabMo=count($request["tableau"]);
           /*  dump($tailleTabMo);
            dump($tableMod); */
           

             // save modele name 
            $model=new Modele;
            $model->model_name=$name;
            $model->save(); 

                //get (id)model of added model
            $id=Modele::where("model_name",$name)->first();

                //inserer les id de metadonnnes lie au modele
            for ($i=0; $i <$tailleTabMo ; $i++) { 
                DB::table("metadonnees_modele")->insert(["modele_id"=>$id->id,"metadonnees_id"=>$tableMod[$i]]);
            }  
        }
    }
        
    
    public function addDocument(){
            $modele=Modele::all();
            $classes=DB::table("classe_documents")->get();
            $data = array("modele"=>$modele,"classes"=>$classes);
             return view("Editeur.AddDocument")->with($data);
    }
        
   
}
