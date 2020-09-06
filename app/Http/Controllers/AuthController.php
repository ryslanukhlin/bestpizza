<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\user;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerview()
    {
        return view('pages.Register');
    }

    public function SugnInview()
    {
        return view('pages.SugnIn');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
           'email' => 'required|email|unique:user',
            'name' => 'required|unique:user',
            'password' => 'required'
        ]);

        user::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        return view('pages.home');
    }

    public function SugnIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only(['email','password']), $request->has('remember') ))
        {
            return view('pages.SugnIn',['info' => 'Неправильный логин или пароль']);
        }
        return view('pages.Home',['info' => 'Вы зарегестрированы!']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
