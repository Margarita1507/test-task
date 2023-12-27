<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\Link;
use App\Models\User;
use App\Services\Link\LinkDeleteService;
use App\Services\Link\LinkGetService;
use Illuminate\Http\Request;

class LinkDeleteController extends Controller
{
    public function __invoke(string $linkId)
    {
        $link = LinkGetService::getById($linkId);
        LinkDeleteService::delete($link);

        return redirect()->route('index');
    }
}
