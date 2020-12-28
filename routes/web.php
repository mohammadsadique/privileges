<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\LoginC;
// staff
use App\Http\Controllers\admin\dashboard\dashboardC;
use App\Http\Controllers\admin\managestaff\AddStaffC;
use App\Http\Controllers\admin\PrivilegesC;


Route::get('/admin', [ LoginC::class , 'landing' ])->name('loginpage');
Route::post('/sublogin', [ LoginC::class , 'sublogin' ] )->name('sublogin');

Route::middleware([CheckAdminLogin::class])->group(function () {
    Route::get('/admin/profile',[ LoginC::class, 'profile'])->name('profile');
    Route::post('/subprofile',[ LoginC::class, 'subprofile'])->name('subprofile');

    Route::get('/admin/dashboard',[ dashboardC::class, 'home' ])->name('homedashboard');
    Route::get('/logout',[ LoginC::class, 'logout' ])->name('logout');
	
    //privilege
    Route::get('/privilege/addpages',[ PrivilegesC::class, 'addpages'])->name('addpages');
    Route::get('/privilege/show-privilege',[ PrivilegesC::class, 'showprivilege'])->name('showprivilege');
    Route::post('/subaddmodule',[ PrivilegesC::class, 'subaddmodule'])->name('subaddmodule');
    Route::post('/subaddsubmodule',[ PrivilegesC::class, 'subaddsubmodule'])->name('subaddsubmodule');


    // Staff
    Route::get('/managestaff/addstaff',[ AddStaffC::class, 'addstaff'])->name('addstaff');
    Route::post('/subaddstaff',[ AddStaffC::class, 'subaddstaff'])->name('subaddstaff');
    Route::get('/managestaff/allstaff',[ AddStaffC::class, 'allstaff'])->name('allstaff');
    Route::post('/delstaff',[ AddStaffC::class, 'delstaff'])->name('delstaff');
    Route::post('/updstaff',[ AddStaffC::class, 'updstaff'])->name('updstaff');

  
});


