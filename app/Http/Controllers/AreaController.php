<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* use App\Models\Package;
use App\Models\Add_user;
use App\Models\Add_admin; */
use App\Models\Area_Add;
use DB;

class AreaController extends Controller
{
    //Insert area for the ISP service
    public function insertArea(Request $request){
        $request->validate([
            'areaname'=>'required',
            'areadetails'=>'required|min:10|max:60',
        ]);
        DB::table('area_adds')->insert([
            'areaname'=>$request->areaname,
            'areadetails'=>$request->areadetails,
        ]);
        return back()->with('area_add','Area added successfully');
    }

    //Delete the area where we are closing our activity
    public function deleteArea($id){
        DB::table('area_adds')->where('id',$id)->delete();
        return back()->with('area_delete','Area removed successfully');
    }
}
