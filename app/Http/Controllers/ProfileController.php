<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Hash;
use App\Http\Controllers\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\User;
use App\Models\Genders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $user = User::where('id', Auth::user()->id)->first();
        return view('profile', compact('user'));
    }


    public function update(Request $request)
    {
        $authenticated = Auth::user();
        $rules = [
            'first_name' => ['required','min:3', 'max:25'],
            'last_name' => ['required', 'min:3', 'max:25'],
            'email' => ['required', 'email:dns', 'unique:users,email'],
            'password'  => 'confirmed',
            'image' => 'required | image | mimes:jpg,png,jpeg,gif,svg',
            'gender_id' => ['required', 'in:1,2'],
            'role_id' => ['required', 'in:1,2']
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = User::where('id', Auth::user()->id)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->gender_id = $request->gender_id;

        $file = $request->file('image');
        $imageName = $file->getClientOriginalName();
        $request->image->move(public_path('/images'), $imageName);
        $user->image = $imageName;

        if($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->update();

        return redirect('/profile')->with('success', 'Update profile successfuly!');
    }
}
