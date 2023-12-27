<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Services\Link\LinkService;
use App\Services\User\UserService;

class UserCreateController extends Controller
{
    public function __invoke(UserCreateRequest $request)
    {
        $data = $request->validated();
        $user = UserService::create($data);
        $link = LinkService::getById($user->link_id);
        return redirect()->route('pageA', $link->unique_link);
    }
}
