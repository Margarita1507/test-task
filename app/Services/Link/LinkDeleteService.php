<?php

namespace App\Services\Link;

use App\Http\Controllers\PageAController;
use App\Models\Link;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LinkDeleteService
{
    public static function delete(Link $link)
    {
        try {
            DB::beginTransaction();
            User::where('link_id', $link->id)
                ->delete();
            $link->delete();
            DB::commit();
        }  catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        Link::where('updated_at', '<', now()->subWeek())
            ->delete();
    }
}
