<?php

namespace App\Http\Controllers;
use App\Models\Modele;
use App\Models\Document; 
use Illuminate\Support\Arr;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;




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
            
            //get last added document

            //add files to database and filepath to storage place
            $number=count($files);
            for ($i=0; $i <$number ; $i++) { 
                $fileName=$files[$i]->getClientOriginalName();
                $filePath = $files[$i]->storeAs('uploads', $fileName, 'public');
                $path='/storage/app/public/uploads/'.$filePath;
                DB::table("files")->insert(["document_id"=>$documentID->id,"name"=>$fileName,"file_path"=>$path]);
            }    
        }
    }

    public function showDocuments(){
        //$documents=Document::paginate(3);     //get all docments
        $documents=Document::get();     //get all docments
        $values=DB::table("document_metadonnees_values")->get();   // get values to show them based on documents details
        $files=DB::table("files")->get();
        return view("editeur.showDocuments",["documents"=>$documents,"values"=>$values,"files"=>$files]);
    }

    public function searchDocuments(Request $request){
        if(Request::ajax()) {
            $request=Request::all();
            $val=$request["search"];
            $rows=DB::table("document_metadonnees_values")->where("value","LIKE","%".$val."%")->select("document_id")->get();  //all document ids where value corresponde
           return Response($rows);
        }
    }

   public function editDocument($id){
      // $doc=Document::find($id);
       $doc=Document::find($id);
       $array =[];  // aray of metadonnes associated with chosen document
       $arrayMetaIDs=[];
       $metaDocument=$doc->metadonneesData;
       for ($i=0; $i <count($metaDocument) ; $i++) { 
           array_push($array,$metaDocument[$i]->name); 
           array_push($arrayMetaIDs,$metaDocument[$i]->id);
       }
       //dd($arrayMetaIDs);
       $values=DB::table("document_metadonnees_values")->where("document_id",$id)->select("value")->get(); // get all values of document selected
        return view("Editeur.editDocument",["values"=>$values,"array"=>$array,"IDS"=>$arrayMetaIDs,"document_id"=>$id]);
    }
        //save edited document data
    public function storeDocumentEdited(Request $request){
        if(Request::ajax()){
            $request=Request::all();
            $ids=$request["ids"];
            $values=$request["values"];
            $doc_id=$request["id_doc"];
           //dd($values[0]);
            for ($i=0; $i <count($ids); $i++) { 
               DB::table("document_metadonnees_values")
                            ->where([
                                ["document_id",(int)$doc_id],
                                ["metadonnees_id",(int)$ids[$i]]
                            ])
                            ->update(["value"=>$values[$i]]);
            }  

        }
    }
}
