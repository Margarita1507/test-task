<?php

namespace App\Services\Link;

use App\Http\Controllers\PageAController;
use App\Models\Link;
use App\Models\User;

class LinkCheckService
{
    public static function check(string $uniqueLink)
    {
        $link = LinkGetService::getByUniqueLink($uniqueLink);

        $user = User::where('link_id', $link->id)
                ->first();
        return $user;
    }

}
