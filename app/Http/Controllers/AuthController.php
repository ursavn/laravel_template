<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    protected $dirView = 'pages.auth.';
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('admin');
        } else {
            return view($this->dirView . 'login');
        }
    }

    public function postLogin(LoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($login)) {
            return redirect('/');
        } else {
            return redirect()->back()->with('status', 'Email address or password is incorrect.');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('get-login');
    }
}
