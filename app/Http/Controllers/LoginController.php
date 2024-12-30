<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Session;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $user = Users::where('email', $request->email)->first();
    
        if (!$user) {
            return back()->withErrors(['email' => 'User not found.']);
        }
   
        if ($user ) {
            Session::put(['user_id' => $user->id, 'role' => $user->role]);
    
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['password' => 'Invalid password.']);
        }
    
        return back()->withErrors(['Invalid credentials']);
    }

    public function dashboard()
    {
        $role = Session('role'); // Get the role from the session
    
        if (!$role) {
            return redirect()->route('login');
        }
    
        $data = [
            'role' => $role, // Pass the role to the view
        ];
    
        switch ($role) {
            case Users::ROLE_ADMIN:
                $data['totalUsers'] = Users::count();
                $data['totalProjects'] = DB::table('projects')->count();
                $data['totalCategories'] = DB::table('categories')->count();
                break;
    
            case Users::ROLE_MANAGER:
                $data['totalProjects'] = DB::table('projects')->where('manager_id', session('user_id'))->count();
                $data['totalStaff'] = Users::where('role', Users::ROLE_STAFF)->count();
                break;
    
            case Users::ROLE_STAFF:
                $data['totalProjects'] = DB::table('projects')->where('staff_id', Session('user_id'))->count();
                $data['totalManager'] = Users::where('role', Users::ROLE_MANAGER)->count();
                break;
    
            default:
                return redirect()->route('login');
        }
    
        return view('dashboard', $data);
    }
    
    
    public function logout()
    {
        Session()->forget(['user_id', 'role']);
        return redirect()->route('login');
    }
}
