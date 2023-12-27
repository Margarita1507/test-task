<?php

namespace App\Services\Win;

use App\Http\Controllers\PageAController;
use App\Models\Link;
use App\Models\User;
use App\Models\Win;

class WinGetService
{
    public static function get(string $winId)
    {
        $win = Win::where('id', $winId)
                ->firstOrFail();
        $win = WinHistoryService::winHistoryToArray($win);
        return $win;
    }
}
