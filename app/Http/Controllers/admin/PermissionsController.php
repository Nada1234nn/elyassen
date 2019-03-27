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
            $user_role = User::find($user->id);
            $user_role->role = 'admin';
            $user_role->save();
        }

        if ($request->customer) {
            $user->permissions()->attach(Permissions::where('name', 'customer')->first());
            $user_role = User::find($user->id);
            $user_role->role = 'c';
            $user_role->save();
        }

        if ($request->suppliers) {
            $user->permissions()->attach(Permissions::where('name', 'suppliers')->first());
            $user_role = User::find($user->id);
            $user_role->role = 's';
            $user_role->save();
        }

        if ($request->employees) {
            $user->permissions()->attach(Permissions::where('name', 'employees')->first());
            $user_role = User::find($user->id);
            $user_role->role = 'e';
            $user_role->save();
        }

        return redirect()->back()->with('success', 'تم تعديل الصلاحيه بنجاح .');
    }
}
