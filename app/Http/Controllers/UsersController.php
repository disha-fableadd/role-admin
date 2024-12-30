<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\Userinfo;  


class usersController extends Controller
{
    public function create()
    {
        $role = 1;
        return view('user.create', compact('role'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'role' => 'required|integer|in:1,2,3',  // Role validation (integer values)
            'email' => 'required|email|unique:userss,email',
            'contact' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,jfif|max:2048',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'nullable|string|max:500',
        ]);

        // Create the user
        $user = users::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        // Prepare data for userinfo
        $userinfoData = [
            'uid' => $user->id,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'gender' => $request->gender,
            'contact' => $request->contact,
            'email' => $request->email,
            'address' => $request->address,
        ];

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
           
            $imagePath = $image->store('images', 'public');
           
            $userinfoData['image'] = $imagePath;
        }

        // Create userinfo
        $userinfo = new Userinfo($userinfoData);
        $userinfo->save(); 

        return redirect()->route('user.index')->with('success', 'User added successfully!');
    }
    public function index()
    {
        $role = 1;
    
      
        $users = Users::with('userinfo')->whereIn('role', [1, 2, 3])->get();
        return view('user.index', compact('users', 'role'));
    }

    public function destroy($id)
    {
        try {
            $user = Users::findOrFail($id);
            
          
            if ($user->userinfo) {
                $user->userinfo()->delete();
            }
    
            $user->delete();
    
            return redirect()->route('user.index')->with('success', 'User deleted successfully!');
        } catch (\Exception) {
           
            return redirect()->route('user.index')->with('error', 'An error occurred while deleting the user.');
        }
    }


    public function edit($id)
    {
        
            $user = Users::find($id);
            $userInfo = Userinfo::where('uid', $id)->first();
    
        if (!$user || !$userInfo) {
         
            return redirect()->route('user.index')->with('error', 'User or User info not found!');
        }
        $role = [
            1 => 'Admin',
            2 => 'Manager',
            3 => 'Staff',
        ];
        return view('user.edit', compact('user', 'userInfo', 'role'));
    }
    

    public function update(Request $request, $id)
    {
     
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'gender' => 'required|string',
            'role' => 'required|integer',
            'email' => 'required|email',
            'contact' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

       
        $user = Users::findOrFail($id);
        $userinfo = Userinfo::where('uid', $user->id)->first();

       
        $user->update([
            'email' => $request->email,
            'role' => $request->role,
            
        ]);

  
        if ($userinfo) {
            $userinfo->update([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'gender' => $request->gender,
                'contact' => $request->contact,
                'address' => $request->address,
               
            ]);
        }

        
        return redirect()->route('user.index')->with('success', 'User updated successfully!');
    }
    
}
