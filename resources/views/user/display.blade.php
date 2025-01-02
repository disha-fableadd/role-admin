@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


<div class="container-xxl flex-grow-1 container-p-y  ">
  <div class="row gy-6">
    
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
              @forelse ($users as $user)
                            <tr>
                                <td>{{$user->userinfo->fname }}</td>
                                <td>{{ $user->userinfo->lname }}</td>
                                <td>
                                    @if ($user->role == 1)
                                        Admin
                                    @elseif ($user->role == 2)
                                        Manager
                                    @elseif ($user->role == 3)
                                        Staff
                                    @endif
                                </td>
                                <td>{{ $user->userinfo->gender }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->userinfo->contact }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $user->userinfo->image) }}" alt="User Image" style="width:50px; height:50px; border-radius:50%;">
                                </td>
                                <td>{{ $user->userinfo->address }}</td>
                                <td>
                                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary" title="View User">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">No records found.</td>
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