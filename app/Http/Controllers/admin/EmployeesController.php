<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Employees;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    //

    public function index()
    {
        $employees = Employees::all();
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        $users = User::where('role', '!=', 'e')->where('role', '!=', 'admin')->where('role', '!=', 's')->get();
        return view('admin.employees.employee', compact('users'));
    }

    public function store(Request $request)
    {
        $employee = new Employees();
        $employee->user_id = $request->name_employee;
        $employee->phone = $request->phone;


        $file = $request->file('image');
        if ($request->hasFile('image')) {
            $fileName = 'image-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $request->file('image')->move($destinationPath, $fileName);
            $employee->image = $fileName;
        }
        $employee->save();

        $user = User::find($request->name_employee);
        $user->role = 'e';
        $user->save();
        $emp = Role::where('name', 'employee')->first();

        $user->roles()->attach($emp->id); // id only
        return redirect('/employees')->with('success', 'تم  انشاء الموظف بنجاح .');

    }

    public function edit($name)
    {
        $users = User::where('role', '!=', 'admin')->where('role', '!=', 's')->get();
        $user_emp = User::where('username', $name)->first();
        $employee = Employees::where('user_id', $user_emp->id)->with('getUser')->first();
        return view('admin.employees.employee', compact('users', 'employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employees::find($id);
        $employee->user_id = $request->name_employee;
        $employee->phone = $request->phone;


        $file = $request->file('image');
        if ($request->hasFile('image')) {
            $old_file = 'uploads/' . $employee->image;
            if (is_file($old_file)) unlink($old_file);
            $fileName = 'image-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $request->file('image')->move($destinationPath, $fileName);
            $employee->image = $fileName;
        }
        $employee->save();

        $user = User::find($employee->user_id);
        $user->role = 'e';
        $user->save();
        $emp = Role::where('name', 'employee')->first();
        $user->roles()->detach();

        $user->roles()->attach($emp->id); // id only

        return redirect('/employees')->with('success', 'تم  تعديل الموظف بنجاح .');

    }

    public function follow_work($id)
    {
        $employee = Employees::where('id', $id)->first();
        $user = User::where('id', $employee->user_id)->first();
        $efollow_work = Role::where('name', 'efollow_work')->first();
        if ($user->hasRole('efollow_work')) {
            $user->roles()->detach(); // id only
            $user->role = 'e';
            $user->save();
        } else {
            $user->roles()->attach($efollow_work->id); // id only
            $user->role = 'e';
            $user->save();
        }
        return redirect()->back()->with('success', 'تم  تعديل صلاحيه الموظف لمتابع اعمال بنجاح .');
    }

    public function control_supplier($id)
    {
        $employee = Employees::where('id', $id)->first();
        $user = User::where('id', $employee->user_id)->first();
        $econtrol_suppliers = Role::where('name', 'econtrol_suppliers')->first();
        if ($user->hasRole('econtrol_suppliers')) {
            $user->roles()->detach(); // id only
            $user->role = 'e';
            $user->save();
        } else {
            $user->roles()->attach($econtrol_suppliers->id); // id only
            $user->role = 'e';
            $user->save();
        }
        return redirect()->back()->with('success', 'تم  تعديل صلاحيه الموظف للتحكم بالموردين بنجاح .');
    }

    public function receive_ordersPro($id)
    {
        $employee = Employees::where('id', $id)->first();
        $user = User::where('id', $employee->user_id)->first();
        $eproduct_orders = Role::where('name', 'eproduct_orders')->first();
        if ($user->hasRole('eproduct_orders')) {
            $user->roles()->detach(); // id only
            $user->role = 'e';
            $user->save();
        } else {
            $user->roles()->attach($eproduct_orders->id); // id only
            $user->role = 'e';
            $user->save();
        }
        return redirect()->back()->with('success', 'تم  تعديل صلاحيه الموظف لاستقبال ظلبات المنتجات بنجاح .');
    }

    public function efollow_work()
    {
        $employees = Employees::with('getUser')->get();

        return view('admin.employees.follow_work', compact('employees'));
    }

    public function eorderproduct()
    {
        $employees = Employees::with('getUser')->get();

        return view('admin.employees.orderproduct', compact('employees'));
    }

    public function econtrol_supplier()
    {
        $employees = Employees::with('getUser')->get();

        return view('admin.employees.control_supplier', compact('employees'));
    }

    public function destroy($id)
    {
        $employee = Employees::find($id);
        $user = User::find($employee->user_id);

        $user->roles()->detach();
        $employee->delete();


        return response()->json(['success' => 'true']);
    }
}
