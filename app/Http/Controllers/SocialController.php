<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function loginWithGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            $isUser = User::where('google_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);

                return redirect('/');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => encrypt('user'),
                    'google_id' => $user->id,
                ]);

                Auth::login($createUser);

                return redirect('/');
            }
        }catch (Exception $exception){
            dd($exception->getMessage());
        }
    }

}
