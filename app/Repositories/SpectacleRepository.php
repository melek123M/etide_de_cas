<?php

namespace App\Repositories;

use App\Models\Spectacle;
use App\Repositories\BaseRepository;

class SpectacleRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'salle_id',
        'piece_id',
        'datespectacle'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Spectacle::class;
    }
}
