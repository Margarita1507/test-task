<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Models\Link;
use App\Models\User;
use App\Services\Link\LinkCreateService;
use App\Services\Link\LinkDeleteService;
use App\Services\Link\LinkGetService;
use App\Services\Link\LinkUpdateService;
use Illuminate\Http\Request;

class LinkUpdateController extends Controller
{
    public function __invoke(string $linkId)
    {
        $link = LinkGetService::getById($linkId);
        $link = LinkUpdateService::update($link);

        return redirect()->route('pageA', $link->unique_link);

    }
}
