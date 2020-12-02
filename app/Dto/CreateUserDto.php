<?php
declare(strict_types=1);

namespace App\Dto;

class CreateUserDto
{
    public string $name;
    public string $email;
    public string $planePassword;

    /**
     * @param string $name
     * @param string $email
     * @param string $planePassword
     */
    public function __construct(string $name, string $email, string $planePassword)
    {
        $this->name = $name;
        $this->email = $email;
        $this->planePassword = $planePassword;
    }
}
