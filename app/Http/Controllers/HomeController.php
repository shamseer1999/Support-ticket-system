<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('mngr.index');
    }
    public function login(Request $request)
    {

        if($request->isMethod('post'))
        {
            $logdata=array(
                'email'=>$request->email,
                'password'=>$request->password
            );

            if(auth()->attempt($logdata))
            {
                return redirect()->intended('/dashbord')->with('success','You are loggined successfully');
            }else{
                return redirect()->route('login')->with('danger','Invalid login credentials');
            }
        }
        return view('mngr.login');
    }
}
