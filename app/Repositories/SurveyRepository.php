<?php

namespace App\Repositories;

use App\Models\Survey;
use Illuminate\Database\Eloquent\Collection;

class SurveyRepository
{
    public function getAll(int $exhibitionId): Collection
    {
        return Survey::where('exhibition_id', $exhibitionId)
            ->get();
    }
}
