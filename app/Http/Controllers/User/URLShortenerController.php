<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShortenedUrl;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class URLShortenerController extends Controller
{
    //

    public function UrlList(){

        $data['list'] = ShortenedUrl::where('user_id',Auth::user()->id)->get();
        return view('Member.url_shortnened.index',$data);
    }

    public function UrlListPost(Request $request){

        $request->validate([
            'original_url' => 'required',
        ]);

        $shortenedUrl =new ShortenedUrl();
        $shortenedUrl->original_url = $request->original_url;
        $shortenedUrl->shortened_url = \Str::random(6);
        $shortenedUrl->user_id = Auth::user()->id;
        $shortenedUrl->save();


     return redirect()->back();

    }

    public function UrlDelete($id){

        ShortenedUrl::where('id',$id)->delete();

        return redirect()->back();
    }

    public function uRLr($short){

        $shortenedUrl = ShortenedUrl::where('user_id',Auth::user()->id)->where('shortened_url', $short)->firstOrFail();

        return redirect($shortenedUrl->original_url);
    }
}
