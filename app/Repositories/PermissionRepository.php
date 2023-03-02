<?php

namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository extends BaseRepository
{
    public Permission $model;

    public function __construct()
    {
        $this->model = new Permission();
    }

    public function id()
    {
        return $this->model::ID;
    }

    public function name()
    {
        return $this->model::NAME;
    }
}
