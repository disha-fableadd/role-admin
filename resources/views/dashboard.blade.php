
@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


<div class="container-xxl flex-grow-1 container-p-y  ">
  <div class="row gy-6">
  @if ($role == 1)
      <!-- Congratulations card -->
      <div class="col-md-12 col-lg-4">
        <div class="card bg-label-warning">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0 flex-wrap text-nowrap">Total Users</h5>
            <h4 class="text-primary mb-0">{{ $totalUsers }}</h4>
            <p class="mb-2">78% of target 🚀</p>
            <a href="alluser.php" class="btn btn-sm btn-primary rounded-pill">View users</a>
          </div>
          <img src="{{asset('uploads/user.jpg')}}" class="position-absolute bottom-0 end-0 me-5 mb-5" width="100" alt="view sales" />
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <div class="card bg-label-success">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0 flex-wrap text-nowrap">Total Projects</h5>
            <h4 class="text-primary mb-0">{{ $totalProjects }}</h4>
            <p class="mb-2">78% of target 🚀</p>
            <a href="allproject.php" class="btn btn-sm btn-primary rounded-pill">View Projects</a>
          </div>
          <img src="{{asset('uploads/pro.jpg')}}" class="position-absolute bottom-0 end-0 me-5 mb-5 " width="100" alt="view sales" />
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <div class="card bg-label-secondary">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0 flex-wrap text-nowrap">Total Categories</h5>
            <h4 class="text-primary mb-0"> {{ $totalCategories }}</h4>
            <p class="mb-2">78% of target 🚀</p>
            <a href="category.php" class="btn btn-sm btn-primary rounded-pill">View Categories</a>
          </div>
          <img src="{{asset('uploads/category.png')}}" class="position-absolute bottom-0 end-0 me-5 mb-5" width="100"
            alt="view sales" />
        </div>
      </div>
      @endif

@if ($role == 2)
      <!-- Congratulations card -->
      <div class="col-md-12 col-lg-6">
        <div class="card bg-label-warning">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0 flex-wrap text-nowrap">Total Staff</h5>
            <h4 class="text-primary mb-0">{{ $totalStaff }}</h4>
            <p class="mb-2">78% of target 🚀</p>
            <a href="#" class="btn btn-sm btn-primary rounded-pill">View Staff</a>
          </div>
          <img src="{{asset('uploads/user.jpg')}}" class="position-absolute bottom-0 end-0 me-5 mb-5" width="100" alt="view sales" />
        </div>
      </div>
      <div class="col-md-12 col-lg-6">
        <div class="card bg-label-success">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0 flex-wrap text-nowrap">Total Projects</h5>
            <h4 class="text-primary mb-0">{{ $totalProjects }}</h4>
            <p class="mb-2">78% of target 🚀</p>
            <a href="allproject.php" class="btn btn-sm btn-primary rounded-pill">View Projects</a>
          </div>
          <img src="{{asset('uploads/pro.jpg')}}" class="position-absolute bottom-0 end-0 me-5 mb-5 " width="100" alt="view sales" />
        </div>
      </div>
      @endif

@if ($role == 3)
      <!-- Congratulations card -->
      <div class="col-md-12 col-lg-6">
        <div class="card bg-label-warning">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0 flex-wrap text-nowrap">Total Managers</h5>
            <h4 class="text-primary mb-0">{{ $totalManager }}</h4>
            <p class="mb-2">78% of target 🚀</p>
            <a href="alluser.php" class="btn btn-sm btn-primary rounded-pill">View Managers</a>
          </div>
          <img src="{{asset('uploads/user.jpg')}}" class="position-absolute bottom-0 end-0 me-5 mb-5" width="100" alt="view sales" />
        </div>
      </div>
      <div class="col-md-12 col-lg-6">
        <div class="card bg-label-success">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0 flex-wrap text-nowrap">Total Projects</h5>
            <h4 class="text-primary mb-0">{{ $totalProjects }}</h4>
            <p class="mb-2">78% of target 🚀</p>
            <a href="#" class="btn btn-sm btn-primary rounded-pill">View Projects</a>
          </div>
          <img src="{{asset('uploads/pro.jpg')}}" class="position-absolute bottom-0 end-0 me-5 mb-5 " width="100" alt="view sales" />
        </div>
      </div>
@endif

    <!--/ Congratulations card -->





    <!-- Data Tables -->
    <div class="col-12">
      <div class="card ">
        <h5 class="card-header">Users Details</h5>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered" id="userTable">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Role</th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <th>Image</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($users as $user)
                        <tr>
                            <td>{{ $user->userinfo ? $user->userinfo->fname : 'N/A' }}</td>
                            <td>{{ $user->userinfo ? $user->userinfo->lname : 'N/A' }}</td>
                            <td>{{ $user->role == 1 ? 'Admin' : ($user->role == 2 ? 'Manager' : 'Staff') }}</td>
                            <td>{{ $user->userinfo ? $user->userinfo->gender : 'N/A' }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->userinfo ? $user->userinfo->contact : 'N/A' }}</td>
                            <td>
                                <img src="{{ asset('storage/' . ($user->userinfo && $user->userinfo->image ? $user->userinfo->image : 'default.png')) }}" 
                                    alt="{{ $user->userinfo ? $user->userinfo->fname : 'Default' }}'s Image" 
                                    class="img-thumbnail" 
                                    style="width:50px; height:50px; border-radius:50%">
                            </td>
                            <td>{{ $user->userinfo ? $user->userinfo->address : 'N/A' }}</td>
                            <td>
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary"><i class='fas fa-eye'></i></a>
                            </td>
                        </tr>
                    @endforeach
               

              </tbody>
            </table>



          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card">
        <h5 class="card-header">Projects Details</h5>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered" id="projectTable">
              <thead>
                <tr>
                  <th>Project Name</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Timeline</th>
                  <th>Manager</th>
                  <th>Staff</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  
              @forelse($projects as $project)
                            <tr data-id="{{ $project->id }}">
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->category->cname }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->timeline }}</td>
                                <td>{{ $project->manager->userinfo->fname }} {{ $project->manager->userinfo->lname }}</td>
                                <td>{{ $project->staff->userinfo->fname }} {{ $project->staff->userinfo->lname }}</td>
                                <td>
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary"><i class='fas fa-eye'></i></a>
                            </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No projects found.</td>
                            </tr>
                        @endforelse
              </tbody>
            </table>
           

          </div>
        </div>
      </div>
    </div>


  </div>
</div>

@endsection
