<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class Userinfo extends Model
{
    protected $primaryKey = 'uinfoid'; 
    protected $table = 'userinfo'; 
    protected $fillable = ['uid', 'fname', 'lname', 'image', 'gender', 'contact', 'email', 'address'];

    public function user()
    {
        return $this->belongsTo(Users::class, 'uid');
    }
}
