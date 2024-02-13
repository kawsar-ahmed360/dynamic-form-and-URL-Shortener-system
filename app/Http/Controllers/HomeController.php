<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\EventManage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

         //------------User Or Super Admin Check------
         $check = User::where('id',Auth::user()->id)->where('super_admin_status','yes')->exists();

         if($check){

            return view('Server.SuperAdmin.home');

         }else{

            $date =  date('Y-m-d');
            $data['avaiable_event'] =  EventManage::where('status','2')->OrderBy('id','desc')->get()->take(10);

            return view('Member.home',$data);
         }

   
    }
}
