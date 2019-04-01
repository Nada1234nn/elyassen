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
use App\Traits\MetaTags;
use Artesaos\SEOTools\OpenGraph;
use Artesaos\SEOTools\SEOMeta;
use ConsoleTVs\Charts\Facades\Charts;
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

    public function getSubcategories($category_id)
    {
//        $str= "<label>" . trans('local.subcategory_choose') . " </label>".
//         '<select class="form-control category_id" name="subcategory_id" required >'.
//         "<option value=''> " .  . "</option>".
//        foreach (Category::where('parent_id', $category_id)->get() as $subcategory)
//             ."<option value='" . $subcategory->id . "'>" . $subcategory->name . "</option>".
//         "</select>";
        $subcategory_choose = trans('local.subcategory_choose');
        $category = Category::where('parent_id', $category_id)->get();
        return response()->json([$subcategory_choose, $category]);
    }
}
