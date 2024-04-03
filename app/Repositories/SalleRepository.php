<?php

namespace App\Repositories;

use App\Models\Salle;
use App\Repositories\BaseRepository;

class SalleRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'libelle',
        'adresse'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Salle::class;
    }
}
