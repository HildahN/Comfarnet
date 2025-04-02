<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garden extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $fillable = [
        'garden_type',
        'garden_name',
        'manager_name',
        'district_id',
        'location_gps',
        'garden_size',
        'planting_method',
        'land_ownership',
        'farmer_ownership',
        'date_started',
    ];

    
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
