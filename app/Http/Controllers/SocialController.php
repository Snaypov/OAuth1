<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class SocialController extends Controller
{
    public function redirect(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(){
        $user = Socialite::driver('facebook')->user();
        $isUser = User::where('email', $user->email)->first();

        if($isUser){
            Auth::login($isUser);
            return redirect()->route('home');
        }
        else{
            $createUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make('12345678'),
            ]);

            Auth::login($createUser);
            return redirect('home');
        }
    }

    public function redirectGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){
        $user = Socialite::driver('google')->user();
        $isUser = User::where('email', $user->email)->first();

        if($isUser){
            Auth::login($isUser);
            return redirect()->route('home');
        }
        else{
            $createUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make('12345678'),
            ]);

            Auth::login($createUser);
            return redirect('home');
        }
    }

    public function redirectGit(){
        return Socialite::driver('github')->redirect();
    }

    public function callbackGit(){
        $user = Socialite::driver('github')->user();
        $isUser = User::where('email', $user->email)->first();

        if($isUser){
            Auth::login($isUser);
            return redirect()->route('home');
        }
        else{
            $createUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make('12345678'),
            ]);

            Auth::login($createUser);
            return redirect('home');
        }
    }
}
