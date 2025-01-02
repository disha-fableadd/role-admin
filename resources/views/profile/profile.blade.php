
@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="container-xxl flex-grow-1 container-p-y">
    <h2 class="text-center my-5">User Profile</h2>

    <div class="row justify-content-center">
        <!-- Left side: User Details -->
        <div class="col-md-8">
            <div class="card shadow-lg p-4">
                <div class="card-header text-center bg-primary text-white">
                    <!-- Admin Details Header -->
                    <h4 class="text-white"> {{ $profileLabel }}</h4>
                    <p class="text-white">{{ $userLabel }}</p>
                </div>
                <div class="card-body pt-4">
                    <div class="row">
                        <!-- Admin Name -->
                        <div class="col-12 col-md-6 mb-3">
                            <p><i class="fas fa-user fa-lg"></i> <strong>User Name:</strong>
                            {{ $userinfo->fname }} {{ $userinfo->lname }}</p>
                        </div>

                        <!-- Admin Email -->
                        <div class="col-12 col-md-6 mb-3">
                            <p><i class="fas fa-envelope fa-lg"></i> <strong>User Email:</strong>
                            {{ $user->email }}</p>
                        </div>

                        <!-- Gender -->
                        <div class="col-12 col-md-6 mb-3">
                            <p><i class="fas fa-venus-mars fa-lg"></i> <strong>Gender:</strong>
                            {{ ucfirst($userinfo->gender) }}</p>
                        </div>

                        <!-- Contact -->
                        <div class="col-12 col-md-6 mb-3">
                            <p><i class="fas fa-phone-alt fa-lg"></i> <strong>Contact:</strong>
                            {{ $userinfo->contact }}</p>
                        </div>

                        <!-- Address -->
                        <div class="col-12 mb-3">
                            <p><i class="fas fa-map-marker-alt fa-lg"></i> <strong>Address:</strong>
                            {{ nl2br($userinfo->address) }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- Right side: Profile Image -->
        <div class="col-md-4">
            <div class="card shadow-lg p-4">
                <div class="card-body text-center">
                    <!-- Profile Image -->
                    <img src="{{ !empty($userinfo->image) ? asset('storage/' . $userinfo->image) : asset('default.png') }}" alt="Profile Image" class="img-fluid rounded-circle mb-3"
                        width="150">

                    <!-- Contact Info -->
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Contact:</strong>  {{ $userinfo->contact }}</p>
                    <br>
                    @if($user->role == 1 || $user->role == 2 || $user->role == 3)
                            <div class="text-center mt-4">
                                <a href="{{ route('profile.edit') }}" class="btn btn-primary mx-auto">Edit Profile</a>
                              
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection