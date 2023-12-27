<?php

namespace App\Http\Controllers;

use App\Services\Link\LinkService;
use App\Services\Win\WinHistoryService;
use App\Services\Win\WinService;

class PageAController extends Controller
{
    public function __invoke(string $uniqueLink)
    {
        $user = LinkService::check($uniqueLink);
        $win = WinService::get($user->win_id);
        $win = WinHistoryService::winHistoryToArray($win);

        return view('pageA', compact('win', 'user'));
    }
}
