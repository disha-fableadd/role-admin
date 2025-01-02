<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\Userinfo;
use App\Models\Project;
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

        $userId = session('user_id'); 

        $user = DB::table('userss')
        ->join('userinfo', 'userss.id', '=', 'userinfo.uid') 
        ->where('userss.id', $userId)
        ->select('userss.id','userss.role', 'userinfo.fname', 'userinfo.image')
        ->first();
        $userinfo = Userinfo::where('uid', $user->id)->first();

        if ($user->role == 1) { 
            
            $projects = Project::with(['category', 'manager.userinfo', 'staff.userinfo'])->get();
        }
        elseif ($user->role == 2) { 
            $projects = Project::with(['category', 'manager.userinfo', 'staff.userinfo'])
                ->where('manager_id', $user->id)
                ->get();
        } 
        elseif ($user->role == 3) { 
            $projects = Project::with(['category', 'manager.userinfo', 'staff.userinfo'])
                ->where('staff_id', $user->id)
                ->get();
        } 
       

        if ($user->role == 1) {
        $users = Users::with('userinfo')->whereIn('role', [1, 2, 3])->get();
        }
        elseif ($user->role == 2) { 
            $users = Users::with('userinfo')
            ->where('id', $user->id) 
            ->orWhereIn('id', function($query) use ($user) {
                $query->select('id')
                      ->from('userss')
                      ->where('role', 3); 
            })
            ->get();
        }
        elseif ($user->role == 3) { 
        
            $users = Users::with('userinfo')
            ->where('id', $user->id) 
            ->orWhereIn('id', function($query) use ($user) {
                $query->select('id')
                      ->from('userss')
                      ->where('role', 2); 
            })
            ->get();
        }
        
        $role = Session('role'); 
    
        if (!$role) {
            return redirect()->route('login');
        }
    
        $data = [
            'role' => $role, 
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
    
        return view('dashboard', $data , compact('user','users','userinfo','projects'));
    }
    
    
    public function logout()
    {
        Session()->forget(['user_id', 'role']);
        return redirect()->route('login');
    }
}
