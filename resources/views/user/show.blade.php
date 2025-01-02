
@extends('layouts.app')

@section('content')

 <div class="container-xxl flex-grow-1 container-p-y  ">
  <div class="row gy-6">
   

  <div class="container">
        <h2>User Details</h2>
        <table class="table table-bordered">
            <tr>
                <th>First Name</th>
                <td>{{ $userinfo->fname }}</td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td>{{ $userinfo->lname }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>
                {{ $user->role == 1 ? 'Admin' : ($user->role == 2 ? 'Manager' : 'Staff') }}
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Contact</th>
                <td>{{ $userinfo->contact }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{ $userinfo->gender }}</td>
            </tr>
            <tr>
                <th>Profile Image</th>
                <td><img src="{{ !empty($userinfo->image) ? asset('storage/' . $userinfo->image) : asset('default.png') }}" alt="User Image" style="width:150px; height:150px;"></td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $userinfo->address }}</td>
            </tr>
        </table>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to User List</a>
    </div>


    
   

  </div>
</div>
@endsection
