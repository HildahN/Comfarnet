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
        'user_id',
        'manager_name',
        'district_id',
        'location_longitude',
        'location_latitude',
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

    static public function getGardenCount(){
        return self::select('gardens.*')->count();
    }

}
