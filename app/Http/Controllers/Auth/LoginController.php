<?php

namespace App\Http\Controllers\Auth;

use App\Auth\DiscordAuth;
use App\Auth\GithubAuth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToDiscord()
    {
        return Socialite::driver('discord')->redirect();
    }

    public function handleDiscordCallback()
    {
        $userInfo = Socialite::driver('discord')->user();

        if (!$userInfo->user['verified']) return redirect()->route('login')->withErrors(['verified' => 'Your discord account is not verified!']);

        $user = User::whereHas('discordAuth', function ($q) use($userInfo) {
            $q->where('id', $userInfo->getId());
        })->first();
        if ($user)
        {
            $user->discordAuth->updateTimestamps();
            $user->discordAuth->save();

            Auth::login($user);
            return redirect($this->redirectTo);
        }
        else
        {
            $user = new User([
                'name' => $userInfo->getNickname(),
                'email' => $userInfo->getEmail(),
            ]);
            $user->save();
            DiscordAuth::firstOrCreate([
                'user_id' => $user->id,
            ], [
                'id' => $userInfo->getId(),
                'avatar' => $userInfo->getAvatar(),
                'name' => $userInfo->getNickname(),
                'email' => $userInfo->getEmail(),
            ]);
            Auth::login($user);
            return redirect($this->redirectTo);
        }
    }

    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        $userInfo = Socialite::driver('github')->user();

        $user = User::whereHas('githubAuth', function ($q) use($userInfo) {
            $q->where('id', $userInfo->getId());
        })->first();
        if ($user)
        {
            Auth::login($user);
            return redirect($this->redirectTo);
        }
        else
        {
            $user = new User([
                'name' => $userInfo->getNickname(),
                'email' => $userInfo->getEmail(),
            ]);
            $user->save();
            GithubAuth::firstOrCreate([
                'user_id' => $user->id,
            ], [
                'id' => $userInfo->getId(),
                'avatar' => $userInfo->getAvatar(),
                'name' => $userInfo->getNickname(),
                'email' => $userInfo->getEmail(),
            ]);
            Auth::login($user);
            return redirect($this->redirectTo);
        }
    }
}
