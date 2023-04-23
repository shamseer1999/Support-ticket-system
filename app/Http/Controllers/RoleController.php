<?php

namespace App\Http\Controllers;

use App\Models\Role;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $result=Role::where('status',1)->paginate(10);

        $data['results']=$result;
        return view('mngr.role.index',$data);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'name' =>'required'
            ]);

            $inset_arr=array(
                'role_name'=>$validated['name'],
                'status'=>1
            );

            Role::create($inset_arr);

            return redirect()->route('roles')->with('success','Role created successfully');
            
        }
        return view('mngr.role.add');
    }

    public function edit(Request $request,$id)
    {
        $role_id=decrypt($id);

        $editdata=Role::find($role_id);

        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'name' =>'required'
            ]);

            $editdata->role_name=$validated['name'];
            $editdata->save();

            return redirect()->route('roles')->with('success','Role updated successfully');
        }

        $data['edit_data']=$editdata;

        return view('mngr.role.edit',$data);
    }

    public function delete(Request $request,$id)
    {
        $role_id=decrypt($id);

        $editdata=Role::find($role_id);

        $editdata->status=2;
        $editdata->save();

        return redirect()->route('roles')->with('success','Role deleted successfully');
    }
}
