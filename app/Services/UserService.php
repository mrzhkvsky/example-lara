<?php
declare(strict_types=1);

namespace App\Services;

use App\Dto\CreateUserDto;
use App\Events\UserCreatedEvent;
use App\Factories\UserFactory;
use App\Repositories\Interfaces\UserRepository;

class UserService
{
    private UserRepository $userRepository;
    private UserFactory $userFactory;

    public function __construct(UserRepository $userRepository, UserFactory $userFactory)
    {
        $this->userRepository = $userRepository;
        $this->userFactory = $userFactory;
    }

    public function createUser(CreateUserDto $dto): void
    {
        $user = $this->userFactory->create($dto);

        $user->saveOrFail();

        event(new UserCreatedEvent($user));
    }
}
