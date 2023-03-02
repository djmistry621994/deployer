<?php

namespace App\Lib;

class Auth
{
    public function guard($guard = null)
    {
        if ($guard === null) {
            $guard = 'web';
        }
        return $guard;
    }

    public function is_login($guard = null)
    {
        $guard = $this->guard($guard);
        return auth()->guard($guard)->check();
    }

    public function user($guard = null)
    {
        $guard = $this->guard($guard);
        if ($this->is_login($guard)) {
            return auth()->guard($guard)->user();
        }
        return null;
    }

    public function logout($guard = null)
    {
        $guard = $this->guard($guard);
        if ($this->is_login($guard)) {
            auth()->guard($guard)->logout();
        }
    }

    public function has_permissions($permissions, $user = null)
    {
        if ($user == null) {
            $user = $this->user();
        }
        if (!is_array($permissions)) {
            $permissions = [$permissions];
        }
        return $user->hasAnyPermission($permissions);
    }
}
