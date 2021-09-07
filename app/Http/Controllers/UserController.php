<?php

namespace App\Http\Controllers;

use App\Models\UserSetting;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Отображается форму регистрации
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Регистрация пользователя
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        UserSetting::create([
           'user_id' => $user->id
        ]);

        session()->flash('success', 'Успешная регистрация');

        Auth::login($user);

        return redirect()->home();
    }

    /**
     * Отображает форму авторизации
     */
    public function loginForm()
    {
        return view('user.login');
    }

    /**
     * Отображает форму авторизации
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->home()->with('success', 'Добро пожаловать');
        }

        return redirect()->back()->with('error', 'Неворный логин или пароль');
    }

    /**
     * Разавторизовывает пользователя
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        return redirect()->route('user.loginForm');
    }

    public function profile()
    {
        return view('user.profile');
    }
    public function groups()
    {
        return view('user.groups');
    }
    public function settings()
    {
        return view('user.settings');
    }
}
