<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

use App\Models\Package;
use App\Models\Add_user;
use App\Models\Add_admin;
use App\Models\Area_Add;
use App\Models\Complain;
use App\Models\Forgot_pass;
use DB;
use Hash;
use Session;


class AdminaddController extends Controller
{
    //Insert data for new admin
    public function insertAdmin(Request $request){
        $request->validate([
            'adminname'=>'required',
            'adminmail'=>'required|email',
            'adminarea'=>'required',
            'adminpass'=>'required|min:5|max:12',
        ]);
        DB::table('add_admins')->insert([
            'adminname'=>$request->adminname,
            'adminmail'=>$request->adminmail,
            'adminarea'=>$request->adminarea,
            'adminpass'=>Hash::make($request->adminpass),
        ]);
        return back()->with('admin_add','Admin added successfully');
    }

    //Show all the data for admin page
    //Here i'm calling all the model for the compact value and sending to admin page
    public function showAdmin(){
        $values=Add_user::all();
        $results=Package::all();
        $datas=Add_admin::all();
        $final=Area_Add::all();
        $temp=Complain::all();
        $fpasses=Forgot_pass::all();

        //Admin's login purpose
        $admindata=array();
        if(Session::has('loginId')){
           $admindata=Add_admin::where('id','=',Session::get('loginId'))->first();
        }

        $userProfileData=array();
            if(Session::has('userloginId')){
               $userProfileData=Add_user::where('id','=',Session::get('userloginId'))->first();
            }
        //The overall compact data for adminHome page 
        return view('/admin/adminHome', compact('values','results','datas','final','temp','admindata','userProfileData','fpasses'));
    } 

    //Edit admin data
    public function editAdmin($id){
        $data=DB::table('add_admins')->where('id',$id)->first();
        return view('/admin/adminHome', compact('data'));
    }
    public function updateAdmin(Request $request){
        DB::table('add_admins')->where('id',$request->id)->update([
            'adminarea'=>$request->adminarea,
        ]);
        return back()->with('admin_update','Updated successfully');
    }
   

    //Custom login auth for admin
    public function loginAdmin(Request $request){
        $request->validate([
            'loginmail'=>'required',
            'loginpass'=>'required',
        ]);
        $adminlogin=Add_admin::where('adminmail',$request->loginmail)->first();
        if($adminlogin){
           if(Hash::check($request->loginpass,$adminlogin->adminpass)){
            $request->session()->put('loginId',$adminlogin->id);
            return redirect('showAdmin');
           } else{
            return back()->with('admin_login','The password is incorrect');
           }
        }
        else{
            return back()->with('admin_login','This email is not valid');
        }
    }
    //Lgout auth for admin
    public function logoutAdmin(){
        if(Session::has('loginId')){
            Session::pull('loginId');
        }
        return redirect('homePage');
    }


    //Admin Profile edit
    public function editAdminProfile($id){
        if(Session::has('loginId')){
           $data=DB::table('add_admins')->where('id',loginId)->first();
           return view('/admin/adminHome', compact('data'));
        }
    }

    //Update admin profile
    public function updateAdminProfile(Request $request){
        $adminID=$request->session()->get('loginId');
        
        $file=$request->file('adminspic');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('img/ProfilePic',$filename);

        $adminProfile=DB::table('add_admins')->where('id','=',Session::get('loginId'))->first();
        $adminProfile->adminpic=$filename;
 
        DB::table('add_admins')->where('id',$adminID)->update([
            'adminname'=>$request->adminsname,
            'adminpic'=>$filename,
        ]); 
        return back();
    }

    //Delete admin profile
    public function deleteAdmin($id){
        if(session()->get('loginId')!=$id){
            DB::table('add_admins')->where('id',$id)->delete();
        }
        else{
            return back()->with('admin_delete_text','You can not delete yourself');
        }
        return back()->with('admin_delete','Deleted successfully');
    }  
}