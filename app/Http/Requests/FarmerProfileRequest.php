<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FarmerProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all authorized users
    }

    public function rules()
    {
        return [
            // User (Farmer) Data
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15|unique:users',
            'NIN' => 'required|string|max:15|unique:users',
            'email' => 'required|email|unique:users',
            'Number_of_dependents' => 'required|integer',
            'District' => 'required|integer',
            'Village'=> 'required|string',
            'Date_of_birth'=> 'required|string',
            'Gender'=> 'required|string|in:female,male',
            'Education_level'=> 'required|string|in:None,Primary,Secondary,Tertiary,University',
            'Farmer_group'=> 'required|string',

            // Garden Data
            'garden_type' => 'required|string|in:Mother,coffee',
            'garden_name' => 'required|string',
            'manager_name' => 'required|string',
            'district_id' => 'required|exists:districts,id',
            'location_longtitude' => 'required',
            'location_latitude' => 'required',
            'garden_size' => 'required|numeric',
            'planting_method' => 'required|string',
            'land_ownership' => 'required|in:Rented,Owned',
            'farmer_ownership' => 'required|in:Family,Individual,Group',
            'date_started' => 'required|date',
        ];
    }
}
