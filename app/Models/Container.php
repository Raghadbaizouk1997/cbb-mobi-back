<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;
    protected $table = 'containers' ;
    protected $fillable=['profit_percent','profit','year','month','user_id'];


    public function User()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
