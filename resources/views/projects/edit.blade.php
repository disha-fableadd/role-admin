@extends('layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-lg-9 mx-auto">
        <div class="card mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mx-auto">Edit Project</h3>
            </div>
            <div class="card-body">
               
                    <form id="editProjectForm" method="POST" enctype="multipart/form-data"  action="{{ route('projects.update', $project->id) }}">
                    @csrf
                    @method('PUT')     
                        <!-- Project Name -->
                        <div class="mb-3">
                            <label for="project-name" class="form-label">Project Name</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-project-name" class="input-group-text"><i
                                        class="ri-pencil-line ri-20px"></i></span>
                                <input type="text" class="form-control" id="project-name" name="name"
                                       placeholder="Project Name" value="{{ old('project_name', $project->name) }}" required />
                            </div>
                        </div>

                        <!-- Category Dropdown -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select id="category" name="category" class="form-select" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->cid }}" {{ $category->cid == $project->cid ? 'selected' : '' }}>{{ $category->cname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="project-description" class="form-label">Description</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-description" class="input-group-text"><i
                                        class="ri-edit-box-line ri-20px"></i></span>
                                <textarea id="project-description" name="description" class="form-control"
                                          placeholder="Project Description" required style="height: 100px">{{ old('description', $project->description) }}</textarea>
                            </div>
                        </div>

                        <!-- Timeline -->
                        <div class="mb-3">
                            <label for="project-timeline" class="form-label">Timeline</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-timeline" class="input-group-text"><i
                                        class="ri-calendar-line ri-20px"></i></span>
                                <input type="date" id="project-timeline" name="timeline" class="form-control"
                                value="{{ old('timeline', $project->timeline) }}" required />
                            </div>
                        </div>

                        <div class="row">
                            <!-- Manager Dropdown -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="manager" class="form-label">Manager</label>
                                    <select id="manager" name="manager" class="form-select" required>
                                        <option value="">Select Manager</option>
                                        @foreach ($managers as $manager)
                                            <option value="{{ $manager->id }}" {{ $manager->id == $project->manager_id ? 'selected' : '' }}>{{ $manager->userInfo->fname }} {{ $manager->userInfo->lname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Staff Dropdown -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="staff" class="form-label">Staff</label>
                                    <select id="staff" name="staff" class="form-select" required>
                                        <option value="">Select Staff</option>
                                        @foreach ($staff as $staffMember)
                                            <option value="{{ $staffMember->id }}" {{ $staffMember->id == $project->staff_id ? 'selected' : '' }}>{{ $staffMember->userInfo->fname }} {{ $staffMember->userInfo->lname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100 mt-3">Update Project</button>
                    </form>
                    <br><br>
                    
            
                   
               
            </div>
        </div>
    </div>
</div>

@endsection