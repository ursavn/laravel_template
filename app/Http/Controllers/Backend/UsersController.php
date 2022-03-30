<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest\ChangePasswordRequest;
use App\Models\User;

class UsersController extends Controller
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
    public function changePassword(ChangePasswordRequest $request, $id) {
        $user = User::find($id);

        if ($user) {
            $newPassword = $request['new_password'];

            $user->update([
                'password' => bcrypt($newPassword)
            ]);

            return redirect()->route('users.get-change-password', $id)->with('success', 'Successfully');
        }

        return redirect()->route('users.get-change-password', $id)->with('error', 'Error');
    }
}
