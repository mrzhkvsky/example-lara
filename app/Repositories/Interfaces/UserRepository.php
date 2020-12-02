<?php
namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepository
{
    /**
     * Get user model by Id
     *
     * @param int $id
     *
     * @return \App\Models\User
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getUserById(int $id): User;
}
