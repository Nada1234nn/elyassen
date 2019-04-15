<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permissions;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    //
    public function index()
    {
        $users = User::all()->where('id', '!=', 2);
        return view('admin.permissions', compact('users'));
    }

    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->roles()->detach();

        if ($request->admin) {
            $admin = Role::where('name', 'admin')->first();
            $user->roles()->attach($admin->id); // id only
            $user_role = User::find($user->id);
            $user_role->role = 'admin';
            $user_role->save();
        }

        if ($request->customer) {
            $customer = Role::where('name', 'customer')->first();
            $user->roles()->attach($customer->id); // id only
            $user_role = User::find($user->id);
            $user_role->role = 'c';
            $user_role->save();
        }
//
        if ($request->suppliers) {
            $supplier = Role::where('name', 'suppliers')->first();

            $user->roles()->attach($supplier->id); // id only
            $user_role = User::find($user->id);
            $user_role->role = 's';
            $user_role->save();
        }

        if ($request->employees) {
            $employee = Role::where('name', 'employee')->first();

            $user->roles()->attach($employee->id); // id only
            $user_role = User::find($user->id);
            $user_role->role = 'e';
            $user_role->save();
        }

        return redirect()->back()->with('success', 'تم تعديل الصلاحيه بنجاح .');
    }
}
