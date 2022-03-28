<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function loginUsingGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|boolean
     * @throws \Throwable
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();
            if($findUser){
                Auth::login($findUser);
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]);
                Auth::login($newUser);
            }
            return redirect()->route('home');
        } catch (Exception $e) {
            return false;
        }
    }
}
