<?php

namespace App\Services;

use App\Lib\Auth;
use App\Enums\Role;
use App\Enums\Status;
use App\Lib\Date;
use App\Repositories\UserRepository;

class UserService extends BaseService
{
    private UserRepository $user;
    private Date           $date;
    private Auth           $auth;

    public function __construct()
    {
        $this->user = new UserRepository();
        $this->date = new Date();
        $this->auth = new Auth();
    }

    public function store($name)
    {
    }

    public function seed_user()
    {
        $user = $this->user->first_or_create([
            $this->user->email() => 'admin@admin.com',
        ], [
            $this->user->name()              => 'Admin',
            $this->user->email_verified_at() => $this->date->get_timestamp(),
            $this->user->password()          => '1234567890',
            $this->user->status()            => Status::ACTIVE,
        ]);

        return $user;
    }

    public function assign_role($user, $role)
    {
        $this->user->assign_role($user, $role);
    }

    public function login_username()
    {
        return $this->user->email();
    }

    public function authenticated($user)
    {
        $status = true;
        $name = $message = '';
        if ($user[$this->user->email_verified_at()] == null) {
            $status = false;
            $name = $this->user->email();
            $message = __('messages.not_verified_account');
        } else if ($user[$this->user->status()] != Status::ACTIVE) {
            $status = false;
            $name = $this->user->email();
            $message = __('messages.active_status');
        }
        return [$status, $name, $message];
    }
}
