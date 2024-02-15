<?php

namespace App\Http\Controllers\mobile\v1;

use App\Http\Controllers\Controller;
use App\Services\SeminarReceptionService;
use App\Services\SeminarService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    private $header;
    private $seminarService;
    private $seminarReceptionService;

    public function __construct(SeminarService $seminarService, SeminarReceptionService $seminarReceptionService)
    {
        $this->header = [
            'Content-Type' => 'application/json',
            'date' => Carbon::now()->format('D, d M Y H:i:s') . ' GMT+6:30',
        ];

        $this->seminarService = $seminarService;
        $this->seminarReceptionService = $seminarReceptionService;
    }

    public function list(int $exhibitionId)
    {
        $seminars = $this->seminarService->getAll($exhibitionId);

        $content = [
            'status' => 'success',
            'data' => $seminars,
            'message' => 'retrieved successfully.'
        ];

        // delay the data return
        sleep(2);

        return response()->json($content, 200, $this->header);
    }

    public function save($exhibitionId, $seminarId, Request $request)
    {
        try {
            $visitor = $this->seminarReceptionService->admission($seminarId, $request->vcode);

            $content = [
                'status' => 'success',
                'message' =>
                    "admitted successfully.\nVisitor Code: $visitor->visitor_code\nVisitor Name: $visitor->name",
            ];

            return response()->json($content, 200, $this->header);
        } catch (\Throwable $th) {
            \Log::info($th);
        }
    }
}
