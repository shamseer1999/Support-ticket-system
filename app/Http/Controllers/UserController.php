<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;

use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users=User::with('roles')->paginate(10);
        //dd($users);
        $data['results']=$users;
        return view('mngr.user.index',$data);
    }
    public function add(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'name' =>'required',
                'email' =>'required|unique:users,email',
                'role' =>'required',
                'password' =>'required'
            ]);

            $ins_arr=array(
                'name'=>$validated['name'],
                'email'=>$validated['email'],
                'role'=>$validated['role'],
                'password'=>bcrypt($validated['password'])
            );

            User::create($ins_arr);

            return redirect()->route('users')->with('success','User created successfully');
        }
        $roles=Role::where('status',1)->get();

        $data['roles']=$roles;
        return view('mngr.user.add',$data);
    }

    public function edit(Request $request,$id)
    {
        $role_id=decrypt($id);
        $user=User::find($role_id);
        $roles=Role::where('status',1)->get();

        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'name' =>'required',
                'role' =>'required'
            ]);

            $user->name = $validated['name'];
            $user->role = $validated['role'];
            $user->save();

            return redirect()->route('users')->with('success','User updated successfully');
        }

        $data['editdata']=$user;
        $data['roles']=$roles;
        return view('mngr.user.edit',$data);
    }
}
