@extends('layouts.app')

@section('content')





<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-lg-9 mx-auto">
        <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mx-auto">Add Project</h3>
            </div>
            <div class="card-body">
                <form id="addProjectForm" method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                @csrf    
                <!-- Project Name -->
                    <div class="mb-3">
                        <div class="input-wrapper">
                            <label for="project-name" class="form-label">Project Name</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-project-name" class="input-group-text"><i
                                        class="ri-pencil-line ri-20px"></i></span>
                                <input type="text" class="form-control" id="project-name" name="name"
                                    placeholder="Project Name" />
                            </div>
                            @error('name') <span style="color:red">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Category Dropdown -->
                    <div class="mb-3">
                        <div class="input-wrapper">
                            <label for="category" class="form-label">Category</label>
                            <select id="category" name="cid" class="form-select">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->cid }}" >
                                        {{ $category->cname }}
                                    </option>
                                @endforeach
                            </select>
                            @error('cid') <span style="color:red">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <div class="input-wrapper">
                            <label for="project-description" class="form-label">Description</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-description" class="input-group-text"><i
                                        class="ri-edit-box-line ri-20px"></i></span>
                                <textarea id="project-description" name="description" class="form-control"
                                    placeholder="Project Description" style="height: 100px"></textarea>
                            </div>
                            @error('description') <span style="color:red">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Timeline -->
                    <div class="mb-3">
                        <div class="input-wrapper">
                            <label for="project-timeline" class="form-label">Timeline</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-timeline" class="input-group-text"><i
                                        class="ri-calendar-line ri-20px"></i></span>
                                <input type="date" id="project-timeline" name="timeline" class="form-control"
                                    placeholder="Timeline" />
                            </div>
                            @error('timeline') <span style="color:red">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Manager Dropdown -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="input-wrapper">
                                    <label for="manager" class="form-label">Manager</label>
                                    <select id="manager" name="manager_id" class="form-select">
                                        <option value="">Select Manager</option>
                                        @foreach($managers as $manager)
                                            <option value="{{ $manager->id }}" >
                                                {{ $manager->fname }} {{ $manager->lname }}
                                            </option>
                                        @endforeach
                                    </select>
                                
                                    @error('manager_id') <span style="color:red">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Staff Dropdown -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="input-wrapper">
                                    <label for="staff" class="form-label">Staff</label>
                                    <select id="staff" name="staff_id" class="form-select">
                                        <option value="">Select Staff</option>
                                        @foreach($staff as $staffMember)
                                            <option value="{{ $staffMember->id }}" >
                                                {{ $staffMember->fname }} {{ $staffMember->lname }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('staff_id') <span style="color:red">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 mt-3">Add Project</button>
                </form>
                <br><br>
                <div id="message"></div>

            </div>
        </div>
    </div>
</div>

@endsection


