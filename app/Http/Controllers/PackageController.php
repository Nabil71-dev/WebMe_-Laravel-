<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
/* use App\Models\Add_user;
use App\Models\Add_admin;
use App\Models\Area_Add;
use App\Models\Complain; */
use DB;

class PackageController extends Controller
{
    //Insert new package for isp
    public function insertPackage(Request $request){
        $request->validate([
            'packagename'=>'required',
            'packagespeed'=>'required',
            'packageactivity'=>'required',
            'packagecode'=>'required',
            'packagecosting'=>'required',
        ]);
        DB::table('packages')->insert([
            'packagename'=>$request->packagename,
            'packagespeed'=>$request->packagespeed,
            'packageactivity'=>strtolower($request->packageactivity),
            'packagecode'=>$request->packagecode,
            'packagecosting'=>$request->packagecosting,
        ]);
        return back()->with('package_add','Package added successfully');
    }
//Edit package for isp
    public function editPackage($id){
        $result=DB::table('packages')->where('id',$id)->first();
        return view('/admin/adminHome', compact('result'));
    }
    //Update package for isp
    public function updatePackage(Request $request){
        DB::table('packages')->where('id',$request->id)->update([
            'packagename'=>$request->packagename,
            'packagespeed'=>$request->packagespeed,
            'packageactivity'=>strtolower($request->packageactivity),
            'packagecode'=>$request->packagecode,
            'packagecosting'=>$request->packagecosting,
        ]);
        return back()->with('post_update','Updated successfully');
    }
    //Delete package for isp
    public function deletePackage($id){
        DB::table('packages')->where('id',$id)->delete();
        return back()->with('post_delete','Deleted successfully');
    }  
}