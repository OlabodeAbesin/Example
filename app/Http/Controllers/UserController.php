<?php
declare(strict_types=1);

namespace App\Http\Controllers;


use App\Http\Requests\UserCreateRequest;
use App\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        //Todo:: Return responses using Laravel resources and handle localization/translations
        return response()->json($this->userService->index(), 200);
    }

    public function store(UserCreateRequest $request)
    {
        //Todo:: Return responses using Laravel resources and handle localization/translations
        return response()->json($this->userService->store($request), 200);
    }
}
