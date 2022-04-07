<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class FaceBookController extends Controller
{
    /**
     * Login Using Facebook
     */
    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $findUser = User::where('facebook_id', $user->id)->first();
            if($findUser){
                Auth::login($findUser);
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]);
                Auth::login($newUser);
            }
            return redirect()->route('home');
        } catch (Exception $e) {
            return false;
        }
    }

//    /**
//     * @return mixed
//     */
//    public function token(){
//        $token = JWTAuth::getToken();
//        if(!$token){
//            return false;
//            throw new BadRequestHtttpException('Token not provided');
//        }
//        try{
//            $token = JWTAuth::refresh($token);
//        }catch(TokenInvalidException $e){
//            throw new AccessDeniedHttpException('The token is invalid');
//        }
//        return $this->response->withArray(['token'=>$token]);
//    }
}
