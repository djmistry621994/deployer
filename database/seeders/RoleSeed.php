<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Services\RoleService;
use Illuminate\Database\Seeder;
use App\Services\PermissionService;

class RoleSeed extends Seeder
{
    private PermissionService $permission;
    private RoleService       $role;

    public function __construct()
    {
        $this->permission = new PermissionService();
        $this->role = new RoleService();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = array_merge($this->common(), $this->super_admin());

        foreach ($permissions as $permission) {
            $this->permission->store($permission);
        }

        $roles = collect(Role::ARRAY);
        $roles = $roles->sortKeys();


        foreach ($roles as $role) {
            $role = $this->role->store($role);
            $this->role->seed_permissions($role, $this->common(), $this->super_admin());
        }
    }

    public function common()
    {
        return [];
    }

    private function super_admin()
    {
        return [
            'dashboard_sidebar' => 'dashboard_sidebar',

            'companies_sidebar' => 'companies_sidebar',
            'companies_create'  => 'companies_create',
            'companies_edit'    => 'companies_edit',
            'companies_show'    => 'companies_show',
            'companies_delete'  => 'companies_delete',
        ];
    }
}
