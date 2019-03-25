<?php

namespace App\Http\Controllers;

use App\Contact_us;
use App\Emails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function contact(){
        return view('website.contact_us');
    }

    public function contactUs(Request $request){
$contact=new Contact_us();
$contact->name=$request->name;
$contact->email=$request->email;
$contact->title=$request->title_message;
$contact->descr=$request->message;
$contact->save();
return response()->json(['success'=>'true']);
    }

    public function malingList(Request $request){
        $email=new Emails();
        $email->emails=$request->email;
        $email->save();
        return response()->json(['success','true']);
    }
}
