<?php

namespace App\Repositories;

use App\Models\Piece;
use App\Repositories\BaseRepository;

class PieceRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'titre',
        'flyer'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Piece::class;
    }
}
