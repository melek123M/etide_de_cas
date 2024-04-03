<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spectacle extends Model
{
    use SoftDeletes;
    public $table = 'spectacles';

    public $fillable = [
        'salle_id',
        'piece_id',
        'datespectacle'
    ];

    protected $casts = [
        'salle_id' => 'integer',
        'datespectacle' => 'date'
    ];

    public static array $rules = [
        'salle_id' => 'required',
        'piece_id' => 'required',
        'datespectacle' => 'required'
    ];

    protected $hidden = ['created_at','updated_at','deleted_at'];
    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }
    public function piece()
    {
        return $this->belongsTo(Piece::class);
    }

}
