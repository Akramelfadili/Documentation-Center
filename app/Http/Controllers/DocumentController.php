<?php

namespace App\Http\Controllers;
use App\Models\Modele;
use App\Models\Document;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{
    public function storeDocument(Request $request){
        if(Request::ajax()) {
            //get request
            $request=Request::all();
            $modele=$request["modele"];
            dd($request);
            /* $files=$request["files"];
            $number=count($files);
            for ($i=0; $i <$number ; $i++) { 
                print_r(($files[$i])->extension());
            }  */
            




             /* $modele=$request["modeleName"];
            $classe=$request["classeName"];
            $idArray=$request["idArray"];
            $valueArray=$request["valuesArray"];  */

           
          
     /* 
           // get id of selected model
           $modele_db=DB::table("modeles")->where("model_name",$modele)->first();
           $modele_id=$modele_db->id;
           //get id of selected classe
           $classe_db=DB::table("classe_documents")->where("classe_name",$classe)->first();
           $classe_id=$classe_db->id;
           //add to documents
           $document=new Document;
           $document->modele_id=$modele_id;
           $document->classe_id=$classe_id;
           $document->save(); 
           //document added id
           $documentID=Document::latest()->first();
           //add to intermidiate table doc_meta_vlues
           $tailleIDs=count($idArray);
           $tailleValues=count($valueArray);
           if($tailleIDs == $tailleValues){
               for ($i=0; $i <$tailleIDs ; $i++) { 
                   DB::table("document_metadonnees_values")->insert(["document_id"=>$documentID->id,"metadonnees_id"=>$idArray[$i],"value"=>$valueArray[$i]]);
               }
           }   */
        }
    }
}
