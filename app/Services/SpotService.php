<?php

namespace App\Services;

use App\Models\SpotReception;
use App\Repositories\SpotRepository;
use Illuminate\Database\Eloquent\Collection;

class SpotService
{
    private $spotRepository;

    public function __construct(SpotRepository $spotRepository)
    {
        $this->spotRepository = $spotRepository;
    }

    public function getAll(int $exhibitionId): Collection
    {
        return $this->spotRepository->getAll($exhibitionId);
    }

    public function getEntryExit(int $exhibitionId): Collection
    {
        return $this->spotRepository->getEntryExit($exhibitionId);
    }

    public function getBooth(int $exhibitionId): Collection
    {
        return $this->spotRepository->getBooth($exhibitionId);
    }
}
