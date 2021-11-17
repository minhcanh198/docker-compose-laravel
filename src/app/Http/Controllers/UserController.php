<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private User $user;
    private Auth $auth;
    const usersPerPage = 10;

    public function __construct(User $user, Auth $auth)
    {
        $this->user = $user;
        $this->auth = $auth;
    }

    public function addUser(CreateUserRequest $request)
    {
        $user = $this->auth::user();
        if ($user->cannot('create', User::class)) {
            return response("unauthorized", Response::HTTP_UNAUTHORIZED);
        }
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = $this->user->create($validatedData);
        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'access_token' => $accessToken]);
    }

    public function aboutMe()
    {
        $user = $this->auth::user();
        if ($user->cannot('view', $user)) {
            return response("unauthorized", Response::HTTP_UNAUTHORIZED);
        }
        return response($user);
    }

    public function getAllUsers()
    {
        $user = $this->auth::user();
        if ($user->cannot('viewAny', User::class)) {
            return response("unauthorized", Response::HTTP_UNAUTHORIZED);
        }
        $users = $this->user->simplePaginate(10);
        return \response($users);
    }

    public function getUserByID(int $id)
    {
        try {
            $authUser = $this->auth::user();
            $user = $this->user->findOrFail($id);
            if ($authUser->cannot('view', $user)) {
                return response("unauthorized", Response::HTTP_UNAUTHORIZED);
            }
            return \response($user);
        } catch (\Exception $exception) {
            return \response($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
