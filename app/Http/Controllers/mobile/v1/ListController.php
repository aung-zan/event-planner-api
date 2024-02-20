<?php

namespace App\Http\Controllers\mobile\v1;

use App\Http\Controllers\Controller;
use App\Services\ExhibitionService;
use Carbon\Carbon;

class ListController extends Controller
{
    private $exhibitionService;
    private $header;

    public function __construct(ExhibitionService $exhibitionService)
    {
        $this->exhibitionService = $exhibitionService;
        $this->header = [
            'Content-Type' => 'application/json',
            'date' => Carbon::now()->format('D, d M Y H:i:s') . ' GMT+6:30',
        ];
    }

    public function list()
    {
        $exhibitions = $this->exhibitionService->getAll();

        $content = [
            'status' => 'success',
            'data' => $exhibitions,
            'message' => 'retrieved successfully.'
        ];

        // delay the return data
        sleep(2);

        return response()->json($content, 200, $this->header);
    }
}
