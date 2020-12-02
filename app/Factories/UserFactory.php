<?php
declare(strict_types=1);

namespace App\Factories;

use App\Dto\CreateUserDto;
use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;

class UserFactory
{
    private Hasher $hasher;

    public function __construct(Hasher $hasher)
    {
        $this->hasher = $hasher;
    }

    public function create(CreateUserDto $dto): User
    {
        $user =  new User();
        $user->default(
            $dto->name,
            $dto->email,
            $this->hasher->make($dto->planePassword)
        );

        return $user;
    }
}
