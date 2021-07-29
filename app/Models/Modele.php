<?php

namespace App\Models;

use App\Models\Metadonnees;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Modele extends Model
{
    use HasFactory;

    protected $table="modeles";
    public $timestamps="true";

    public function Metadonnees(){
        return $this->belonsToMany(Metadonnees::class);
    }

        

}
