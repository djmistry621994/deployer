<?php

namespace App\Services;

use App\Models\Permission;
use App\Repositories\PermissionRepository;

class PermissionService extends BaseService
{
    private PermissionRepository $permission;

    public function __construct()
    {
        $this->permission = new PermissionRepository();
    }

    public function store($name)
    {
        $this->permission->first_or_create([
            $this->permission->name() => $name,
        ]);
    }
}
