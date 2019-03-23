<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('website.home');
    }

    public function showLang($lang){
        if (in_array($lang,['ar','en'])){
            if (session()->has('lang')){
                session()->forget('lang');
            }
            session()->put('lang',$lang);
        }else{
            if (session()->has('lang')){
                session()->forget('lang');
            }
            session()->put('lang','ar');
        }

        return  redirect()->back();
    }


}
