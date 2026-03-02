<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TimeService;

class TimeRestController extends Controller
{
    private TimeService $timeService;

    public function __construct(TimeService $timeService)
    {
        $this->timeService = $timeService;
    }

    public function getCurrentTime()
    {
        return response()->json([
            'current_time' => $this->timeService->getCurrentTime()
        ]);
    }
}