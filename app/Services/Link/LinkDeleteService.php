<?php

namespace App\Services\Link;

use App\Http\Controllers\PageAController;
use App\Models\Link;
use App\Models\User;

class LinkDeleteService
{
    public static function delete(Link $link)
    {
        $link->delete();
        Link::where('updated_at', '<', now()->subWeek())
            ->delete();
    }
}
