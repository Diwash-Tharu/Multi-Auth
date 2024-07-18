<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class loginController extends Controller
{
    //THis function will return the login page for customer
    public function index(){
        return view('login');
    }

    // this method will aunthicate the use 
    public function authenticate(Request $request)
    {
        $validatoe = validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validatoe->passes()){
            
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                // return redirect()->route('home');
                return redirect()->route('home');
            }
            else{
                return redirect()->route('login.page')->with('error','Invalid email or password');
            }
            // return redirect()->back()->withErrors($validatoe)->withInput();
        }
        else{
            // return view('login');
            return redirect()->route('login.page')
            ->withErrors($validatoe)
            ->withInput();
        }

    }

    public function register(){
        // Auth::logout();
        // return redirect()->route('login.page');
        return view('register');
    }

    public function processRegister(Request $request)
    {
        $validatoe = validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        if($validatoe->passes()){
            
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role='customer';
            $user->save();
            
            return redirect()->route('login.page')->with('success','Account created successfully');
            // return redirect()->back()->withErrors($validatoe)->withInput();
        }
        else{
            // return view('login');
            return redirect()->route('register.page')
            ->withErrors($validatoe)
            ->withInput();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.page');
    }

}
