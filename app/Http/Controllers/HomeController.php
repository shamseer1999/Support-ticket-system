<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $data['users']= User::get()->count();
        $data['roles']= Role::where('status','=',1)->get()->count();

        $query= Ticket::query();
        if(auth()->user()->role ==3)
        {
            $ticket= $query->where('status','=',1)->get()->count();
        }
        elseif(auth()->user()->role ==1)
        {
            $userId=auth()->user()->id;
            $ticket= $query->where(['status'=>1,'user_id'=>$userId])->get()->count();
        }
        $data['tickets'] =$ticket;
        
        return view('mngr.index',$data);
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
