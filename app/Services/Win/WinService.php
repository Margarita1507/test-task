<?php

namespace App\Services\Win;


use App\Models\Win;

class WinService
{
    public static function get(string $winId)
    {
        $win = Win::where('id', $winId)
                ->firstOrFail();

        return $win;
    }
}
