<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



	
    public	function __construct()
   {

  	  
   		$this->dangnhap();
  
   }

    
  public function dangnhap()
   { 

   		

   		if(Auth::check())//luôn luôn false ?????
   		{
   			
    	$user_login = Auth::user();
    	 View::share('user_login',$user_login);
   		}else
   		{
   			 View::share('user_login','00000');
   		}
   }
}
