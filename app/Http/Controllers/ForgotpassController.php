<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendForgotpass;
use DB;
use Mail;

class ForgotpassController extends Controller
{
    //User send data for the forgot query
    public function insertforgot(Request $request){
        $request->validate([
            'fmail'=>'required|email',
            'fpackname'=>'required',
        ]);
        DB::table('forgot_passes')->insert([
            'fmail'=>$request->fmail,
            'fpackname'=>$request->fpackname,
        ]);
        return view('/homePage');
    }

    //After resolve the issue admin can delete that request
    public function deleteforgot($id){
        DB::table('forgot_passes')->where('id',$id)->delete();
        return back();
    } 

    //Send forgot pass for user through mail
    public function sendforgotpass(Request $request){
        $request->validate([
            'sendmail'=>'required|email',
            'sendmailbody'=>'required',
        ]);
        Mail::send('email_template',[
        'Send'=>$request->sendmailbody
        ],function($massage)use ($request){
            $massage->to($request->sendmail);
            $massage->subject('New password for webMe');
        });
        return back();
    }
}