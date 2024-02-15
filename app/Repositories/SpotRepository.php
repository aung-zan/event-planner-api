<?php

namespace App\Repositories;

use App\Models\Spot;
use Illuminate\Database\Eloquent\Collection;

class SpotRepository
{
    public function getAll(int $exhibitionId): Collection
    {
        return Spot::where('exhibition_id', $exhibitionId)
            ->get();
    }

    public function getEntryExit(int $exhibitionId): Collection
    {
        return Spot::where('exhibition_id', $exhibitionId)
            ->whereIn('type', [1, 2])
            ->get();
    }

    public function getBooth(int $exhibitionId): Collection
    {
        return Spot::where('exhibition_id', $exhibitionId)
            ->where('type', 3)
            ->get();
    }
}
