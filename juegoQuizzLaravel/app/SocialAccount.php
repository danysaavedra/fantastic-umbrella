<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Socialite\Contracts\Provider;
use App\User;

class SocialAccount extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function createOrGetUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)->whereProviderUserId($providerUser->getId())->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new SocialAccount(
                [
                    'provider_user_id' => $providerUser->getId(),
                    'provider' => $providerName,
                ]
            );

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user = User::create(
                    [
                        'email' => $providerUser->getEmail(),
                        'name' => $providerUser->getName(),
                        'password' => bcrypt($providerUser->getId())
                    ]
                );

                $account->user()->associate($user);
                $account->save();
                return $user;
            }
        }
    }
}
