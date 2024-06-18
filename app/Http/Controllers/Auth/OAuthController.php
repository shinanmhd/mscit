<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    /*
     * redirect to the given provider (google, facebook)
     * */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /*
     * Handle OAuth callback
     * ---------------------
     * upon logging in from the provider, the provider calls back to our given url
     * */
    public function handleProviderCallback($provider)
    {
        /*
         * in case an error occurs while fetching the user from socialite
         * redirect back to the login page with a message
         * */
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect(route('login'))
                ->withErrors(['msg' => 'Unable to retrieve your details from provider']);
        }

        /*
         * check if they're an existing user
         * - log the user in if they exist
         * - create the user if they don't exist
         * */
        $existing = User::where('email', $user->email)->first();
        if ($existing) {
            auth()->login($existing);
        } else {
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->provider        = $provider;
            $newUser->provider_id     = $user->id;
            $newUser->avatar          = $user->avatar;
            $newUser->avatar_original = $user->avatar_original;
            $newUser->save();
            auth()->login($newUser);
        }

        if (auth()->user()->profile->isComplete())
            return redirect(route('home'));

        return redirect(route('user.profile.edit'));
    }
}
