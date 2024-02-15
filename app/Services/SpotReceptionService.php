<?php

namespace App\Services;

use App\Models\Visitor;
use App\Repositories\SpotReceptionRepository;
use Illuminate\Support\Collection;

class SpotReceptionService
{
    private $spotReceptionRepository;

    public function __construct(SpotReceptionRepository $spotReceptionRepository)
    {
        $this->spotReceptionRepository = $spotReceptionRepository;
    }

    public function getDashBoardData($date): Collection
    {
        return $this->spotReceptionRepository->getDashBoardData($date);
    }

    public function admission($spotId, $vCode): Visitor
    {
        return $this->spotReceptionRepository->admission($spotId, $vCode);
    }
}
