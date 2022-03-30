<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    /**
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function changePassword(ChangePasswordRequest $request) {
        $currentPassword = $request['current_password'];
        $newPassword     = $request['new_password'];

        if (!(Hash::check($currentPassword, Auth::user()->password))) {
            return redirect()->route('user.get-change-password')->with('error', 'The current password is incorrect.');
        }

        if (strcmp($currentPassword, $newPassword) == false) {
            return redirect()->route('user.get-change-password')->with('error', 'The new password is the same as the current password.');
        }

        $user = User::find(Auth::user()->id);

        $user->update([
            'password' => bcrypt($newPassword)
        ]);

        return redirect()->route('user.get-change-password')->with('success', 'Password changed successfully. Please log in again.');
    }

    /**
     * @return View
     */
    public function getUserList() :view
    {
        $users = User::all();
        return view('backend/users/list',compact('users'));
    }

    /**
     * @return View
     */
    public function getDetailUser($id) :view
    {
        $user = User::find($id);
        return view('backend/users/detail',compact('user'));
    }

    /**
     * @return View
     */
    public function editUser($id): View
    {
        $user = User::find($id);
        return view('backend/users/edit',compact('user'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateUser(Request $request)
    {
        User::where('id', $request->id)
            ->update(['name' => $request->name, 'email' => $request->email]);
        return back();
    }
}
