<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Services\Link\LinkService;


class LinkUpdateController extends Controller
{
    public function __invoke(string $linkId)
    {
        $link = LinkService::getById($linkId);
        $link = LinkService::update($link);

        return redirect()->route('pageA', $link->unique_link);

    }
}
