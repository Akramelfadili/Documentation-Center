<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClasseDocument extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'classe_name',
    ];
    protected $timestamp=false;
}
