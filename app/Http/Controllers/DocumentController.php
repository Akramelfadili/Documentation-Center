<?php

namespace App\Http\Controllers;
use App\Models\Modele;
use App\Models\Document; 
use Illuminate\Support\Arr;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;


class DocumentController extends Controller
{
    public function storeDocument(Request $request){
        if(Request::ajax()) {
            $request=Request::all();
            $modele=$request["modeleName"]; //modele name
            $classe=$request["classeName"]; //classe name
            $files=$request["files"]; // files
            $ids=$request["ids"];
            $values=$request["values"];
    
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
            //add to intermidiate table doc_meta_vluesP
            $tailleIds=count($ids);
            $tailleValues=count($values);
             if($tailleIds == $tailleValues){
                for ($i=0; $i <$tailleIds ; $i++) { 
                    DB::table("document_metadonnees_values")->insert(["document_id"=>$documentID->id,"metadonnees_id"=>$ids[$i],"value"=>$values[$i]]);
                }
            }   

            //add files to database and filepath to storage place
            $number=count($files);
            for ($i=0; $i <$number ; $i++) { 
                $fileName=$files[$i]->getClientOriginalName();
                $filePath = $files[$i]->storeAs('uploads', $fileName, 'public');
                $path='/storage/app/public/uploads/'.$filePath;
                DB::table("files")->insert(["document_id"=>$modele_id,"name"=>$fileName,"file_path"=>$path]);
            }  
           
            
            
        }
    }

    public function showDocuments(){
        $documents=Document::get();     //get all docments
        $values=DB::table("document_metadonnees_values")->get();   // get values to show them based on documents details
        $files=DB::table("files")->get();
        return view("editeur.showDocuments",["documents"=>$documents,"values"=>$values,"files"=>$files]);
    }
}
