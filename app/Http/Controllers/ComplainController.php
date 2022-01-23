<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ComplainController extends Controller
{
    //Insert complain from visitor 
    public function insertComplain(Request $request){
        $request->validate([
            'complainee'=>'required|email|unique:complains',
            'complain'=>'required',
        ]);
        DB::table('complains')->insert([
            'complainee'=>$request->complainee,
            'complain'=>$request->complain,
        ]);
        return back()->with('complain_add','Complain submitted successfully');
    }

    //After resolving that admin delete that complain
    public function deleteComplain($id){
        DB::table('complains')->where('id',$id)->delete();
        return back()->with('complain_delete','Complain removed successfully');
    }
}
