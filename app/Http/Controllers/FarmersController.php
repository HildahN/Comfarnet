<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class FarmersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd("YOOO");
        $data['getRecord'] = User::getFarmer();
        $data['meta_title'] = 'farmers-lists';
        return view('admin.farmers.list',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['meta_title'] = 'add-farmer';
        return view('admin.farmers.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:users'
    ]);


    $user = new User();
        $user->first_name = trim($request->first_name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->password = Hash::make('1234'); // Default password
        $user->phone_number = trim($request->phone_number);
        $user->NIN = trim($request->NIN);
        $user->Number_of_dependents = $request->Number_of_dependents;
        $user->District = trim($request->District);
        $user->Village = trim($request->Village);
        $user->Date_of_birth = $request->Date_of_birth;
        $user->Gender = $request->Gender;
        $user->Education_level = $request->Education_level;
        $user->Farmer_group = trim($request->Farmer_group);
    // Optionally assign a role (e.g., 'farmer')
    //$user->assignRole('farmer');

    $user->save();

    return redirect(url('farmers/list'))->with('success', 'Farmer created successfully!');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['meta_title'] = 'edit farmers';
            return view('admin.farmers.edit',$data);
        }else{
            abort(404);
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);
       
        $user = User::getSingle($id);
        $user->first_name = trim($request->first_name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->NIN = trim($request->NIN);
        $user->Number_of_dependents = $request->Number_of_dependents;
        $user->District = trim($request->District);
        $user->Village = trim($request->Village);
        $user->Date_of_birth = $request->Date_of_birth;
        $user->Gender = $request->Gender;
        $user->Education_level = $request->Education_level;
        $user->Farmer_group = trim($request->Farmer_group);
        $user->save();
        
        return redirect(url('farmers/list'))->with('success','Farmer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::getSingle($id);
        $user->delete();
        return redirect()->back()->with('error','Farmer Deleted Successfully');
    }
}
