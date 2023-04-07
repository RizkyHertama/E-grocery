<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function viewRegisterPage()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $rules = [
            'first_name' => ['required','min:3', 'max:25'],
            'last_name' => ['required', 'min:3', 'max:25'],
            'email' => ['required', 'email:dns', 'unique:users,email'],
            'password' => ['required', 'min:8'],
            'password_confirmation' => ['required', 'same:password'],
            'image' => 'required | image | mimes:jpg,png,jpeg,gif,svg',
            'gender_id' => ['required', 'in:1,2'],
            'role_id' => ['required', 'in:1,2']
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender_id = $request->gender_id;

        $file = $request->file('image');
        $imageName = $file->getClientOriginalName();
        $request->image->move(public_path('/images'), $imageName);
        $user->image = $imageName;

        $user->save();

        return redirect('/register')->with('success', 'Registration successful! Please login!');

    }
}
