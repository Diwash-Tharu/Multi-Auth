<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginControler extends Controller
{
    //this method will call the another function inthe code
    public function index(){
        return view('admin.login');
    }
}
