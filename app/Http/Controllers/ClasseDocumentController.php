<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ClasseDocument;
use Datatables;

class ClasseDocumentController extends Controller
{
    public function index(){
      $classes = DB::table('classe_documents')->paginate(3);
     return view("Admin.classDocument",["classes"=>$classes]);
         
    }

   public function addClassDocument(Request $request){
        $request->validate([
        'classe_name' => 'required|string|max:255',
        ]);
        $class = ClasseDocument::create([
            'classe_name' => $request->classe_name,
        ]);
        return redirect("/admin/classDocument")->with('success', 'Classe de document Ajouté');
   }

   public function deleteClassDocument($id){
        ClasseDocument::where("id","$id")->delete();
        return redirect("/admin/classDocument")->with("success","Classe de document Supprimé");
   }

   public function update(Request $request){
        $value = $request->input("classe_name");
        $id = $request->input("classe_id");

     $update = DB::table("classe_documents")->where("id",$id)->update(["classe_name" =>$value]);
     return  redirect("/admin/classDocument")->with("success","La Classe a été modifié");
   }

}

