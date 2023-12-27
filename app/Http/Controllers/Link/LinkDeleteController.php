<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Services\Link\LinkService;

class LinkDeleteController extends Controller
{
    public function __invoke(string $linkId)
    {
        $link = LinkService::getById($linkId);
        LinkService::delete($link);

        return redirect()->route('index');
    }
}
