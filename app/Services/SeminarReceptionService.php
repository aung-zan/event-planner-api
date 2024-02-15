<?php

namespace App\Services;

use App\Models\Visitor;
use App\Repositories\SeminarReceptionRepository;

class SeminarReceptionService
{
    private $seminarReceptionRepository;

    public function __construct(SeminarReceptionRepository $seminarReceptionRepository)
    {
        $this->seminarReceptionRepository = $seminarReceptionRepository;
    }

    public function admission($seminarId, $vCode): Visitor
    {
        return $this->seminarReceptionRepository->admission($seminarId, $vCode);
    }
}
