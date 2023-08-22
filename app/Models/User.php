<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Mockery\Matcher\Contains;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'front_image',
        'back_image',
        'bank_name',
        'bank_account',
        'gender',
        'is_active' ,
        'full_name' ,
        'country',
        'birth_date' ,
        'mobile' ,
        'personal_image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function getPersonalImageAttribute($val)
    {
        return ($val !== null) ? asset('images/users/' . $val) : null;
    }
    public function getFrontImageAttribute($val)
    {
        return ($val !== null) ? asset('images/users/' . $val) : null;
    }
    public function getBackImageAttribute($val)
    {
        return ($val !== null) ? asset('images/users/' . $val) : null;
    }

    public function Container()
    {
        return $this->hasMany(Container::class, "user_id", "id");
    }

    public function Fund()
    {
        return $this->hasOne(Fund::class, "user_id", "id");
    }




    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
