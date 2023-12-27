<?php

namespace App\Services\User;

use App\Models\User;
use App\Models\Win;
use App\Services\Link\LinkCreateService;

class UserCreateService
{
    public static function create(array $data)
    {
        $link = LinkCreateService::create();
        $win = Win::create();
        $user = User::firstOrCreate(['phone_number' => $data['phone_number']], [
            'username' => $data['username'],
            'phone_number' => $data['phone_number'],
            'link_id' => $link->id,
            'win_id' => $win->id,
        ]);
        return $user;
    }
}
