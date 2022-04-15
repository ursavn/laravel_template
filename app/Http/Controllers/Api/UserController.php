<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UsersRequest\ChangePasswordRequest;
use App\Http\Requests\Api\UsersRequest\CreateRequest;
use App\Http\Requests\Api\UsersRequest\UpdateRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api');
    }

    /**
     * Get Users.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $users = User::all();

        return response()->json($users);
    }

    /**
     * Get User.
     *
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        $user = User::find($request->id);

        if ($user) {
            return response()->json($user);
        }

        return response()->json(['message' => 'not found data'], 404);
    }

    /**
     * Post create User.
     *
     * @return JsonResponse
     */
    public function store(CreateRequest $request): JsonResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' => now()
        ]);

        $user->assignRole($request->role);

        return response()->json([
            'message' => 'User successfully created',
            'user' => $user
        ]);
    }

    /**
     * Post update User.
     *
     * @return JsonResponse
     */
    public function update(UpdateRequest $request): JsonResponse
    {
        $user = User::find($request->id);

        if ($user) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            if ($user->roles->first()) $user->removeRole($user->roles->first());
            $user->assignRole($request->role);

            return response()->json([
                'message' => 'User successfully updated',
                'user' => $user
            ]);
        }

        return response()->json(['message' => 'not found data'], 404);
    }

    /**
     * Post change password User.
     *
     * @return JsonResponse
     */
    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        $user = User::find($request->id);

        if ($user) {
            $user->update([
                'password' => bcrypt($request->new_password)
            ]);

            return response()->json([
                'message' => 'User successfully changed password',
                'user' => $user
            ]);
        }

        return response()->json(['message' => 'not found data'], 404);
    }

    /**
     * Post change permission User.
     *
     * @return JsonResponse
     */
    public function changePermission(Request $request): JsonResponse
    {
        $user = User::find($request->id);

        if ($user) {
            if ($user->roles->first()) $user->removeRole($user->roles->first());

            $user->assignRole($request->role);

            return response()->json([
                'message' => 'User successfully changed permission',
                'user' => $user
            ]);
        }

        return response()->json(['message' => 'not found data'], 404);
    }

    /**
     * Post active/deactive User.
     *
     * @return JsonResponse
     */
    public function active(Request $request): JsonResponse
    {
        $user = User::find($request->id);

        if ($user) {
            $status = $request->active == OFF ? 1 : 0;
            $user->update(['active' => $status]);

            return response()->json(['message' => 'successfully']);
        }

        return response()->json(['message' => 'not found data'], 404);
    }
}
