<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use App\Models\Category;
class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $primaryKey = 'id'; 

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'cid', 
        'description',
        'timeline',
        'manager_id',
        'staff_id'
    ];

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'cid');
    }

   
    public function manager()
    {
        return $this->belongsTo(Users::class, 'manager_id');
    }

   
    public function staff()
    {
        return $this->belongsTo(Users::class, 'staff_id');
    }
}
