<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegistrationController extends Controller
{
    
    function register(Request $request)
    {
        $input = $request->all();
        $hashedPassword  = Hash::make($request->password);
        $input['password']  = $hashedPassword;
        $user = User::create($input);
        if ($user) {
            session()->put('id', $user['id']);
            return view('login')->with(array('success' => 1, 'load' => 'login'));
        }
    }

    function loadRegistrationPage()
    {
        return view('register');
    }
    public function authenticate(Request $request)
    {
  
        $user = User::select()->where('email',$request->email)->get();
        session()->put('id', $user[0]['id']);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }
    }
    function homePage()
    {
        $id = session('id');
        $user =  User::find($id);
        return view('home')->with(array('select_user' => $user));
    }
    function editPage()
    {
        $id = session('id');
        $user = User::find($id);
        return view('edit_profile_page')->with(array('select_user' => $user, 'success' => 0));
    }
    function editDetails(Request $request)
    {
        $id = session('id');
        $update = User::where('id', $id)
            ->update(array('name' => $request->user_name, 'email' => $request->email));

        $user = User::find($id);
        if ($update) {
            return view('edit_profile_page')->with(array('success' => 1, 'select_user' => $user));
        }
    }
    public function logOut(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
