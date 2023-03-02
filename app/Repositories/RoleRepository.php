<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository extends BaseRepository
{
    public Role $model;

    public function __construct()
    {
        $this->model = new Role();
    }


    public function id()
    {
        return $this->model::ID;
    }

    public function name()
    {
        return $this->model::NAME;
    }

    public function getName($role)
    {
        return $role[$this->name()];
    }

    public function permissions($role, array $permissions)
    {
        $role->syncPermissions($permissions);
    }
}
