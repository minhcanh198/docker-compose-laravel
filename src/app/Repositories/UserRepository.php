<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    private User $userModel;

    const usersPerPage = 10;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function getAll(array $queries)
    {
        $queryBuilder = $this->userModel->with('roles:id,name');
        if (isset($queries['role'])) {
            $role = $queries['role'];
            $queryBuilder->whereHas('roles', function ($query) use ($role) {
                $query->where('name', $role);
            });
        }
        return $queryBuilder->paginate(self::usersPerPage);
    }
}
