<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginControler extends Controller
{
    //this method will call the another function inthe code
    public function index(){
        return view('admin.login');
    }

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


}
