<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthSocialtyController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function login($user) {
        $userdata = User::where('email',  $user->email)->first();
        if (!$user || !Hash::check($user->password, $userdata->password)) {
            return response()->json([
                'status' => 422,
                'message' => ['Username or password incorrect'],
                'data' => []
            ],422);
        }
        $user->tokens()->delete();
        $token = $user->createToken($user->name . '@allsafe')->plainTextToken;
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $checkuser = User::where('social_id', $user->id)->first();
        if($checkuser){
            $this->login($checkuser);
        }else{
            $user = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make($user->password),
            ]);
            $this->login($checkuser);
        }
    }

    // public function redirectfacebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }
    // public function redirecttwitter()
    // {
    //     return Socialite::driver('twitter')->redirect();
    // }
    //

    // public function handleFacebookCallback()
    // {
    //     $key = request('r');
    //     $userfrom = User::where('referrals',$key)->first();
    //     $user = Socialite::driver('facebook')->user();
    //     $checkuser = User::where('social_id', $user->id)->first();
    //     if($checkuser){
    //         Auth::login($checkuser);
    //         return redirect()->route('dashboard');
    //     }else{
    //         $new = User::create([
    //             'fname' => $user->name,
    //             'email' => $user->email,
    //             'social_id' => $user->id,
    //             'social_type' => 'facebook',
    //             'password' => Hash::make($user->password),
    //             'referrals' => Str::random(20),
    //         ]);
    //         $userdetails = UserDetails::create([
    //             'balance' => 0,
    //             'Deposit' =>0,
    //             'token' => 0,
    //             'user_id' => $new->id,
    //             'exp_number' => 0
    //         ]);
    //         Auth::login($new);
    //         return redirect()->route('dashboard');

    //     }
    // }


    // public function handleTwitterCallback()
    // {
    //     $key = request('r');
    //     $userfrom = User::where('referrals',$key)->first();
    //     $user = Socialite::driver('twitter')->user();
    //     $checkuser = User::where('social_id', $user->id)->first();
    //     if($checkuser){
    //         Auth::login($checkuser);
    //         return redirect()->route('dashboard');
    //     }else{
    //         $new = User::create([
    //             'fname' => $user->name,
    //             'email' => $user->email,
    //             'social_id' => $user->id,
    //             'social_type' => 'twitter',
    //             'password' => Hash::make($user->password),
    //             'referrals' => Str::random(20),
    //         ]);
    //         $userdetails = UserDetails::create([
    //             'balance' => 0,
    //             'Deposit' =>0,
    //             'token' => 0,
    //             'user_id' => $new->id,
    //             'exp_number' => 0
    //         ]);
    //         Auth::login($new);
    //         return redirect()->route('dashboard');

    //     }
    // }


}
