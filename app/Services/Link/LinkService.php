<?php

namespace App\Services\Link;

use App\Http\Controllers\PageAController;
use App\Models\Link;
use App\Models\User;
use App\Models\Win;
use Illuminate\Support\Facades\DB;

class LinkService
{
    public static function create()
    {
        $uniqueLink = uniqid();

        $link = Link::create([
            'unique_link' => $uniqueLink,
        ]);

        return $link;
    }
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

    public static function check(string $uniqueLink)
    {
        $link = LinkService::getByUniqueLink($uniqueLink);

        $user = User::where('link_id', $link->id)
            ->first();

        return $user;
    }
    public static function update(Link $link)
    {
        $link->unique_link = uniqid();
        $link->save();

        return $link;
    }
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
