<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\User;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function auth(Request $request) {
        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials, $remember = true)) {
            $request->session()->regenerate();
            return redirect()->intended();
        }
        return back()->with('error', 'Неправильный логин или пароль');
    }

    public function get_login(Request $request) {
        $user = new User();
        $password = Str::random(6);
        $user->create($password);
        if ($user->id) {
          Auth::login($user, $remember = true);
          return back()->with('success', 'Новый пользователь <b>'.$user->name.'</b> создан для вас! Логин: '.$user->login.' Пароль: '.$password);
        } else {
          return back()->with('error', 'Что-то пошло не так, регистрация невозможна');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
