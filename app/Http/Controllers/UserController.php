<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function changePassword(ChangePasswordRequest $request) {
        $currentPassword = $request['current_password'];
        $newPassword     = $request['new_password'];

        if (!(Hash::check($currentPassword, Auth::user()->password))) {
            return redirect()->route('get-change-password')->with('error', 'The current password is incorrect.');
        }

        if (strcmp($currentPassword, $newPassword) == false) {
            return redirect()->route('get-change-password')->with('error', 'The new password is the same as the current password.');
        }

        $user = User::find(Auth::user()->id);

        $user->update([
            'password' => bcrypt($newPassword)
        ]);

        return redirect()->route('get-change-password')->with('success', 'Password changed successfully. Please log in again.');
    }
}
