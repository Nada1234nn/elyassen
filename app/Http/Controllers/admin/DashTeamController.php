<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Images;
use App\Models\MembersManagement;
use App\User;
use Illuminate\Http\Request;

class DashTeamController extends Controller
{
    //

    public function index()
    {
        $senior_members = MembersManagement::all();
        return view('admin.members_management.index', compact('senior_members'));
    }

    public function create()
    {
        $users = User::all()->where('role', 'e');
        return view('admin.members_management.member_management', compact('users'));
    }

    public function store(Request $request)
    {

        $photo = new Images();
        $photo->title = $request->title;
        $photo->en_title = $request->en_title;
        $photo->staticPage_id = 1;
        $file = $request->file('image');
        if ($request->hasFile('image')) {
            $fileName = 'image-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $request->file('image')->move($destinationPath, $fileName);
            $photo->image = $fileName;
        }
        $photo->save();
        return redirect('/about_images')->with('success', 'تم  انشاء الصوره بنجاح .');

    }

    public function edit($id)
    {
        $about_image = Images::where('staticPage_id', 1)->where('id', $id)->first();
        return view('admin.about_images.about_images', compact('about_image'));
    }

    public function update(Request $request, $id)
    {
        $photo = Images::where('staticPage_id', 1)->where('id', $id)->first();
        $photo->title = $request->title;
        $photo->en_title = $request->en_title;
        $photo->staticPage_id = 1;
        $file = $request->file('image');
        if ($request->hasFile('image')) {
            $old_file = 'uploads/' . $photo->image;
            if (is_file($old_file)) unlink($old_file);
            $fileName = 'image-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $request->file('image')->move($destinationPath, $fileName);
            $photo->image = $fileName;
        }
        $photo->save();
        return redirect('/about_images')->with('success', 'تم  تعديل الصوره بنجاح .');

    }

    public function destroy($id)
    {
        $photo = Images::find($id);
        $photo->delete();
        return response()->json(['success' => 'true']);
    }
}
