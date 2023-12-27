<?php

namespace App\Services\User;

use App\Models\User;
use App\Models\Win;
use App\Services\Link\LinkService;
use Illuminate\Support\Facades\DB;

class UserService
{
    public static function create(array $data)
    {
        try {
            $link = LinkService::create();
            $win = Win::create();
            $user = User::firstOrCreate(['phone_number' => $data['phone_number']], [
                'username' => $data['username'],
                'phone_number' => $data['phone_number'],
                'link_id' => $link->id,
                'win_id' => $win->id,
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $user;
    }
}
