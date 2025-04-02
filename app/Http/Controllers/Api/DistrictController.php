<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DistrictRequest;
use App\Models\District;
use App\Traits\HttpApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    use HttpApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = District::all();
        return $this->responseSuccess($districts, 'Successfully retrieved all Events');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(DistrictRequest $request)
    {
        $validated = $request->validated();
        $district = District::create($validated);

        return $this->responseSuccess($district, "Successfully Created an district", JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $district = District::findOrFail($id)->get();
        return $this->responseSuccess($district, 'Successfully retrieved this district\'s data');
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
    public function update(DistrictRequest $request, string $id)
    {
        $validated = $request->validated();
        $district = District::find($id);
        
        $district->update($validated);

        return $this->responseSuccess('District updated successfully',  $district);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $district = District::find($id);

        $district->delete();

        return $this->responseSuccess('Event deleted successfully',  $district);

    }
}
