<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirectVkontakte()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function redirectYandex()
    {
        return Socialite::driver('yandex')->redirect();
    }

    public function signinYandex()
    {
        try {
            $user = Socialite::driver('yandex')->user();
            $userCol = User::where('ya_id', $user->id)->first();

            if ($userCol) {
                Auth::login($userCol);

                return redirect('/');
            } else {
                $addUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'ya_id' => $user->id,
                    'profile_photo_path' => $user->avatar,
                    'password' => encrypt('helloadmin'),
                ]);

                Auth::login($addUser);

                return redirect('/');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function signinVkontakte()
    {
        try {
            $user = Socialite::driver('vkontakte')->user();
            $userCol = User::where('vk_id', $user->id)->first();

            if ($userCol) {
                Auth::login($userCol);

                return redirect('/');
            } else {
                $addUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'vk_id' => $user->id,
                    'profile_photo_path' => $user->avatar,
                    'password' => encrypt('helloadmin'),
                ]);

                Auth::login($addUser);

                return redirect('/');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}