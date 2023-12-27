<?php

namespace App\Services\Win;

use App\Http\Controllers\PageAController;
use App\Models\Link;
use App\Models\User;
use App\Models\Win;

class WinHistoryService
{
    public static function addValueToHistory(string $value, Win $win)
    {
        $win = self::winHistoryToArray($win);
        $winHistoryArray = $win->win_history;
        if(array_push($winHistoryArray, $value) > 3) {
            $winHistoryArray = array_slice($winHistoryArray, 1);
        }
        $win->win_history = $winHistoryArray;
        $win = self::winHistoryToString($win);
        return $win;
    }

    public static function winHistoryToArray( Win $win) {
        $win->win_history = explode(',', $win->win_history);
        return $win;
    }

    public static function winHistoryToString( Win $win) {
        $win->win_history = implode(',', $win->win_history);
        return $win;
    }
}
