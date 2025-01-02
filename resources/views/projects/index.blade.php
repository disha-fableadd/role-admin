
@extends('layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Project Details</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="projectTable">
                    <thead>
                        <tr>
                            <th>Project</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Timeline</th>
                            <th>Manager</th>
                            <th>Staff</th>
                            <th>Actions</th>
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
                                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                                    </form>
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
@endsection






