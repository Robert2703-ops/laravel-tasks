<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Http\Requests\access\UserValidateLogin;
use App\Http\Requests\access\UserValidateStore;
use App\Http\Requests\access\UserValidateUpdateName;
use App\Http\Requests\access\UserValidateUpdatePassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class UsersController extends Controller
{
    //Login
    public function login ()
    {
        if (Auth::check())
        {
            return redirect( route('home') );
        }
        return view("access.login");
    }

    // POST login, creating session
    public function authenticate (UserValidateLogin $request)
    {
        $info = $request->only('email', 'password');

        if ( Auth::attempt($info) )
        {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return $this->redirectBack("Senha incorreta!");;
    }

    //Create account
    public function register ()
    {
        if (Auth::check())
        {
            return redirect( route('home') );
        }
        return view("access.register");
    }

    // POST create an account
    public function store ( UservalidateStore $request )
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect('login');
    }

    //change user's password
    public function updatePassword (UserValidateUpdatePassword $request)
    {
        $password = Array ('oldPassword' => $request->oldpassword, 'newPassword' => $request->newpassword);
        if ($password['oldPassword'] === $password['newPassword'])
        {
            return $this->redirectBack("The new password can't be the same as the old one!");
        }
        
        $user = Auth::user();
        
        if (Hash::check($password['oldPassword'], $user['password']))
        {
            User::where('email', $user['email'])->update(['password' => Hash::make($password['newPassword']) ]);
            return redirect()->back()->with('message', 'Password changed!');
        }
        
        return $this->redirectBack("Incorrect password");;
    }

    // change user's name
    public function updateName (UserValidateUpdateName $request)
    {
        $user = Auth::user();
        $name = $request->name;
        User::where('email', $user['email'])->update(['name' => $name]);
        return redirect()->back();
    }

    // Redirect back
    private function redirectBack(string $message)
    {
        return redirect()->back()->withErrors(['message' => $message]);
    }
}
