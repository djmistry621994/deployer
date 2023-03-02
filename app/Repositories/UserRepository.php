<?php

namespace App\Repositories;

use App\Enums\Role;
use App\Models\User;

class UserRepository extends BaseRepository
{
    public User $model;

    public function __construct()
    {
        $this->model = new User();
    }


    public function id()
    {
        return $this->model::ID;
    }

    public function name()
    {
        return $this->model::NAME;
    }

    public function email()
    {
        return $this->model::EMAIL;
    }

    public function password()
    {
        return $this->model::PASSWORD;
    }

    public function email_verified_at()
    {
        return $this->model::EMAIL_VERIFIED_AT;
    }

    public function status()
    {
        return $this->model::STATUS;
    }

    public function assign_role($user, $role)
    {
        $user->assignRole($role);
    }
}
