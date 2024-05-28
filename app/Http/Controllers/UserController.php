<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginEmail' => 'required',
            'loginPassword' => 'required'
        ]);

        if(auth()->attempt(['email' => $incomingFields['loginEmail'], 'password' => $incomingFields['loginPassword']])){
            $request->session()->regenerate();
        }else{
            return redirect('/signIn');
        }

        return redirect('/');
    }

    public function register(Request $request){
        $incomingFields = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function deleteUser(User $user){
        if(auth()->user()->id === $user->id){
            $user->showUsersProducts()->delete();
            $user->delete();
        }
        return redirect('/');
    }

    public function loadUserPage(User $user){
        if(auth()->user()->id === $user->id)
            return redirect('/profile');

        return view('user', ['user' => $user]);
    }
}
