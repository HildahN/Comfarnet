<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DistrictRequest;
use App\Http\Requests\FarmerProfileRequest;
use App\Models\District;
use App\Models\User;
use App\Traits\HttpApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FarmerProfileController extends Controller
{
    use HttpApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farmerProfile = User::with('garden')->get();
        $users = User::role('farmer')->get();
        return $this->responseSuccess(['farmerProfile'=>$farmerProfile, 'farmer role'=>$users], 'Successfully retrieved all Events');
    }


    public function store(FarmerProfileRequest $request)
    {
        $validated = $request->validated();

        // Create the Farmer (User)
        $farmer = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'password' => Hash::make('password123'), // Default password, should be changed later
            'NIN' => $validated['NIN'],
            'Number_of_dependents' => $validated['Number_of_dependents'],
            'District' => $validated['District'],
            'Village'=> $validated['Village'],
            'Date_of_birth'=> $validated['Date_of_birth'],
            'Gender'=> $validated['Gender'],
            'Education_level'=> $validated['Education_level'],
            'Farmer_group'=> $validated['Farmer_group'],
        ]);

        $farmer->assignRole('farmer');

        // Create the Garden
        $farmer->garden()->create([
            'garden_type' => $validated['garden_type'],
            'garden_name' => $validated['garden_name'],
            'manager_name' => $validated['manager_name'],
            'district_id' => $validated['district_id'],
            'location_longtitude' => $validated['location_longtitude'],
            'location_latitude' => $validated['location_latitude'],
            'garden_size' => $validated['garden_size'],
            'planting_method' => $validated['planting_method'],
            'land_ownership' => $validated['land_ownership'],
            'farmer_ownership' => $validated['farmer_ownership'],
            'date_started' => $validated['date_started'],
        ]);

        return response()->json([
            'message' => 'Farmer profile created successfully',
            'farmer' => $farmer
        ], JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $farmerProfile = District::findOrFail($id)->get();
        return $this->responseSuccess($farmerProfile, 'Successfully retrieved this district\'s data');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FarmerProfileRequest $request, string $id)
    {
        $validated = $request->validated();
        $farmerProfile = District::find($id);
        
        $farmerProfile->update($validated);

        return $this->responseSuccess('District updated successfully',  $farmerProfile);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $farmerProfile = District::find($id);

        $farmerProfile->delete();

        return $this->responseSuccess('Event deleted successfully',  $farmerProfile);

    }
}
