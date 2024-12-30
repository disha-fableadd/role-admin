@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Manager Details</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="userTable">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Role</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Image</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->userinfo ? $user->userinfo->fname : 'N/A' }}</td>
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
                                <button class="btn btn-sm btn-primary edit-btn"><a href="{{ route('user.edit', $user->id) }}" class="text-white">Edit</a></button>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
