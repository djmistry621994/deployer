<?php

namespace App\Services;

use App\Enums\Role;
use App\Repositories\RoleRepository;

class RoleService extends BaseService
{
    private RoleRepository $role;

    public function __construct()
    {
        $this->role = new RoleRepository();

    }

    public function store($name)
    {
        return $this->role->first_or_create([
            $this->role->name() => $name,
        ]);
    }

    public function seed_permissions($role, array $common, array $super_admin)
    {
        if ($this->role->getName($role) == Role::SUPER_ADMIN) {
            $permissions = array_merge($common, $super_admin);
            $this->role->permissions($role, $permissions);
        }
    }
}
