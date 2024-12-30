@extends('layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-lg-9 mx-auto">
        <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mx-auto">Edit User</h3>
            </div>
            <div class="card-body">
  
            <form id="edit-user-form" action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')        
           

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="fname" class="form-label">First Name</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fname" class="input-group-text"><i
                                            class="ri-user-line ri-20px"></i></span>
                                    <input type="text" class="form-control" id="fname" name="fname"
                                        placeholder="First Name" aria-label="First Name"
                                        aria-describedby="basic-icon-default-fname"
                                        value="{{ $userInfo->fname }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="lname" class="form-label">Last Name</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-lname" class="input-group-text"><i
                                            class="ri-user-line ri-20px"></i></span>
                                    <input type="text" class="form-control" id="lname" name="lname"
                                        placeholder="Last Name" aria-label="Last Name"
                                        aria-describedby="basic-icon-default-lname"
                                        value="{{ $userInfo->lname }}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Gender (Radio Buttons) -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <div class="input-group input-group-merge">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-male"
                                            value="male" {{ $userInfo->gender == 'male' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gender-male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-female"
                                            value="female" {{ $userInfo->gender == 'female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gender-female">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-other"
                                            value="other" {{ $userInfo->gender == 'other' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gender-other">Other</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Role Selection -->
                    <div class="mb-3">
                        <label for="type" class="form-label">Role</label>
                        <select id="role" name="role" class="form-select" required>
                        <option value="">Select Role</option>
                            @foreach($role as $key => $roles)
                                <option value="{{ $key }}" {{ $user->roles == $key ? 'selected' : '' }}>
                                    {{ $roles }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-email" class="input-group-text"><i
                                    class="ri-mail-line ri-20px"></i></span>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                                aria-label="Email" aria-describedby="basic-icon-default-email"
                                value="{{ $user->email }}" />
                        </div>
                    </div>

                    <!-- Contact Number -->
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact Number</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-contact" class="input-group-text"><i
                                    class="ri-phone-fill ri-20px"></i></span>
                            <input type="text" id="contact" name="contact" class="form-control"
                                placeholder="Contact Number" aria-label="Contact Number"
                                aria-describedby="basic-icon-default-contact"
                                value="{{ $userInfo->contact }}" />
                        </div>
                    </div>

                    <!-- Password Fields -->


                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-address" class="input-group-text"><i
                                    class="ri-map-pin-line ri-20px"></i></span>
                            <textarea id="address" name="address" class="form-control" placeholder="Enter your address"
                                rows="4" aria-label="Address" aria-describedby="basic-icon-default-address"
                                required>{{ $userInfo->address }}</textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 mt-3">Update User</button>
                </form> <br><br>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
               
                <div id="message"></div>
            </div>
        </div>
    </div>
</div>
@endsection
