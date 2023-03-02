<?php

namespace App\Http\Controllers;

use App\Lib\Auth;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    private UserService $user;
    private Auth        $auth;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->user = new UserService();
        $this->auth = new Auth();
    }

    public function showLoginForm()
    {
        $data = [];
        return view('admin.pages.login.index', $data);
    }

    public function username()
    {
        return $this->user->login_username();
    }

    protected function authenticated(Request $request, $user)
    {
        [$status, $error_name, $message] = $this->user->authenticated($user);
        if (!$status) {
            $this->auth->logout();
            return back()->withErrors([$error_name => [$message]]);
        }
        return redirect($this->redirectTo);
    }

}
