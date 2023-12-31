<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory;
    protected $table ='funds';
    protected $fillable=['user_id','amount'];

    public function User()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
