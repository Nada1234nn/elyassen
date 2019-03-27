<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permissions;
use App\User;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('admin.permissions', compact('users'));
    }

    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->permissions()->detach();
        if ($request->admin) {
            $user->permissions()->attach(Permissions::where('name', 'admin')->first());
        }

        if ($request->customer) {
            $user->permissions()->attach(Permissions::where('name', 'customer')->first());
        }

        if ($request->suppliers) {
            $user->permissions()->attach(Permissions::where('name', 'suppliers')->first());
        }

        if ($request->employees) {
            $user->permissions()->attach(Permissions::where('name', 'employees')->first());
        }

        return redirect()->back()->with('success', 'تم تعديل الصلاحيه بنجاح .');
    }
}
