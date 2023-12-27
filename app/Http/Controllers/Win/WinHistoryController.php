<?php

namespace App\Http\Controllers\Win;

use App\Http\Controllers\Controller;
use App\Services\Link\LinkService;


class WinHistoryController extends Controller
{
    public function __invoke(int $linkId, int $winId)
    {;
        $link = LinkService::getById($linkId);
        return redirect()->route('pageA', $link->unique_link);
    }
}
