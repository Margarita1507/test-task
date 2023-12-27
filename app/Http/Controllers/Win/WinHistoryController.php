<?php

namespace App\Http\Controllers\Win;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\Link;
use App\Models\User;
use App\Models\Win;
use App\Services\Link\LinkGetService;
use App\Services\Win\WinLuckyService;
use Illuminate\Http\Request;

class WinHistoryController extends Controller
{
    public function __invoke(int $linkId, int $winId)
    {;
        $link = LinkGetService::getById($linkId);
        return redirect()->route('pageA', $link->unique_link);
    }
}
