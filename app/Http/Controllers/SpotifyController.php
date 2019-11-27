<?php

namespace App\Http\Controllers;

use App\User;
use Socialite;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Redirect;

class SpotifyController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::with('spotify')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('spotify')->user();
        $auth_user = User::firstOrCreate(['name' => $user->name, 'email' => $user->email, 'unique_identifier' => $user->id]);
        if($auth_user->wasRecentlyCreated) {
            $auth_user->name = $user->name;
            $auth_user->email = $user->email;
            $auth_user->api_token = $user->token;
            $auth_user->unique_identifier = $user->id;
            $auth_user->save();
        }
        $token = JWTAuth::fromUser($auth_user);
        auth()->login($auth_user);
        return Redirect::to('http://localhost:8080/dashboard?token=' . $token . '&userId=' . $auth_user->id);


    }
}