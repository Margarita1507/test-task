<?php

namespace App\Services\Link;

use App\Models\Link;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LinkUpdateService
{
    public static function update(Link $link)
    {
        $link->unique_link = uniqid();
        $link->save();

        return $link;
    }
}
