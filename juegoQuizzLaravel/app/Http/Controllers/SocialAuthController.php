<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\SocialAccount;
use Illuminate\Support\Facades\Auth;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(SocialAccount $service, $provider)
    {
        $user = $service->createOrGetUser(Socialite::driver($provider));

        if ($user) {
            Auth::login($user);
        }

        return redirect('/juegos');
    }
}
