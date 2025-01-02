<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Users;
use App\Models\Userinfo;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
{
    $userId = session('user_id'); 
    $user = DB::table('userss')
    ->join('userinfo', 'userss.id', '=', 'userinfo.uid') 
    ->where('userss.id', $userId)
    ->select('userss.id','userss.role', 'userinfo.fname', 'userinfo.image')
    ->first();
    $userinfo = Userinfo::where('uid', $user->id)->first();
    $role = Session('role'); 
    
    if (!$role) {
        return redirect()->route('login');
    }

    $data = [
        'role' => $role, 
    ];
    $categories = Category::all(); // Fetch all categories
    return view('index', compact('categories','role','user','userinfo'));
}

    // Delete a category
    public function destroy($cid)
    {
        $category = Category::findOrFail($cid); 
        $category->delete();
        return redirect()->route('index')->with('success', 'Category deleted successfully.');
    }
}
