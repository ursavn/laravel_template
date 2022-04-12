<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest\RegisterRequest;
use App\Http\Requests\Api\AuthRequest\UpdateProfileRequest;
use App\Http\Requests\Api\ChangePasswordRequest;
use Facebook\Facebook;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]
        );

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function userProfile(): JsonResponse
    {
        return response()->json(auth()->user());
    }

    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function updateUserProfile(UpdateProfileRequest $request): JsonResponse
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return response()->json([
            'message' => 'Profile successfully updated',
            'user' => $user
        ]);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     * @return JsonResponse
     */
    protected function createNewToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    /**
     * Change users password
     * @param Request $request
     * @return JsonResponse
     */
    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        $userId = auth()->user()->id;

        $user = User::where('id', $userId)->update(
            ['password' => bcrypt($request->new_password)]
        );

        return response()->json([
            'message' => 'User successfully changed password',
            'user' => $user,
        ], 201);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Facebook\Exceptions\FacebookSDKException
     */
    public function loginWithFacebook(Request $request): JsonResponse
    {
        $facebook = $request->only('access_token');
        if (!$facebook || !isset($facebook['access_token'])) {
            return response()->json(['message' => 'Login facebook failed',], 401);
        }
        $fb = new Facebook([
            'app_id' => config('services.facebook.app_id'),
            'app_secret' => config('services.facebook.app_secret'),
        ]);

        try {
            $response = $fb->get('/me?fields=id,name,email,link,birthday', $facebook['access_token']);
            $profile = $response->getGraphUser();
            if (!$profile || !isset($profile['id'])) {
                return response()->json(['message' => 'Login facebook failed',], 401);
            }

            $user = User::where('facebook_id', $profile['id'])->first();
            if(!$user){
                $user = User::create([
                    'name' => $profile->getName(),
                    'email' => $profile->getEmail(),
                    'facebook_id'=> $profile->getId(),
                    'password' => Hash::make($profile->getName().'@'.$profile->getId())
                ]);
            }

            $token = JWTAuth::fromUser($user);
            return response()->json([
                'token' => $token,
                'message' => 'Login facebook successfully',
                'user' => $user,
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error when login with facebook: ' . $e->getMessage());
            return response()->json(['message' => 'Login facebook failed',], 401);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function loginWithGoogle(Request $request): JsonResponse
    {
        $idToken = $request->get('id_token');
        if (!$idToken) {
            return response()->json(['message' => 'Login google failed',], 401);
        }

        try {
            $client = new \Google_Client(['client_id' => config('services.google.client_id')]);
            $payload = $client->verifyIdToken($idToken);
            if (!$payload) {
                return response()->json(['message' => 'Login google failed',], 401);
            }

            $user = User::where('google_id', $payload['sub'])->first();
            if(!$user){
                $user = User::create([
                    'name' => $payload['name'],
                    'email' => $payload['email'],
                    'google_id'=> $payload['sub'],
                    'password' => Hash::make($payload['name'].'@'.$payload['sub'])
                ]);
            }

            $token = JWTAuth::fromUser($user);

            return response()->json([
                'token' => $token,
                'message' => 'Login google successfully',
                'user' => $user,
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error when login with google: ' . $e->getMessage());
            return response()->json(['message' => 'Login google failed',], 401);
        }
    }
}
