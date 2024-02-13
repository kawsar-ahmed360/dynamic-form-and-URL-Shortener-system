<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventManage;
use App\Models\DynamicField;
use App\Models\RadioGroupWithAmount;
use App\Models\RadioGroupYesNo;
use App\Models\ShortenedUrl;

class FrontendController extends Controller
{

    public function ViewPdf(){

        return view('Server.SuperAdmin.MemberTicket.member_pdf');
    }

    public function MainIndex(){

        return view('welcome');
          
    }

    public function ShortenedUrl(){

        $data['list'] = ShortenedUrl::get();

        return view('list',$data);
    }



    public function UrlSh($short){

        $shortenedUrl = ShortenedUrl::where('shortened_url', $short)->firstOrFail();
         // Increment the visitor count
            $shortenedUrl->visitor++;

            // Save the updated model
            $shortenedUrl->save();
        return redirect($shortenedUrl->original_url);
    }

    
  



}
