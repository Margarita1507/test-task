<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use App\Models\Win;
use App\Services\Link\LinkCreateService;
use App\Services\Link\LinkGetService;
use App\Services\User\UserCreateService;

class UserCreateController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $user = UserCreateService::create($data);
        $link = LinkGetService::getById($user->link_id);
        return redirect()->route('pageA', $link->unique_link);
    }
}
