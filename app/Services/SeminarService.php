<?php

namespace App\Services;

use App\Repositories\SeminarRepository;
use Illuminate\Database\Eloquent\Collection;

class SeminarService
{
    private $seminarRepository;

    public function __construct(SeminarRepository $seminarRepository)
    {
        $this->seminarRepository = $seminarRepository;
    }

    public function getAll(int $exhibitionId): Collection
    {
        return $this->seminarRepository->getAll($exhibitionId);
    }
}
