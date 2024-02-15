<?php

namespace App\Repositories;

use App\Models\Exhibition;
use Illuminate\Database\Eloquent\Collection;

class ExhibitionRepository
{
    public function getAll(): Collection
    {
        return Exhibition::all();
    }

    public function getById(int $id): Exhibition
    {
        return Exhibition::where('exhibition_id', $id)
            ->first();
    }

    // public function visitorCount($id): Collection
    // {
    //     return Exhibition::where('id', $id)
    // }
}
