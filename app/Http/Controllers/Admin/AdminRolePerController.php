<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminRolePerController extends Controller
{
    public function index(){
        $users = User::all();
        return view('backend.roleper.all',compact('users'));
    }

    public function role($id){
        $user = User::whereId($id)->first();
        $roles = Role::all();
        return view('backend.roleper.role',compact('user','roles'));
    }

    public function addRole($id,$rolename){
        $user = User::whereId($id)->first();
        if($user->assignRole($rolename)){
            return redirect()->back()->with('success','Role is successfully added');
        }else{
            return redirect()->back()->with('error','Fail');
        }
    }

    public function removeRole($id,$rolename){
        $user = User::whereId($id)->first();
        if($user->removeRole($rolename)){
            return redirect()->back()->with('success','Role is successfully removed');
        }else{
            return redirect()->back()->with('error','Fail');
        }
    }

    public function permission($id){
        $user = User::whereId($id)->first();
        $permissions = Permission::all();
        return view('backend.roleper.permission',compact('user','permissions'));
    }

    public function addPermission($id,$permitname){
        $user = User::whereId($id)->first();
        if($user->givePermissionTo($permitname)){
            return redirect()->back()->with('success','Permission is successfully added');
        }else{
            return redirect()->back()->with('error','Fail');
        }
    }

    public function removePermission($id,$permitname){
        $user = User::whereId($id)->first();
        if($user->revokePermissionTo($permitname)){
            return redirect()->back()->with('success','Permission is successfully removed');
        }else{
            return redirect()->back()->with('error','Fail');
        }
    }
}
