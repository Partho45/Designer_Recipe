<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class SettingsController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('member.profile.index', compact('user'));
    }

    public function edit(){
        $user = Auth::user();
        return view('member.profile.edit', compact('user'));
    }
    public function updateProfile(Request $request){
       
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'numeric'],
            'contact' => 'required|numeric|unique:users,contact,'. Auth::id(),
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->age = $request->age;
        $user->contact = $request->contact;
        $user->save();
        return redirect(route('member.profile'))->with('success', 'Profile Updated Successfully');
    }
}
