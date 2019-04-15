<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Models\StaticPages;
use Illuminate\Http\Request;


class AboutEditContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $static_pages = StaticPages::all();
        return view('admin.edit_content.index', compact('static_pages'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.edit_content.edit_content');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|unique:staticpage',
            'en_title' => 'unique:staticpage|max:100|min:3',

        ]);

        $about_us = new StaticPages();
        $about_us->title = $request->title;
        $about_us->en_title = $request->en_title;
        $about_us->descr = $request->descr;
        $about_us->descr_en = $request->descr_en;
        $about_us->save();


        return redirect('/about_editcontent')
            ->with('success', 'تم انشاء المحتوي بنجاح');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about_us = StaticPages::find($id);
        return view('admin.edit_content.edit_content', compact('about_us'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
        $about_us = StaticPages::find($id);
        $about_us->title = $request->title;
        $about_us->en_title = $request->en_title;
        $about_us->descr = $request->descr;
        $about_us->descr_en = $request->descr_en;
        $about_us->save();


        return redirect('/about_editcontent')
            ->with('success', 'تم تعديل المحتوي بنجاح');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

}
