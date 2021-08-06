<?php

namespace App\Http\Controllers;
use App\Models\Modele;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class DocumentController extends Controller
{
    public function storeDocument(Request $request){
        if(Request::ajax()) {
            $request=Request::all();
            // get id of selected modele
           $modele=$request["modeleName"];
           $modele_db=DB::table("modeles")->where("model_name",$modele)->first();
           $modele_id=$modele_db->id;
           // get id of selected class
           $classe=$request["classeName"];
           $classe_db=DB::table("classe_documents")->where("classe_name",$classe)->first();
           $classe_id=$classe_db->id;
            $data=json_encode($request["formData"]);
            //add to documents Db
            DB::table("documents_tables")->insert(["modele_id"=>$modele_id  ,"classe_id"=>$classe_id,"properties"=>$data]);
            dd($data);             
        }
    }
}
