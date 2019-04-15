<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Certificates;
use Illuminate\Http\Request;

class PrizeController extends Controller
{
    //

    public function index()
    {
        $certificates = Certificates::all();
        return view('admin.prize_certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.prize_certificates.prize_certificate');
    }

    public function store(Request $request)
    {

        $static_certificate = new Certificates();
        $file = $request->file('image');
        if ($request->hasFile('image')) {
            $fileName = 'image-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $request->file('image')->move($destinationPath, $fileName);
            $static_certificate->image = $fileName;
        }
        $static_certificate->save();
        return redirect('/prize')->with('success', 'تم  انشاء الصوره بنجاح .');

    }

    public function edit($id)
    {
        $prize = Certificates::find($id);
        return view('admin.prize_certificates.prize_certificate', compact('prize'));
    }

    public function update(Request $request, $id)
    {
        $prize = Certificates::find($id);
        $file = $request->file('image');
        if ($request->hasFile('image')) {
            $old_file = 'uploads/' . $prize->image;
            if (is_file($old_file)) unlink($old_file);
            $fileName = 'image-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $request->file('image')->move($destinationPath, $fileName);
            $prize->image = $fileName;
        }
        $prize->save();
        return redirect('/prize')->with('success', 'تم  تعديل الصوره بنجاح .');

    }

    public function destroy($id)
    {
        $prize = Certificates::find($id);
        $prize->delete();
        return response()->json(['success' => 'true']);
    }
}
