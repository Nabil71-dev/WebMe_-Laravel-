<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UseraddController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\AdminaddController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\ForgotpassController;
use App\Http\Controllers\UserLoginAuth;


/*---------Home Page routes--------*/
Route::get('/', function () {
    return view('/homePage');
});
/*---------Allpackage Page routes--------*/
Route::view('/allPackage','/other/allPackage')->name('allPackage'); 

/*---------Admin login/logout auth routes--------*/
Route::view('/homePage','/homePage')->name('homePage')->middleware('Adminlogout');


/*-------Combined routes for admin page--------*/ 
Route::get('showAdmin',[AdminaddController::class,'showAdmin'])->middleware('isAdminloggedin');

/*----------------CRUD routes-------------*/

//User crud for admin
Route::post('user_add',[UseraddController::class,'insertUser'])->name('user.add');
Route::get('/edit/{id}',[UseraddController::class,'editUser'])->name('user.edit');
Route::post('/user_update',[UseraddController::class,'updateUser'])->name('user.update');
Route::get('/delete_user/{id}',[UseraddController::class,'deleteUser'])->name('user.delete');

//package crud for admin
Route::post('package_add',[PackageController::class,'insertPackage'])->name('package.add');
Route::get('/edit/{id}',[PackageController::class,'editPackage'])->name('package.edit');
Route::post('/package_update',[PackageController::class,'updatePackage'])->name('package.update');
Route::get('/delete_package/{id}',[PackageController::class,'deletePackage'])->name('package.delete');

//admin crud for admin
Route::post('admin_add',[AdminaddController::class,'insertAdmin'])->name('admin.add');
Route::get('/edit/{id}',[AdminaddController::class,'editAdmin'])->name('admin.edit');
Route::post('/admin_update',[AdminaddController::class,'updateAdmin'])->name('admin.update');
Route::get('/delete_admin/{id}',[AdminaddController::class,'deleteAdmin'])->name('admin.delete');

//Area crud for admin
Route::post('area_add',[AreaController::class,'insertArea'])->name('area.add');
Route::get('/delete_area/{id}',[AreaController::class,'deleteArea'])->name('area.delete');

//Complain crud for admin
Route::post('complain_add',[ComplainController::class,'insertComplain'])->name('complain.add');
Route::get('/delete_complain/{id}',[ComplainController::class,'deleteComplain'])->name('complain.delete');

/*----------Admin login route----------*/
Route::post('/admin-view',[AdminaddController::class,'loginAdmin'])->name('admin-view');
Route::get('/logoutAdmin',[AdminaddController::class,'logoutAdmin']);

//Admin profile crud for specific admin( logged in admin)
Route::get('/edit/{id}',[AdminaddController::class,'editAdminProfile'])->name('adminProfile.edit');
Route::post('/adminProfile_update',[AdminaddController::class,'updateAdminProfile'])->name('adminProfile.update');

/*----------User login route-----------*/
Route::post('/userProfile-view',[UserLoginAuth::class,'loginUser'])->name('userProfile-view');
Route::get('/logoutUser',[UserLoginAuth::class,'logoutUser']);
/*----------User profile crud for specific user( logged in user)-----------*/
Route::get('showUser',[UserLoginAuth::class,'showUser'])->middleware('isUserloggedin');
Route::get('/edit/{id}',[UserLoginAuth::class,'editUserProfile'])->name('userProfile.edit');
Route::post('/userProfile_update',[UserLoginAuth::class,'updateUserProfile'])->name('userProfile.update');

/*----------User forgot pass ruotes-------*/
Route::view('/forgot','/forgotModal')->name('forgot');
Route::post('/forgotModal',[ForgotpassController::class,'insertforgot'])->name('forgotpass_add');
Route::get('/delete_forgot/{id}',[ForgotpassController::class,'deleteforgot'])->name('forgotpass.delete');

/*----------User forgot pass send to user ruotes-------*/
Route::post('',[ForgotpassController::class,'sendforgotpass'])->name('sendforgot_pass');


/* on .env file 32-37 edited line

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

*/