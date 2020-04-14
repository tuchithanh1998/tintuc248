<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
   public function getdashboard(){
    
    	return view('admin.dashboard.dashboard');
    }
}
