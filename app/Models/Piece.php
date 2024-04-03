<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{

    public $table = 'pieces';

    public $fillable = [
        'titre',
        'flyer'
    ];

    protected $casts = [
        'titre' => 'string',
        'flyer' => 'string'
    ];

    public static array $rules = [
        'titre' => 'required',
        'flyer' => 'required'
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

}
