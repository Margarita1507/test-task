<?php

namespace App\Services\Link;

use App\Http\Controllers\PageAController;
use App\Models\Link;
use App\Models\User;

class LinkGetService
{
    public static function getByUniqueLink(string $uniqueLink)
    {
        $link = Link::where('unique_link', $uniqueLink)
            ->where('updated_at', '>', now()->subWeek())
            ->firstOrFail();
        return $link;
    }

    public static function getById(string $linkId)
    {
        $link = Link::where('id', $linkId)
            ->where('updated_at', '>', now()->subWeek())
            ->firstOrFail();

        return $link;
    }
}
