<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Services\UserService;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    protected UserService $user;

    public function __construct()
    {
        $this->user = new UserService();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = $this->user->seed_user();
        $this->user->assign_role($user, Role::SUPER_ADMIN);
    }
}
