<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\LoginC;
// staff
use App\Http\Controllers\admin\dashboard\dashboardC;
use App\Http\Controllers\admin\managestaff\AddStaffC;
use App\Http\Controllers\admin\PrivilegesC;
use App\Http\Controllers\admin\Privileges2C;


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
    Route::post('/delmodule',[ PrivilegesC::class, 'delmodule'])->name('delmodule');
    Route::post('/delsubmodule',[ PrivilegesC::class, 'delsubmodule'])->name('delsubmodule');
    Route::post('/updmodule',[ PrivilegesC::class, 'updmodule'])->name('updmodule');
    Route::post('/updsubmodule',[ PrivilegesC::class, 'updsubmodule'])->name('updsubmodule');
    Route::post('/showmodule',[ PrivilegesC::class, 'showmodule'])->name('showmodule');
    Route::post('/hidemodule',[ PrivilegesC::class, 'hidemodule'])->name('hidemodule');
    Route::post('/showsubmodule',[ PrivilegesC::class, 'showsubmodule'])->name('showsubmodule');
    Route::post('/hidesubmodule',[ PrivilegesC::class, 'hidesubmodule'])->name('hidesubmodule');
    Route::get('/privilege/assign-privilege',[ Privileges2C::class, 'assignprivilege'])->name('assignprivilege');
    Route::post('/subassignpri',[ Privileges2C::class, 'subassignpri'])->name('subassignpri');
    Route::get('/privilege/staff-privilege/{id}',[ Privileges2C::class, 'staffprivilege'])->name('staffprivilege');
    Route::post('/assignmodule',[ Privileges2C::class, 'assignmodule'])->name('assignmodule');
    Route::post('/notassignmodule',[ Privileges2C::class, 'notassignmodule'])->name('notassignmodule');
    Route::post('/Allassignmodule',[ Privileges2C::class, 'Allassignmodule'])->name('Allassignmodule');
    Route::post('/Allremovemodule',[ Privileges2C::class, 'Allremovemodule'])->name('Allremovemodule');
    Route::post('/assignsubmodule',[ Privileges2C::class, 'assignsubmodule'])->name('assignsubmodule');
    Route::post('/removesubmodule',[ Privileges2C::class, 'removesubmodule'])->name('removesubmodule');


    // Staff
    Route::get('/managestaff/addstaff',[ AddStaffC::class, 'addstaff'])->name('addstaff');
    Route::post('/subaddstaff',[ AddStaffC::class, 'subaddstaff'])->name('subaddstaff');
    Route::get('/managestaff/allstaff',[ AddStaffC::class, 'allstaff'])->name('allstaff');
    Route::post('/delstaff',[ AddStaffC::class, 'delstaff'])->name('delstaff');
    Route::post('/updstaff',[ AddStaffC::class, 'updstaff'])->name('updstaff');

  
});


