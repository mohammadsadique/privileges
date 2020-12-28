<?php

namespace App\Http\Controllers\admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardC extends Controller
{
    function home(){
       return view('admin.dashboard.home');
    }
}
