<?php

namespace App\Http\Controllers;

use App\Services\Link\LinkCheckService;
use App\Services\Win\WinGetService;
use Illuminate\Http\Request;

class PageAController extends Controller
{
    public function __invoke(string $uniqueLink)
    {
        // TO DO
        $user = LinkCheckService::check($uniqueLink);
        $win = WinGetService::get($user->win_id);

        return view('pageA', compact('win', 'user'));
    }
}
