<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'phone_number',
        'NIN',
        'Number_of_dependents',
        'District',
        'Village',
        'Date_of_birth',
        'Gender',
        'Education_level',
        'Farmer_group',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function garden()
    {
        return $this->hasOne(Garden::class);
    }


    static public function getFarmer(){

        return self::select('users.*')
                     ->where('is_role','=', 2)
                     ->orderBy('id','desc')
                     ->get();

    }

    static public function getSingle($id){
         return self::find($id);
    }

    static public function getFarmerCount(){
        return self::select('users.*')->where('is_role','=',2)->count();
    }
}
