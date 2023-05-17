<?php

declare(strict_types=1);

namespace App\ValueObject;

use App\Entity\User;

class Payment
{
    public function __construct(private User $user, private string $result)
    {
    }

    public function getResult(): string
    {
        return $this->result;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
