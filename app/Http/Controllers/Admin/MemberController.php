<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class MemberController extends Controller
{
    public function index(){
        $members = User::latest()->where('role_id', 2)->paginate(8);
        return view('admin.members', compact('members'));
    }

    public function destroy($id){
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Member Deleted Successfully');
    }
}
