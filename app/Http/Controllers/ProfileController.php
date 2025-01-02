<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Userinfo;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{
    public function show()
    {
        $role = Session('role'); 
    
        if (!$role) {
            return redirect()->route('login');
        }
    
        $data = [
            'role' => $role, // Pass the role to the view
        ];
        
    $userId = session('user_id'); 
    $user = DB::table('userss')
    ->join('userinfo', 'userss.id', '=', 'userinfo.uid') 
    ->where('userss.id', $userId)
    ->select('userss.id','userss.email','userss.role', 'userinfo.fname', 'userinfo.image')
    ->first();


    $userinfo = Userinfo::where('uid', $user->id)->first();
    switch ($user->role) {
        case 1:
            $profileLabel = "Admin Profile";
            $userLabel = "Admin";
            break;
        case 2:
            $profileLabel = "Manager Profile";
            $userLabel = "Manager";
            break;
        case 3:
            $profileLabel = "Staff Profile";
            $userLabel = "Staff";
            break;
        default:
            $profileLabel = "User Profile";
            $userLabel = "User";
            break;
    }

    return view('profile.profile', compact('user', 'userinfo', 'profileLabel', 'userLabel','role'));
    }

    public function edit()
    {
        $role = Session('role'); 
    
        if (!$role) {
            return redirect()->route('login');
        }
    
        $data = [
            'role' => $role, 
        ];
        $userId = session('user_id'); 
        $user = DB::table('userss')
        ->join('userinfo', 'userss.id', '=', 'userinfo.uid') 
        ->where('userss.id', $userId)
        ->select('userss.id','userss.email','userss.role', 'userinfo.fname', 'userinfo.image')
        ->first();
        $userinfo = UserInfo::where('uid', $user->id)->first();
        return view('profile.edit', compact('user','userinfo','role'));
    }

    public function update(Request $request)
    {
        $userId = session('user_id'); // Get the user ID from session

        // Validate the incoming request
        $validated = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:userss,email,' . $userId,
            'gender' => 'required|string',
            'contact' => 'required|string|min:10',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Update user data
        DB::table('userss')
            ->where('id', $userId)
            ->update([
                'email' => $validated['email'],
            ]);

        // Update userinfo data
        DB::table('userinfo')
            ->where('uid', $userId)
            ->update([
                'fname' => $validated['fname'],
                'lname' => $validated['lname'],
                'gender' => $validated['gender'],
                'contact' => $validated['contact'],
                'address' => $validated['address'],
            ]);

            if ($request->hasFile('image')) {
                $currentImage = DB::table('userinfo')->where('uid', $userId)->value('image');
                
                if ($currentImage && Storage::exists('public/images/' . $currentImage)) {
                    Storage::delete('public/images/' . $currentImage);
                }
            
                $imagePath = $request->file('image')->store('images', 'public');
                DB::table('userinfo')
                    ->where('uid', $userId)
                    ->update(['image' => $imagePath]);
            }
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}
