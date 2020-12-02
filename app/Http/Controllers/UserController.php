<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function create(CreateUserRequest $request, UserService $userService): JsonResponse
    {
        $userService->createUser($request->toDto());

        return new JsonResponse([], JsonResponse::HTTP_CREATED);
    }
}
