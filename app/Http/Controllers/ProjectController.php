<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Users;
use App\Models\Userinfo; 
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

     public function display(){
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
                ->select('userss.id','userss.role', 'userinfo.fname', 'userinfo.image')
                ->first();
            
                $userinfo = Userinfo::where('uid', $user->id)->first();
                if ($user->role == 1) {
                    $projects = Project::with(['category', 'manager.userinfo', 'staff.userinfo'])->get();
            }
            elseif ($user->role == 2) {
                $projects = Project::with(['category', 'manager.userinfo', 'staff.userinfo'])->where('manager_id', $user->id)->get();
            }
            elseif ($user->role == 3) {
                $projects = Project::with(['category', 'manager.userinfo', 'staff.userinfo'])->where('Staff_id', $user->id)->get();
            }
            return view('projects.display', compact('projects','user','role','userinfo'));
     }
     
     public function index()
     {
         $role = session('role'); 
     
         if (!$role) {
             return redirect()->route('login');
         }
 
         $userId = session('user_id'); 
         $user = DB::table('userss')
             ->join('userinfo', 'userss.id', '=', 'userinfo.uid')
             ->where('userss.id', $userId)
             ->select('userss.id', 'userss.role', 'userinfo.fname', 'userinfo.image')
             ->first();
 
         $userinfo = Userinfo::where('uid', $user->id)->first();
         
         $projects = Project::with(['category', 'manager.userinfo', 'staff.userinfo'])->get();
         
         return view('projects.index', compact('projects', 'user', 'role', 'userinfo'));
     }
    public function create()
    {
        $userId = session('user_id'); 
        $user = DB::table('userss')
        ->join('userinfo', 'userss.id', '=', 'userinfo.uid') 
        ->where('userss.id', $userId)
        ->select('userss.id','userss.role', 'userinfo.fname', 'userinfo.image')
        ->first();
        $userinfo = Userinfo::where('uid', $user->id)->first();
        $role=1;
        // Get categories, managers, and staff
        $categories = Category::all();
        $managers = Users::join('userinfo', 'userss.id', '=', 'userinfo.uid')
        ->where('userss.role', 2) 
        ->get(['userss.id', 'userinfo.fname', 'userinfo.lname']);

        $staff = Users::join('userinfo', 'userss.id', '=', 'userinfo.uid')
            ->where('userss.role', 3) 
            ->get(['userss.id', 'userinfo.fname', 'userinfo.lname']);


        return view('projects.create', compact('categories', 'managers', 'staff','role','user','userinfo'));
    }

    public function store(Request $request)
    {
        // Custom validation logic
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cid' => 'required|exists:categories,cid',
            'description' => 'required|string',
            'timeline' => 'required|date',
            'manager_id' => [
                'required',
                'exists:userss,id',
                function ($attribute, $value, $fail) {
                    $user = Users::find($value);
                    if ($user && $user->role != 2) { 
                        $fail('The selected manager is invalid.');
                    }
                },
            ],
            'staff_id' => [
                'required',
                'exists:userss,id',
                function ($attribute, $value, $fail) {
                    $user = Users::find($value);
                    if ($user && $user->role != 3) {  // Assuming role 3 is for Staff
                        $fail('The selected staff is invalid.');
                    }
                },
            ],
        ]);
    
        // Create the project
        Project::create([
            'name' => $validated['name'],
            'cid' => $validated['cid'],
            'description' => $validated['description'],
            'timeline' => $validated['timeline'],
            'manager_id' => $validated['manager_id'],
            'staff_id' => $validated['staff_id'],
        ]);
    
        // Redirect back to the project creation page with success message
        return redirect()->route('projects.index')->with('success', 'Project added successfully!');
    }
    public function destroy($id)
        {
            
            $project = Project::findOrFail($id);
            $project->delete();

            return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
        }
        public function edit($id)
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

            $project = Project::with(['category', 'manager.userInfo', 'staff.userInfo'])->find($id);

            $categories = Category::all();
            $managers = Users::join('userinfo', 'userss.id', '=', 'userinfo.uid')
            ->where('userss.role', 2) 
            ->get(['userss.id', 'userinfo.fname', 'userinfo.lname']);

            $staff = Users::join('userinfo', 'userss.id', '=', 'userinfo.uid')
                ->where('userss.role', 3) 
                ->get(['userss.id', 'userinfo.fname', 'userinfo.lname']);


            return view('projects.edit', compact('project', 'categories', 'managers', 'staff','user','role','userinfo'));
        }

    public function update(Request $request, $id)
    {
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|exists:categories,cid',
            'description' => 'required|string',
            'timeline' => 'required|date',
            'manager' => [
                'required',
                'exists:userss,id',
                function ($attribute, $value, $fail) {
                    $user = Users::find($value);
                    if ($user && $user->role != 2) {  // Managers should have role 2
                        $fail('The selected manager is invalid.');
                    }
                },
            ],
            'staff' => [
                'required',
                'exists:userss,id',
                function ($attribute, $value, $fail) {
                    $user = Users::find($value);
                    if ($user && $user->role != 3) {  // Staff should have role 3
                        $fail('The selected staff is invalid.');
                    }
                },
            ],
        ]);

        // Find the project and update it
        $project = Project::findOrFail($id);
        $project->update([
            'name' => $validated['name'],
            'cid' => $validated['category'],
            'description' => $validated['description'],
            'timeline' => $validated['timeline'],
            'manager_id' => $validated['manager'],
            'staff_id' => $validated['staff'],
        ]);

        // Redirect back to the projects list with a success message
        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    public function show($id)
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
        ->select('userss.id','userss.role', 'userinfo.fname', 'userinfo.image')
        ->first();

        $userinfo = Userinfo::where('uid', $user->id)->first();

        $projects = Project::with(['category', 'manager.userinfo', 'staff.userinfo'])->where('id', $id)
        ->first();;

        return view('projects.show', compact('projects','role','user','userinfo'));
    }
}
