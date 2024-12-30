
@extends('layouts.app')
@section('title','dashboard')
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
    <!-- <div class="col-12">
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
               
               

              </tbody>
            </table>



          </div>
        </div>
      </div>
    </div> -->

   <!--  <div class="col-12">
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
                
              </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    
                </ul>
            </nav>

          </div>
        </div>
      </div>
    </div> -->


  </div>
</div>

@endsection
