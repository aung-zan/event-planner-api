<?php

namespace App\Repositories;

use App\Models\SeminarReception;
use App\Models\Visitor;
use Carbon\Carbon;

class SeminarReceptionRepository
{
    private $visitorRepository;

    public function __construct(VisitorRepository $visitorRepository)
    {
        $this->visitorRepository = $visitorRepository;
    }

    public function admission($seminarId, $vCode): Visitor
    {
        try {
            $visitor = $this->visitorRepository->getByCode($vCode);
            SeminarReception::create([
                'seminar_id' => $seminarId,
                'visitor_id' => $visitor->visitor_id,
                'admission_at' => Carbon::now(),
                'created_by' => 1,
            ]);

            return $visitor;
        } catch (\Throwable $th) {
            \Log::info($th);
            return $th;
        }
    }
}
