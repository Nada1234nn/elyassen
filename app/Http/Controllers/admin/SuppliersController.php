<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Suppliers;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    //
    public function index()
    {

        $suppliers = Suppliers::with('getUser')->get();

        return view('admin.suppliers.index', compact('suppliers'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users = User::all()->where('role', '!=', 'admin');
        return view('admin.suppliers.supplier', compact('users'));

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
            'supplier_id' => 'required',
            'address' => 'required|max:100|min:3',
            'url_website' => 'unique:suppliers|max:100|min:3',

        ]);

        $supplier = Role::where('name', 'suppliers')->first();
        $user = User::find($request->supplier_id);
        $user->roles()->detach();
        $user->roles()->attach($supplier->id); // id only
        $supplier = new Suppliers();
        $supplier->user_id = $request->supplier_id;
        $supplier->address = $request->address;
        $supplier->url_website = $request->url_website;
        $supplier->national = $request->national;
        $supplier->word_supplier = $request->word_supplier;
        $supplier->word_supplier_en = $request->word_supplier_en;
        $file = $request->file('image_supplier');
        if ($request->hasFile('image_supplier')) {
            $fileName = 'supplier-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $request->file('image_supplier')->move($destinationPath, $fileName);
            $supplier->image = $fileName;
        }
        $supplier->save();

        return redirect('/suppliers')
            ->with('success', 'تم اضافه مورد بنجاح');
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
    public function edit($name)
    {
        $user_supplier = User::where('username', $name)->first();
        $supplier = Suppliers::where('user_id', $user_supplier->id)->first();
        $users = User::all()->where('role', '!=', 'admin');

        return view('admin.suppliers.supplier', compact('supplier', 'users'));
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
        $this->validate($request, [
            'supplier_id' => '',
            'address' => 'max:100|min:3',
            'url_website' => 'unique:suppliers|max:100|min:3',

        ]);

        $supplier = Suppliers::find($id);
        $supplier->user_id = $request->supplier_id;
        $supplier->address = $request->address;
        $supplier->url_website = $request->url_website;
        $supplier->national = $request->national;
        $supplier->word_supplier = $request->word_supplier;
        $supplier->word_supplier_en = $request->word_supplier_en;
        $file = $request->file('image_supplier');
        if ($request->hasFile('image_supplier')) {
            $old_file = 'uploads/' . $supplier->image;
            if (is_file($old_file)) unlink($old_file);
            $fileName = 'supplier-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'uploads';
            $request->file('image_supplier')->move($destinationPath, $fileName);
            $supplier->image = $fileName;
        }
        $supplier->save();


        return redirect('/suppliers')
            ->with('success', 'تم تعديل المورد بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Suppliers::find($id);
        $supplier->delete();
        return response()->json(['success' => 'true']);
    }
}
