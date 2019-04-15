<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Employees;
use App\Models\MembersManagement;
use App\User;
use Illuminate\Http\Request;

class DashTeamController extends Controller
{
    //

    public function index()
    {
        $senior_members = MembersManagement::with(['getEmployee', 'getEmployee.getUser'])->get();
//        dd($senior_members);
        return view('admin.members_management.index', compact('senior_members'));
    }

    public function create()
    {
        $users = Employees::all();
        return view('admin.members_management.member_management', compact('users'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'en_title' => 'required|max:100|min:3',
            'descr' => 'required',
            'en_descr' => 'required',


        ]);

        $member_management = new MembersManagement();
        $member_management->employee_id = $request->membermanagement_id;
        $member_management->title = $request->title;
        $member_management->en_title = $request->en_title;
        $member_management->descr = $request->descr;
        $member_management->en_descr = $request->en_descr;
        $member_management->save();
        return redirect('/dash_team')->with('success', 'تم  انشاء العضو بنجاح .');

    }

    public function edit($name)
    {
        $user = User::where('username', $name)->first();
        $employee = Employees::where('user_id', $user->id)->first();
        $member = MembersManagement::where('employee_id', $employee->id)->with(['getEmployee', 'getEmployee.getUser'])->first();
        $users = Employees::all();

        return view('admin.members_management.member_management', compact('users', 'member'));
    }

    public function update(Request $request, $id)
    {
        $member_management = MembersManagement::find($id);
        $member_management->employee_id = $request->membermanagement_id;
        $member_management->title = $request->title;
        $member_management->en_title = $request->en_title;
        $member_management->descr = $request->descr;
        $member_management->en_descr = $request->en_descr;
        $member_management->save();
        return redirect('/dash_team')->with('success', 'تم  تعديل العضو بنجاح .');
    }

    public function destroy($id)
    {
        $member = MembersManagement::find($id);
        $member->delete();
        return response()->json(['success' => 'true']);
    }
}
