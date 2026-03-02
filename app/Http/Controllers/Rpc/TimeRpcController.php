<?php

namespace App\Http\Controllers\Rpc;

use App\Http\Controllers\Controller;
use App\Services\TimeService;

class TimeRpcController extends Controller
{
    private TimeService $timeService;

    public function __construct(TimeService $timeService)
    {
        $this->timeService = $timeService;
    }

    public function getCurrentTime()
    {
        return response(
            'Aktuálny čas je: ' . $this->timeService->getCurrentTime(),
            200
        )->header('Content-Type', 'text/plain');
    }
}