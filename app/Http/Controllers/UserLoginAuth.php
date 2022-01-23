<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Add_user;
use App\Models\Package;

use DB;
use Session;

class UserLoginAuth extends Controller
{
        //Custom login auth for user
        public function loginUser(Request $request){
            $request->validate([
                'loginmail'=>'required',
                'loginpass'=>'required',
            ]);
            $userlogin=Add_user::where('usermail',$request->loginmail)->first();
            if($userlogin){
               if($request->loginpass==$userlogin->userpass){
                $request->session()->put('userloginId',$userlogin->id);
                //
               return redirect('showUser');
                //
               } else{
                return back()->with('user_login','The password is incorrect');
               }
            }
            else{
                return back()->with('user_login','This email is not valid');
            }
        }

        //Show user data through user profile
        public function showUser(){
            $userProfileData=array();
            if(Session::has('userloginId')){
               $userProfileData=(DB::table('add_users')
               ->join('packages', 'add_users.userpackage', '=', 'packages.packagename')
               ->where('add_users.id', '=', Session::get('userloginId'))
               ->select('add_users.*', 'packages.packagespeed', 'packages.packagecosting')
               ->first());
            }
            return view('/other/userProfile')->with('userProfileData', $userProfileData);
        }
//User logout auth
        public function logoutUser(){
            if(Session::has('userloginId')){
                Session::pull('userloginId');
            }
            return redirect('homePage');
        }
    
    
    //User Profile edit from user
    public function editUserProfile($id){
        if(Session::has('userloginId')){
           $data=DB::table('add_users')->where('id',userloginId)->first();
           return view('/other/userProfile',compact('data'));
        }
    }
    //Delete Profile from user end
    public function updateUserProfile(Request $request){
        $userID=$request->session()->get('userloginId');
        
        $file=$request->file('usersimg');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('img/ProfilePic',$filename);
    
        $userProfile=DB::table('add_users')->where('id',$userID)->first();
        $userProfile->userimg=$filename;
    
        DB::table('add_users')->where('id',$userID)->update([
            'username'=>$request->usersname,
            'userreview'=>$request->usersreview,
            'userimg'=>$filename,
        ]); 
        return back();
    }
}
/*
DB::table('add_users')
            ->join('packages', 'add_users.userpackage', '=', 'packages.packagename')
            ->select('add_users.*', 'packages.packagespeed', 'packages.packagecosting')
            ->get();
            */