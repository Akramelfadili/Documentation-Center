<?php

namespace App\Models;

use App\Models\Modele;
use App\Models\ClasseDocument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;
    
    protected $table="documents";

    public function model(){
        return $this->belongsTo(Modele::class,"modele_id");
    }   
    public function class(){
        return $this->belongsTo(ClasseDocument::class,"classe_id");
    }
    public function metadonneesData(){
        return $this->belongsToMany(Metadonnees::class,"document_metadonnees_values");
    }
}
