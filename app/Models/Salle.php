<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salle extends Model
{
    use SoftDeletes;
    public $table = 'salles';

    public $fillable = [
        'libelle',
        'adresse'
    ];

    protected $casts = [
        'libelle' => 'string',
        'adresse' => 'string'
    ];
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public static array $rules = [
        'libelle' => 'required',
        'adresse' => 'required'
    ];

    
}
