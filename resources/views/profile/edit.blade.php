@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="container-xxl flex-grow-1 container-p-y">
    <h2 class="text-center my-5">Edit Profile</h2>

    <div class="row justify-content-center">
        <!-- Edit Profile Form -->
        <div class="col-md-8">
            <div class="card shadow-lg p-4">
                <div class="card-header text-center bg-primary text-white">
                    <h4 class="text-white">Edit Profile</h4>
                </div>
                <div class="card-body pt-4">
                    <form id="editProfileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf  
                    <!-- First Name -->
                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname"
                            value="{{ old('fname', $userinfo->fname) }}" >
                        </div>
                        

                        <!-- Last Name -->
                        <div class="mb-3">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname"
                            value="{{ old('lname', $userinfo->lname) }}" >
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $user->email) }}" >
                        </div>

                        <!-- Gender -->
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" id="gender" name="gender" >
                                <option value="male" {{ old( $userinfo->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old( $userinfo->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old( $userinfo->gender) == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <!-- Contact -->
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" class="form-control" id="contact" name="contact"
                                value="{{ old('contact', $userinfo->contact) }}" >
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="4"
                                >{{ old('address', $userinfo->address) }}</textarea>
                        </div>

                        <!-- Profile Image -->
                        <div class="mb-3">
                            <label for="profileimage" class="form-label">Profile Image</label>
                            <div class="mb-3">
                            @if ($userinfo->image)
                                <img src="{{ asset('storage/' . $userinfo->image) }}" alt="Profile Image" class="img-thumbnail" style="max-width: 150px;">
                            @else
                                <p>No image uploaded</p>
                            @endif
                            </div>
                            <input type="file" class="form-control" id="profileimage" name="image">
                            <small class="form-text text-muted">Leave empty to keep the current profile image.</small>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                    <div id="responseMessage" class="mt-3 text-center"></div>
                    <!-- For displaying the response message -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection