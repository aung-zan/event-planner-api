<?php

namespace App\Http\Controllers\mobile\v1;

use App\Http\Controllers\Controller;
use App\Services\BoothService;
use App\Services\SpotReceptionService;
use App\Services\SpotService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BoothController extends Controller
{
    private $header;
    private $spotService;
    private $spotReceptionService;

    public function __construct(SpotService $spotService, SpotReceptionService $spotReceptionService)
    {
        $this->header = [
            'Content-Type' => 'application/json',
            'date' => Carbon::now()->format('D, d M Y H:i:s') . ' GMT+6:30',
        ];

        $this->spotService = $spotService;
        $this->spotReceptionService = $spotReceptionService;
    }

    public function list(int $exhibitionId)
    {
        $booths = $this->spotService->getBooth($exhibitionId);

        $content = [
            'status' => 'success',
            'data' => $booths,
            'message' => 'retrieved successfully.'
        ];

        // delay the data return
        sleep(2);

        return response()->json($content, 200, $this->header);
    }

    public function save($exhibitionId, $spotId, Request $request)
    {
        try {
            $visitor = $this->spotReceptionService->admission($spotId, $request->vcode);

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
