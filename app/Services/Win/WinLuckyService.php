<?php

namespace App\Services\Win;

use App\Http\Controllers\PageAController;
use App\Models\Link;
use App\Models\User;
use App\Models\Win;

class WinLuckyService
{
    public static function randomLucky(string $winId)
    {
        $win = WinService::get($winId);

        $value = rand(1,1000);

        $winLucky = self::getWinOrLose($value);

        $win->win_amount += $winLucky;
        $win = WinHistoryService::addValueToHistory($winLucky, $win);
        $win->last_random_value = $value;

        $win->save();

        return $winLucky;
    }

    public static function calculateWin (int $value)
    {
        if ($value > 900) {
            $win = $value / 100 * 70;
        } elseif ($value > 600){
            $win = $value / 100 * 50;
        } elseif ($value > 300){
            $win = $value / 100 * 30;
        } else {
            $win = $value / 100 * 10;
        }

        return $win;
    }

    public static function getWinOrLose (int $value) {
        if( $value % 2 === 0) {
            return static::calculateWin($value);
        } else {
            return 0;
        }
    }
}
