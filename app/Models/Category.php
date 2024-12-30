<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'cid'; 
    protected $table = 'categories'; 
    protected $fillable = ['cname', 'description'];
}
