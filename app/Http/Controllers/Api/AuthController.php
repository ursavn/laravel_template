<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest\RegisterRequest;
use App\Http\Requests\Api\AuthRequest\UpdateProfileRequest;
use App\Http\Requests\Api\ChangePasswordRequest;
use App\Http\Requests\Api\UsersRequest\ChangePasswordRequest as ResetPasswordRequest;
use App\Http\Requests\SendMailRequest;
use App\Mail\NotifyMail;
use App\Models\PasswordReset;
use Facebook\Facebook;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        if (! $token = JWTAuth::attempt($validator->validated())) {
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

        $user->assignRole(USER_ROLE);

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
        $user = auth()->user()->toArray();
        $role = auth()->user()->getRoleNames()->first();
        $user['roles'] = $role ?? null;
        return response()->json($user);
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
            'expires_in' => auth('api')->factory()->getTTL() * 60,
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
        $user = auth()->user();

        if (!(Hash::check($request->current_password, $user->password))) {
            return response()->json([
                'message' => 'The current password is incorrect.',
            ], 401);
        }

        if (strcmp($request->current_password, $request->new_password) == false) {
            return response()->json([
                'message' => 'The new password is the same as the current password.',
            ], 401);
        }

        User::where('id', $user->id)->update(
            ['password' => bcrypt($request->new_password)]
        );

        return response()->json([
            'message' => 'User successfully changed password',
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

    /**
     * @param SendMailRequest $request
     * @return JsonResponse
     */
    public function sendMailChangePassword(SendMailRequest $request): JsonResponse
    {
        $otpCode = mt_rand(OTP_CODE_MIN, OTP_CODE_MAX);

        Mail::to($request->email)->send(new NotifyMail($otpCode));

        PasswordReset::create([
            'email' => $request->email,
            'otp_code' => $otpCode
        ]);

        return response()->json(['message' => 'Great! Successfully send in your mail']);
    }

    /**
     * @param SendMailRequest $request
     * @return JsonResponse
     */
    public function confirmOtp(Request $request): JsonResponse
    {
        $passwordResetQuery = PasswordReset::where('email', $request->email)
                        ->orderBy('created_at', 'desc');

        $passwordReset = $passwordResetQuery->first();

        if ($passwordReset) {
            if ($request->otp_code === $passwordReset->otp_code) {
                $now    = date('Y-m-d H:i:s');
                $expiry = $passwordReset->created_at;
                $expiry = date('Y-m-d H:i:s', strtotime('+' . OTP_CODE_EXPIRY, strtotime($expiry)));

                if ($now <= $expiry) {
                    $passwordResetQuery->delete();

                    return response()->json(['message' => 'OTP is currect']);
                }

                return response()->json(['message' => 'OTP has expired'], 401);
            }

            return response()->json(['message' => 'OTP is not currect'], 401);
        }

        return response()->json(['message' => 'not found data'], 404);
    }

    /**
     * @param ResetPasswordRequest $request
     * @return JsonResponse
     */
    public function resetPassword(ResetPasswordRequest $request): JsonResponse
    {
        $user = Auth::user();

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
}
