<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
        public function maintenance(){
        $user = DB::table('users')->select()->get();
        $roles = DB::table('roles')->select()->get();

        return view('admin.maintenance', compact('user', 'roles'));
    }

    public function deleteAccount($id){
        $user = User::where('id', '=', $id)->first();

        if (isset($user)) {
            $image_path = public_path('/images').'/'.$user->filename;
            $user->delete();
        }

        return redirect('/maintenance')->with('success', 'Delete Account successfuly!');
    }

    public function updateRole($user_id){
        $user = User::where('id', "=", $user_id)->first();

        return view('admin.updateRole')
            ->with('user', $user);
    }

    // public function updateRoleDetail(Request $request, $role_id){

    //     // $user = User::where('id', "=", $request->id)->first();

    //     // $rules = [
    //     //     'role_id' => ['required', 'in:1,2']
    //     // ];

    //     // $validatedData = $request->validate($rules);

    //     // $validator = Validator::make($request->all(), $rules);

    //     // if ($validator->fails()) {
    //     //     return redirect()->back()->withErrors($validator);
    //     // }


    //     // $user = User::where('id', Auth::user()->id)->first();

    //     // $user = new User();
    //     // $user = Roles::where('id', "=", $role_id)->first();
    //     $user = Roles::find($role_id);
    //     $user->role_id = $request->role_id;

    //     $user->update();
    //     return redirect('/maintenance')->with('success', 'Update Role successfuly!');
    // }

    public function updateRoleDetail(Request $request,$user_id){

        $user = User::find($user_id);
        if($user){
            $user->role_id = $request->role_id;
            $user->update();
            return redirect('/maintenance')->with('success', 'Update Role successfuly!');
        }
        $user->update();
        return redirect('/maintenance')->with('success', 'Update Role successfuly!');
    }



}
