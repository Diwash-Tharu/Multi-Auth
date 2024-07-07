<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    //THis function will return the login page for customer
    public function index(){
        return view('login');
    }
}
