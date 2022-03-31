<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest\ChangePasswordRequest;
use App\Http\Requests\UsersRequest\CreateRequest;
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

    /**
     * @return View
     */
    public function create(): View
    {
        return view('backend/users/create');
    }

    /**
     * @param CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(CreateRequest $request)
    {
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ];

        User::create($data);

        return redirect()->route('users.list');
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

    public function changeUserActiveStatus(Request $request, $id)
    {
        $user = User::find($id);
        $newStatus = $request->active == OFF ? 1 : 0;
        $user->update(['active' => $newStatus]);
        return redirect()->route('users.list');
    }
}
