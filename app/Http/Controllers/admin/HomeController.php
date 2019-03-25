<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Schooltrainning;
use App\Models\Setting;
use App\Models\Subcategories;
use App\Models\Trainee;
use App\Models\Trainers;
use App\Models\Trainningcourses;
use App\User;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Artesaos\SEOTools\SEOMeta;
use Artesaos\SEOTools\OpenGraph;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Traits\MetaTags;
use Illuminate\Support\Facades\Validator;
use Voerro\Laravel\VisitorTracker\Facades\VisitStats;


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
     * @return \Illuminate\Http\Response
     */
   public function index(){
       return view('admin.dashboard');
   }
}
