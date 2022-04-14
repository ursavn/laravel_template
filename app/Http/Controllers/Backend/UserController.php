<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest\ChangePasswordRequest;
use App\Http\Requests\UsersRequest\CreateRequest;
use App\Http\Requests\UsersRequest\UpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

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
        return view('backend/profile/profile',compact('user'));
    }

    /**
     * @return View
     */
    public function edit(): View
    {
        $user = Auth::user();
        return view('backend/profile/edit',compact('user'));
    }

    /**
     * @param UpdateRequest $request
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();

        User::where('id', $user->id)
            ->update(['name' => $request->name, 'email' => $request->email]);

        return redirect()->route('profile.edit')->with('success', 'Successfully');
    }

    /**
     * @return View
     */
    public function getUserList() :view
    {
        $users = User::all();
        return view('backend/users/list', compact('users'));
    }

    /**
     * @param $id
     * @return RedirectResponse|View
     */
    public function getDetailUser($id) :RedirectResponse|view
    {
        $user = User::find($id);

        if ($user) {
            return view('backend/users/detail', compact('user'));
        }

        return redirect()->route('users.list')->with('error', 'Error');
    }

    /**
     * @return RedirectResponse|View
     */
    public function editUser($id): RedirectResponse|View
    {
        $user = User::with('roles')->where('id', $id)->first();

        if ($user) {
            $roles = Role::all();

            return view('backend/users/edit', compact(['user', 'roles']));
        }

        return redirect()->route('users.list')->with('error', 'Error');
    }

    /**
     * @param UpdateRequest $request
     * @return RedirectResponse
     */
    public function updateUser(UpdateRequest $request, $id): RedirectResponse
    {
        $user = User::find($id);

        if ($user) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            if ($user->roles->first()) $user->removeRole($user->roles->first());
            $user->assignRole($request->role);

            return redirect()->route('users.list')->with('success', 'Successfully');
        }

        return redirect()->route('users.list')->with('error', 'Error');
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('backend/users/create');
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ];

        User::create($data);

        return redirect()->route('users.list')->with('success', 'Successfully');
    }

    /**
     * @param ChangePasswordRequest $request
     * @return RedirectResponse
     */
    public function changePassword(ChangePasswordRequest $request, $id): RedirectResponse
    {
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

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function changeUserActiveStatus(Request $request, $id): RedirectResponse
    {
        $user = User::find($id);

        if ($user) {
            $newStatus = $request->active == OFF ? 1 : 0;
            $user->update(['active' => $newStatus]);

            return redirect()->route('users.list')->with('success', 'Successfully');
        }

        return redirect()->route('users.list')->with('error', 'Error');
    }
}
