<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepository;

class EloquentUserRepository implements UserRepository
{
    /**
     * @param int $id
     *
     * @return \App\Models\User
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getUserById(int $id): User
    {
        return User::whereId($id)->firstOrFail();
    }
}
