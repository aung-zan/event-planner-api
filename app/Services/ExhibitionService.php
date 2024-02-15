<?php

namespace App\Services;

use App\Models\Exhibition;
use App\Repositories\ExhibitionRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ExhibitionService
{
    private $exhibitionRepository;

    public function __construct(ExhibitionRepository $exhibitionRepository)
    {
        $this->exhibitionRepository = $exhibitionRepository;
    }

    public function getAll(): Collection
    {
        return $this->exhibitionRepository->getAll();
    }

    public function getById(int $id): Exhibition
    {
        return $this->exhibitionRepository->getById($id);
    }

    public function visitorCount($id): int
    {
        //TODO: add admission visitor count
        $exhibition = $this->getById($id);
        $totalVisitorCount = $exhibition->visitors()->count();

        return $totalVisitorCount;
    }
}
