<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\SocialiteAccount;
use App\User;
use Illuminate\Auth\Events\Registered as RegisteredEvent;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    use RedirectsUsers;

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $providerUser = Socialite::driver($provider)->user();
        } catch (\Throwable | \Exception $e) {
            // Send actual error message in development
            if (config('app.debug')) {
                throw $e;
            }
            // Lets suppress this error
            return redirect()->route('login')
                ->with('error', __('Unable to authenticate. Please try again.'));
        }

        DB::beginTransaction();

        $user = $this->findOrCreateUser($provider, $providerUser);
        Auth::login($user, true);

        // This session variable can help to determine if user is logged-in via socialite
        session()->put([
            'auth.social_id' => $providerUser->getId()
        ]);

        DB::commit();

        return $this->authenticated($user)
            ?: redirect()->intended($this->redirectPath());

    }

    protected function findOrCreateUser($providerName, $providerUser)
    {
        $social = SocialiteAccount::firstOrNew([
            'provider_user_id' => $providerUser->getId(),
            'provider' => $providerName
        ]);

        if ($social->exists) {
            return $social->user;
        }

        $user = User::firstOrNew([
            'email' => $providerUser->getEmail()
        ]);

        if (!$user->exists) {
            $user->name = $providerUser->getName();
            $user->password = bcrypt(str_random(30));
            $user->save();
            event(new RegisteredEvent($user));
        }

        $social->user()->associate($user);
        $social->save();

        return $user;

    }

    protected function authenticated(User $user)
    {

    }

    protected function redirectTo()
    {
        return route('home');
    }
}