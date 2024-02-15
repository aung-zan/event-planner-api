<?php

namespace App\Repositories;

use App\Models\Seminar;
use Illuminate\Database\Eloquent\Collection;

class SeminarRepository
{
    public function getAll(int $exhibitionId): Collection
    {
        return Seminar::where('exhibition_id', $exhibitionId)
            ->get();
    }
}
