<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegistrationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth_middleware');
    //     $this->user = Auth::User();
    // }
    function Register(Request $request)
    {
    $user            = new User;
    $user->name      = $request->user_name;
    $hashedPassword  = Hash::make($request->password);
    $user->password  = $hashedPassword;
    //Hash::make('secret');
    $user->email     = $request->email;
    if($user->save())
    {
        return view('login')->with(array('success'=> 1,'load'=>'login'));
    }
    }
    function loadRegistrationPage()
    {
        return view('register');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        session()->put('email',$request->email );
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('home');
        }
    }
    function homePage()
    {
        $email = session('email');
        $select =  $select = User::select('name','email')->where('email',$email)->get();
        return view('home')->with(array('select_user'=>$select));
    }
    function edit_page()
    {
        $email = session('email');
        $select = User::select('name','email')->where('email',$email)->get();
        return view('edit_profile_page')->with(array('select_user'=>$select,'success'=>0));
    }
    function edit_details(Request $request)
    {
        $email = session('email');
        $update = User::where('email',$email)
        ->update(array('name' => $request->user_name, 'email' => $request->email));
        $select = User::select('name','email')->where('email',$email)->get();
        if($update)
        {
            return view('edit_profile_page')->with(array('success'=>1 ,'select_user'=>$select));
        }
    }
    public function logOut(Request $request)
    {
        //echo ('hi');
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
