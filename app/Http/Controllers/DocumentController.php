<?php

namespace App\Http\Controllers;
use App\Models\Modele;
use App\Models\Document; 
use Illuminate\Support\Arr;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;




class DocumentController extends Controller
{
    public function storeDocument(Request $request){
        if(Request::ajax()) {

            $request=Request::all();
             //dd($request);
            
            $modele=$request["modeleName"]; //modele name
            $classe=$request["classeName"]; //classe name
            echo $classe;
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
                $path='/storage/app/public/'.$filePath;
                DB::table("files")->insert(["document_id"=>$documentID->id,"name"=>$fileName,"file_path"=>$path]);
            }  

            return response()->json(array("success"=>true));        
        }
    }

    public function showDocuments(){
        //$documents=Document::paginate(5);     //get all docments
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
       $doc=Document::find($id);
       $array =[];  // aray of metadonnes associated with chosen document
       $arrayMetaIDs=[];
       $metaDocument=$doc->metadonneesData;
       for ($i=0; $i <count($metaDocument) ; $i++) { 
           array_push($array,$metaDocument[$i]->name); 
           array_push($arrayMetaIDs,$metaDocument[$i]->id);
       }
       $classe_doc = $doc->class->id;
       $classes= DB::table("classe_documents")->get();
       $values=DB::table("document_metadonnees_values")->where("document_id",$id)->select("value")->get(); // get all values of document selected
        return view("Editeur.editDocument",["values"=>$values,"array"=>$array,"IDS"=>$arrayMetaIDs,"document_id"=>$id,"classe_doc"=>$classe_doc,"classes"=>$classes]);
    }

        //  save edited document data
    public function storeDocumentEdited(Request $request){
        if(Request::ajax()){
            $request=Request::all();
           // $classe=$request["classe"];
            $ids=$request["ids"];
            $values=$request["values"];
            $doc_id=$request["id_doc"];
            
            $classe_id= DB::table("classe_documents")->where("classe_name",$request["classe"])->select("id")->get();
             Document::where("id",(int)$doc_id)->update(["classe_id" => $classe_id[0]->id]);

              for ($i=0; $i <count($ids); $i++) { 
               DB::table("document_metadonnees_values")
                            ->where([
                                ["document_id",(int)$doc_id],
                                ["metadonnees_id",(int)$ids[$i]]
                            ])
                            ->update(["value"=>$values[$i]]);
                }   

         /*    return redirect("/editeur/Documents")->with("success","Document has been edited"); */
         return response()->json(array("success"=>true));     
        }
    }



                                                    // USER functions


    public function searchDocument(){
        return view("Utilisateur_Externe.Recherche_doc");
    }



    public function viewDocuments(Request $request){
        if(Request::ajax()){
            $request= Request::all();
           // dd($request);
            $tab_document_ids=[];
            $value=$request["value"];

            // retreiving docment id based on search 
            if($request["checked"]== 1){  //if search based on "titre" 
                $number=count($request["checkboxes"]);
                if($number == 1){  // if only one box checked
                    $ids=DB::table("metadonnees")->where("name",$request["checkboxes"][0])->select("id")->get();  // get 
                    $row=DB::table("document_metadonnees_values")
                            ->where("metadonnees_id",$ids[0]->id)
                            ->where("value","LIKE","%".$value."%")
                            ->select("document_id")->get();
                    for ($i=0; $i <count($row) ; $i++) { 
                        array_push($tab_document_ids,$row[$i]->document_id);
                    }
                   

                }else if($number == 2){ // if 2 boxes checked
                    $id=DB::table("metadonnees")->whereIn("name",[$request["checkboxes"][0],$request["checkboxes"][1]])->select("id")->get();
                      $rows=DB::table("document_metadonnees_values")
                        ->whereIn("metadonnees_id",[$id[0]->id,$id[1]->id])
                        ->where("value","LIKE","%".$value."%")
                        ->select("document_id")->get();
                    for ($i=0; $i <count($rows) ; $i++) { 
                       array_push($tab_document_ids,$rows[$i]->document_id); 
                    } 
                    $tab_document_ids=array_unique($tab_document_ids);
                }  

            }else if($request["checked"] == 0){ // if search based on "search libre"
                $rows=DB::table("document_metadonnees_values")->where("value","LIKE","%".$value."%")->select("document_id")->get();
                for ($i=0; $i <count($rows) ; $i++) { 
                    array_push($tab_document_ids,$rows[$i]->document_id);
                }
                $tab_document_ids=array_unique($tab_document_ids);
            }
          
            // table of document id ready
            $tab_document_public=[];
            $classe_public=DB::table("classe_documents")->where("classe_name","public")->select("id")->get();
            foreach ($tab_document_ids as  $value_id) {
                $row=Document::select("classe_id")->where("id",$value_id)->get();
                if($row[0]->class->classe_name == "public"){
                    array_push($tab_document_public,$value_id);
                }
            }
            

           // $documents=Document::simplePaginate(3);
            $documents=Document::get();
            $values=DB::table("document_metadonnees_values")->get();   
            $files=DB::table("files")->get();
            $returnHTML = view ("Utilisateur_Externe.test",["documents"=>$documents,"values"=>$values,"files"=>$files,"document_ids"=>$tab_document_public])->render();
            return response()->json(array("success"=>true,"html"=>$returnHTML));   
        }   
    }   

    public function sendDocumentsMail(){    
       
        if(Request::ajax()){
            $request= Request::all();
           /*  dd($request); */
            $value= $request["value"];
            $files = DB::table("files")->where("document_id",$value)->select("name")->get();

            $user = Auth::user();
            
      
            $data["email"] = $user->email;
            $data["title"] = "From DRAO";
            $data["body"] = "Thank you for visiting our website . Here are the files associated with the chosen document";
            $list_files=[];
            foreach ($files as $file) {
                    array_push($list_files,public_path('\storage\uploads/'.$file->name));
            }
            //dd($list_files);

          

            Mail::send("Utilisateur_Externe.email_send",$data ,function($message) use($data,$list_files)     {
                    $message->to($data["email"],$data["email"])
                            ->subject($data["title"]);

                    foreach ($list_files as $file) {
                        $message->attach($file);
                    }
            });
            

            dd("Mail send");
        }
    }
}
