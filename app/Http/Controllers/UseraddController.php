<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

use App\Models\Add_user;
use DB;
use Session;

class UseraddController extends Controller
{
    //Insert new user
    public function insertUser(Request $request){
        $request->validate([
            'usermail'=>'required|email',
            'userpass'=>'required|min:5|max:12',
            'userpackage'=>'required',
        ]);
        DB::table('add_users')->insert([
            'usermail'=>$request->usermail,
            'userpass'=>$request->userpass,
            'userpackage'=>$request->userpackage,
        ]);
        return back()->with('user_add','User added successfully');
    }
    //Edit user from admin
    public function editUser($id){
        $result=DB::table('add_users')->where('id',$id)->first();
        return view('/admin/adminHome', compact('result'));
    }

    //Update user data from admin
    public function updateUser(Request $request){
        DB::table('add_users')->where('id',$request->id)->update([
            'usermail'=>$request->usermail,
            'userpass'=>$request->userpass,
            'userpackage'=>$request->userpackage,
        ]);
        return back()->with('user_update','Updated successfully');
    }
//Delete user data from admin
    public function deleteUser($id){
        DB::table('add_users')->where('id',$id)->delete();
        return back()->with('user_delete','User Deleted successfully');
    }
}