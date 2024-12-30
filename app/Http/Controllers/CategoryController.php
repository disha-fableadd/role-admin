<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
{
    $role = 1;
    $categories = Category::all(); // Fetch all categories
    return view('index', compact('categories','role'));
}

    // Delete a category
    public function destroy($cid)
    {
        $category = Category::findOrFail($cid); 
        $category->delete();
        return redirect()->route('index')->with('success', 'Category deleted successfully.');
    }
}
