<?php

namespace App\Http\Controllers\Win;

use App\Http\Controllers\Controller;
use App\Services\Link\LinkService;
use App\Services\Win\WinLuckyService;
use App\Services\Win\WinService;


class WinLuckyController extends Controller
{
    public function __invoke( $linkId, int $winId)
    {;
        WinLuckyService::randomLucky($winId);
        $link = LinkService::getById($linkId);
        return redirect()->route('pageA', $link->unique_link);
    }
}
