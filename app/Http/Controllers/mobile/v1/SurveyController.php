<?php

namespace App\Http\Controllers\mobile\v1;

use App\Http\Controllers\Controller;
use App\Services\SurveyService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    private $header;
    private $surveyService;

    public function __construct(SurveyService $surveyService)
    {
        $this->header = [
            'Content-Type' => 'application/json',
            'date' => Carbon::now()->format('D, d M Y H:i:s') . ' GMT+6:30',
        ];

        $this->surveyService = $surveyService;
    }

    public function list(int $exhibitionId)
    {
        $surveys = $this->surveyService->getAll($exhibitionId);

        $content = [
            'status' => 'success',
            'data' => $surveys,
            'message' => 'retrieved successfully.'
        ];

        // delay the data return
        sleep(2);

        return response()->json($content, 200, $this->header);
    }

    public function save()
    {
        //
    }
}
