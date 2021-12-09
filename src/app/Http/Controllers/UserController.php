<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private User $user;


    private Auth $auth;


    const usersPerPage = 10;


    private UserRepository $repository;


    public function __construct(User $user, Auth $auth, UserRepository $repository)
    {
        $this->user = $user;
        $this->auth = $auth;
        $this->repository = $repository;
    }

    public function addUser(CreateUserRequest $request)
    {
        $user = $this->auth::user();
        if ($user->cannot('create', User::class)) {
            return response("unauthorized", Response::HTTP_UNAUTHORIZED);
        }
        $validatedData = $request->validated();
        $user = $this->user->create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ]);
        $user->assignRole($validatedData['role']);

        return response(['user' => $user]);
    }

    public function aboutMe()
    {
        $user = $this->auth::user();
        if ($user->cannot('view', $user)) {
            return response("unauthorized", Response::HTTP_UNAUTHORIZED);
        }
        return response($user);
    }

    public function getAllUsers(Request $request)
    {
        $query = $request->all();
        $user = $this->auth::user();
        if ($user->cannot('viewAny', User::class)) {
            return response("unauthorized", Response::HTTP_UNAUTHORIZED);
        }
        $users = $this->repository->getAll($query);
        return \response($users);
    }

    public function getUserByID(int $id)
    {
        try {
            $authUser = $this->auth::user();
            $user = $this->user->with('roles:id,name')->findOrFail($id);
            if ($authUser->cannot('view', $user)) {
                return response("unauthorized", Response::HTTP_UNAUTHORIZED);
            }
            return \response($user);
        } catch (\Exception $exception) {
            return \response($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(UpdateUserRequest $request, int $id)
    {
        $data = $request->validated();
        $user = User::where('id', $id);
        $user->update([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone_number' => $data['phone_number'],
        ]);
        $user->first()->syncRoles($data['role']);
        return \response(['message' => 'OK']);
    }
}
