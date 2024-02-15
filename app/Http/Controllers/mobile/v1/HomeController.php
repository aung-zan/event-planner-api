<?php

namespace App\Http\Controllers\mobile\v1;

use App\Http\Controllers\Controller;
use App\Services\ExhibitionService;
use App\Services\SpotReceptionService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $spotReceptionService;
    private $exhibitionService;
    private $header;

    public function __construct(ExhibitionService $exhibitionService, SpotReceptionService $spotReceptionService)
    {
        $this->header = [
            'Content-Type' => 'application/json',
            'date' => Carbon::now()->format('D, d M Y H:i:s') . ' GMT+6:30',
        ];

        $this->exhibitionService = $exhibitionService;
        $this->spotReceptionService = $spotReceptionService;
    }

    public function dashboard($id)
    {
        // $date = '2024-02-07';
        $exhibition = $this->exhibitionService->getById($id);
        $date = date('Y-m-d', strtotime($exhibition->event_start));
        $dashboardData = $this->spotReceptionService->getDashBoardData($date);
        $totalVisitorCount = $this->exhibitionService->visitorCount($id);

        $data = [
            'exhibition' => $exhibition,
            'chartData' => $dashboardData,
            'totalVisitorCount' => $totalVisitorCount,
        ];

        $content = [
            'status' => 'success',
            'data' => $data,
            'message' => 'retrieved successfully.'
        ];

        // delay the data return
        sleep(2);

        return response()->json($content, 200, $this->header);
    }
}
