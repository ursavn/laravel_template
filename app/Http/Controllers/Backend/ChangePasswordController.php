<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
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
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
    */
    public function changePassword(ChangePasswordRequest $request) {
        $currentPassword = $request['current_password'];
        $newPassword     = $request['new_password'];

        if (!(Hash::check($currentPassword, Auth::user()->password))) {
            return redirect()->route('profile.edit')->with('error', 'The current password is incorrect.');
        }

        if (strcmp($currentPassword, $newPassword) == false) {
            return redirect()->route('profile.edit')->with('error', 'The new password is the same as the current password.');
        }

        $user = User::find(Auth::user()->id);

        $user->update([
            'password' => bcrypt($newPassword)
        ]);

        return redirect()->route('profile.edit')->with('success', 'Password changed successfully. Please log in again.');
    }
}
