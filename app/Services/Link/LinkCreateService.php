<?php

namespace App\Services\Link;

use App\Models\Link;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LinkCreateService
{
    public static function create()
    {
        $uniqueLink = uniqid();

        $link = Link::create([
            'unique_link' => $uniqueLink,
        ]);

        return $link;
    }
}
