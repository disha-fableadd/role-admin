<?php

namespace App\Models;
use  App\Models\Userinfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; 
    protected $table = 'userss'; 
    protected $fillable = [
        'email',
        'password',
        'role',
    ];

    
    const ROLE_ADMIN = 1;
    const ROLE_MANAGER = 2;
    const ROLE_STAFF = 3;

    public function userinfo()
    {
        return $this->hasOne(Userinfo::class, 'uid');
    }
}
