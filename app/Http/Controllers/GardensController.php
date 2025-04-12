<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Garden;
use App\Models\User;
use Illuminate\Http\Request;

class GardensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd("YOOO");
        $data['getRecord'] = Garden::with('user','district')->get();
        $data['meta_title'] = 'gardens-list';
        return view('admin.gardens.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd("Yooo");
        $data['getGardenUser'] = User::select('users.*')->where('is_role','=',2)->get();
        $data['district'] = District::get();
        $data['meta_title'] = 'add-garden';
        return view('admin.gardens.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            //dd("Yooo");
            $garden = new Garden;

            $garden->garden_type = $request->garden_type;
            $garden->garden_name = trim($request->garden_name);
            $garden->user_id = trim($request->user_id);
            $garden->manager_name = trim($request->manager_name);
            $garden->district_id = trim($request->district_id);
            $garden->location_latitude = trim($request->location_latitude);
            $garden->location_longitude = trim($request->location_longitude);
            $garden->garden_size = $request->garden_size;
            $garden->planting_method = trim($request->planting_method);
            $garden->land_ownership = trim($request->land_ownership);
            $garden->farmer_ownership = trim($request->farmer_ownership);
            $garden->date_started = $request->date_started;

            $garden->save();

            return redirect(url('gardens/list'))->with('success', 'Garden registered successfully.');
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
        $data['meta_title'] = "edit-gardens";
        $data['getGardenUser'] = User::select('users.*')->where('is_role','=',2)->get();
        $data['district'] = District::get();
        $data['getRecord'] = Garden::find($id);
        return view('admin.gardens.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd("Yoooo");
        $garden = Garden::find($id);

            $garden->garden_type = $request->garden_type;
            $garden->garden_name = trim($request->garden_name);
            $garden->user_id = trim($request->user_id);
            $garden->manager_name = trim($request->manager_name);
            $garden->district_id = trim($request->district_id);
            $garden->location_latitude = trim($request->location_latitude);
            $garden->location_longitude = trim($request->location_longitude);
            $garden->garden_size = $request->garden_size;
            $garden->planting_method = trim($request->planting_method);
            $garden->land_ownership = trim($request->land_ownership);
            $garden->farmer_ownership = trim($request->farmer_ownership);
            $garden->date_started = $request->date_started;

            $garden->save();

            return redirect(url('gardens/list'))->with('success', 'Garden Updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //dd("Yooo");
        $data = Garden::find($id);
        $data->delete();
        return redirect()->back()->with('error', 'Garden Deleted successfully.');

    }
}
