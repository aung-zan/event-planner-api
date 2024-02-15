<?php

namespace App\Services;

use App\Repositories\SurveyRepository;
use Illuminate\Database\Eloquent\Collection;

class SurveyService
{
    private $surveyRepository;

    public function __construct(SurveyRepository $surveyRepository)
    {
        $this->surveyRepository = $surveyRepository;
    }

    public function getAll(int $exhibitionId): Collection
    {
        return $this->surveyRepository->getAll($exhibitionId);
    }
}
