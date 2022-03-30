<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $user = Auth::user();
        return view('backend/user/profile',compact('user'));
    }

    /**
     * @return View
     */
    public function edit(): View
    {
        $user = Auth::user();
        return view('backend/user/edit',compact('user'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        User::where('id', $user->id)
            ->update(['name' => $request->name, 'email' => $request->email]);
        return back();
    }
}
